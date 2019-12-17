<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->tampil_manage(null);
    }
    
    public function cetak_kartu()
    {
        $this->tampil_cetak_kartu();
    }

    public function cetak_kartu_do()
    {
        $this->db->select('siswa.id_siswa, siswa.nama, kelas.nama As nama_kelas');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas'); #join
        $this->db->where('kelas.id_kelas', $this->input->post('id_kelas'));
        $this->db->order_by('id_siswa', 'DESC');

        $q =  $this->db->get("siswa")->result();
        $data["rows"] = array_chunk($q, 9);
        $this->load->view('user/siswa_cetak_kartu.php', $data);
    }

    public function tambah()
    {
        $data["data_kelas"] = $this->ambil_kelas();
        $this->tampil_edit($data);
    }

    public function edit($id)
    {
        $data["data"] =  $this->db->get_where('siswa', array('id_siswa' => $id))->row();
        $data["data_kelas"] = $this->ambil_kelas();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('siswa', array('id_siswa' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $this->tampil_manage($data);
    }

    public function hapus_angkatan()
    {
        $tahun = $this->input->post("tahun_masuk");
        $this->db->delete('siswa', array('tahun_masuk' => $tahun));
        $data["message"] = "Data angkatan". $tahun . " sudah dihapus.";
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "nis" => $this->input->post('nis'),
            "nama" => $this->input->post('nama'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            'id_kelas' => $this->input->post("kelas"),
            'tahun_masuk' => $this->input->post("tahun_masuk"),
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password')
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('siswa', $data);
        } else {
            // jika ada ID, berarti edit
            $this->db->update('siswa', $data, array('id_siswa' => $this->input->post('id')));
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
        $this->db->select('id_siswa, nis, tahun_masuk, siswa.nama, kelas.nama AS kelas'); 
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas'); #join
        $this->db->like('nis', $search); 
        $this->db->or_like('siswa.nama', $search); 
        $this->db->or_like('tahun_masuk', $search); 
        $this->db->or_like('kelas.nama', $search); 
        $this->db->order_by($order_field, $order_ascdesc); 
        $this->db->limit($limit, $start); 

        return $this->db->get('siswa')->result_array();
    }

    private function count_all()
    {
        return $this->db->count_all('guru');
    }

    private function count_filter($search)
    {
        $this->db->select('nis, tahun_masuk, siswa.nama, kelas.nama AS kelas');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas'); #join
        $this->db->like('nis', $search); 
        $this->db->or_like('siswa.nama', $search); 
        $this->db->or_like('tahun_masuk', $search); 
        $this->db->or_like('kelas.nama', $search); 

        return $this->db->get('siswa')->num_rows();
    }

    private function ambil_kelas()
    {
        $this->db->select('*');
        $this->db->order_by('id_kelas', 'DESC');
        return $this->db->get('kelas')->result();
    }

    private function ambil_angkatan()
    {
        $this->db->select('tahun_masuk');
        $this->db->distinct();
        return $this->db->get('siswa')->result();
    }

    // ----- View Helpers 

    private function tampil_cetak_kartu()
    {
        $data["level"] = $this->session->level;
        $data["data_kelas"] = $this->db->get("kelas")->result();
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('user/siswa_cetak_pilih.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_manage()
    {
        $data["level"] = $this->session->level;
        $data["angkatan"] = $this->ambil_angkatan();
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('user/siswa_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('user/siswa_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
