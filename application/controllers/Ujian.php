<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // ----- Routes

    public function index()
    {
        if ($this->session->level == '3')
        {
            redirect('ujian/ujian_step1');
        }
        else
        {
            $this->tampil_manage(null);
        }
    }

    public function ujian_step1()
    {
        $data["level"] = $this->session->level;
        $data["rows"] = $this->ambil_paket();

        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('ujian/ujian_step1.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    public function ujian_step2()
    {
        $data["level"] = $this->session->level;
        $data["data"] = $this->db->get_where('ujian', array('id_ujian' => $this->input->post('id_ujian')))->row();
        $data["id_ujian"] = $this->input->post('id_ujian');

        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('ujian/ujian_step2.php', $data);
        $this->load->view('_partial/admin_foot.php', $data);
    }

    public function ujian_step3()
    {
        $data["level"] = $this->session->level;
        $data["rows"] = $this->db->order_by('RAND()')->get_where('soal', array('id_paket' => $this->input->post('id_paket')))->result();
        $data["id_ujian"] = $this->input->post('id_ujian');

        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('ujian/ujian_step3.php', $data);
        $this->load->view('_partial/admin_foot.php', $data);
    }

    public function ujian_selesai()
    {       
        $answers = $this->input->post(NULL, TRUE);
        $total_score = 0;
        $counter = 0;

        // proses semua jawaban
        foreach ($answers as $key => $answer) 
        {
            if (!starts_with($key, "soal")) continue;

            $id_soal = substr($key, 4);
            $soal = $this->db->get_where('soal', array('id_soal' => $id_soal))->row();
            
            if ($answer == $soal->kunci_jawaban) $total_score++;
            $counter++;
        }

        // hitung total skor
        $total_score = $total_score / $counter * 100;
        $siswa = $this->db->get_where('siswa', array('username' => $this->session->username))->row();

        // buat kueri
        $kueri = array(
            "id_siswa" => $siswa->id_siswa,
            "id_ujian" => $this->input->post("id_ujian"),
            "skor" => $total_score,
            "tanggal" => date("Y-m-d H:i:s")
        );
        $this->db->insert('hasil_ujian', $kueri);

        $data["level"] = $this->session->level;
        $data["skor"] = $total_score;
        $this->load->view('_partial/admin_head.php', $data);
        $this->load->view('ujian/ujian_step4.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    // ----- Routes - API

    public function batas_waktu($id)
    {
        $row = $this->db->get_where('ujian', array('id_ujian' => $id))->row();
        $response = array(
            "batas_waktu" => (int) $row->batas_waktu
        );
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit;
    }

    public function tambah()
    {
        $data["data_paket"] = $this->db->get('paket')->result();
        $data["data_guru"] = $this->db->get('guru')->result();
        $this->tampil_edit($data);
    }

    public function edit($id)
    {
        $data["data"] = $this->db->get_where('ujian', array('id_ujian' => $id))->row();
        $data["data_paket"] = $this->db->get('paket')->result();
        $data["data_guru"] = $this->db->get('guru')->result();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('ujian', array('id_ujian' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "id_paket" => $this->input->post('id_paket'),
            "id_guru" => $this->input->post('id_guru'),
            "judul" => $this->input->post('judul'),
            "deskripsi" => $this->input->post('deskripsi'),
            "batas_waktu" => $this->input->post('batas_waktu')
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('ujian', $data);
        } else {
            // jika ada ID, berarti edit
            $this->db->update('ujian', $data, array('id_ujian' => $this->input->post("id")));
        }

        // tampilkan data
        $data["message"] = "Data sudah disimpan.";
        $this->tampil_manage($data);
    }

    public function populate_table()
    {
        $search = $_POST['search']['value'];
        $limit = $_POST['length']; 
        $start = $_POST['start']; 
        $order_index = $_POST['order'][0]['column']; 
        $order_field = $_POST['columns'][$order_index]['data']; 
        $order_ascdesc = $_POST['order'][0]['dir'];
        
        $data = array(
            'draw' => $_POST['draw'] + 1,
            'recordsTotal' => $this->count_all(),
            'recordsFiltered' => $this->count_filter($search),
            'data' => $this->filter($search, $limit, $start, $order_field, $order_ascdesc)
        );
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
    }

    // ----- Data Access

    private function filter($search, $limit, $start, $order_field, $order_ascdesc)
    {
        $this->db->select('ujian.id_ujian, paket.paket AS paket_soal, ujian.judul, guru.nama AS nama_guru, ujian.batas_waktu');
        $this->db->join('guru', 'ujian.id_guru = guru.id_guru', 'inner'); #join
        $this->db->join('paket', 'ujian.id_paket = paket.id_paket', 'inner'); #join
        $this->db->like('ujian.judul', $search); 
        $this->db->or_like('paket.paket', $search);
        $this->db->or_like('guru.nama', $search);
        $this->db->order_by($order_field, $order_ascdesc); 
        $this->db->limit($limit, $start); 
        
        return $this->db->get('ujian')->result_array();
    }

    private function count_all()
    {
        return $this->db->count_all('ujian');
    }

    private function count_filter($search)
    {
        $this->db->select('ujian.id_ujian, paket.paket As paket_soal, ujian.judul, guru.nama As nama_guru, ujian.batas_waktu');
        $this->db->join('guru', 'ujian.id_guru = guru.id_guru', 'inner'); #join
        $this->db->join('paket', 'ujian.id_paket = paket.id_paket', 'inner'); #join
        $this->db->like('ujian.judul', $search); 
        $this->db->or_like('paket.paket', $search);
        $this->db->or_like('guru.nama', $search);

        return $this->db->get('ujian')->num_rows();
    }

    private function ambil_paket()
    {
        $this->db->select('ujian.id_ujian, ujian.judul, paket.paket As paket_soal, guru.nama As nama_guru');
        $this->db->from('ujian');
        $this->db->join('guru', 'ujian.id_guru = guru.id_guru', 'inner'); #join
        $this->db->join('paket', 'ujian.id_paket = paket.id_paket', 'inner'); #join
        $this->db->order_by('id_ujian', 'DESC');

        return $this->db->get()->result();
    }

    // ----- View Helpers

    private function tampil_manage($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('ujian/manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('ujian/edit.php', $data);
        $this->load->view('_partial/admin_foot.php', $data);
    }
}
