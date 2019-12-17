<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // ----- Routes

    public function index()
    {
        $this->tampil_manage(null);
    }

    public function cetak()
    {
        $this->db->select('guru.id_guru, guru.nidn, guru.nama, mata_pelajaran.nama AS mapel'); 
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = guru.id_mata_pelajaran');
        $data["rows"] = $this->db->get('guru')->result();
        $this->load->view('user/guru_cetak.php', $data);
    }

    public function tambah()
    {
        $data["mode"] = "tambah";
        $data["data_mapel"] =$this->db->get('mata_pelajaran')->result();
        $this->tampil_edit($data);
    }

    public function edit($id)
    {
        $data["mode"] = "edit";
        $data["data"] = $this->db->get_where('guru', array('id_guru' => $id))->row();
        $data["data_mapel"] =$this->db->get('mata_pelajaran')->result();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('guru', array('id_guru' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "id_mata_pelajaran" => $this->input->post('id_mata_pelajaran'),
            "nama" => $this->input->post('nama'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "nidn" => $this->input->post('nidn'),
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password')
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('guru', $data);
        } else {
            // jika ada ID, berarti edit
            unset($data["id_mata_pelajaran"]);
            $this->db->update('guru', $data, array('id_guru' => $this->input->post("id")));
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
        $this->db->select('guru.id_guru, guru.nidn, guru.nama, mata_pelajaran.nama AS mapel'); 
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = guru.id_mata_pelajaran');
        $this->db->like('guru.nidn', $search); 
        $this->db->or_like('guru.nama', $search); 
        $this->db->or_like('mata_pelajaran.nama', $search); 
        $this->db->order_by($order_field, $order_ascdesc); 
        $this->db->limit($limit, $start); 

        return $this->db->get('guru')->result_array();
    }

    private function count_all()
    {
        return $this->db->count_all('guru');
    }

    private function count_filter($search)
    {
        $this->db->select('guru.id_guru, guru.nidn, guru.nama, mata_pelajaran.nama AS mapel'); 
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = guru.id_mata_pelajaran');
        $this->db->like('guru.nidn', $search); 
        $this->db->or_like('guru.nama', $search); 
        $this->db->or_like('mata_pelajaran.nama', $search); 

        return $this->db->get('guru')->num_rows();
    }

    // ----- View Helpers 

    private function tampil_manage($data)
    {
        $data["level"] = $this->session->level;

        $this->load->view('_partial/admin_head.php', $data);
        $this->load->view('user/guru_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;

        $this->load->view('_partial/admin_head.php', $data);
        $this->load->view('user/guru_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
