<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->tampil_manage(null);
    }

    public function tambah()
    {
        $data["mode"] = "tambah";
        $data["data_paket"] = $this->db->get('paket')->result();
        $data["data_mapel"] = $this->db->get('mata_pelajaran')->result();
        $this->tampil_edit($data);
    }

    public function edit($id)
    {
        $data["mode"] = "edit";
        $data["data"] = $this->db->get_where('soal', array('id_soal' => $id))->row();
        $data["data_paket"] = $this->db->get('paket')->result();
        $data["data_mapel"] = $this->db->get('mata_pelajaran')->result();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        $this->db->delete('soal', array('id_soal' => $id));
        $data["message"] = "Data sudah dihapus.";
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "id_paket" => $this->input->post('paket'),
            "id_guru" => $this->input->post('id_guru'),
            "id_mata_pelajaran" => $this->input->post('id_mata_pelajaran'),
            "soal" => $this->input->post('soal'),
            "opsi_a" => $this->input->post('opsi_a'),
            "opsi_b" => $this->input->post('opsi_b'),
            "opsi_c" => $this->input->post('opsi_c'),
            "opsi_d" => $this->input->post('opsi_d'),
            "opsi_e" => $this->input->post('opsi_e'),
            "kunci_jawaban" => $this->input->post('kunci_jawaban')
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('soal', $data);
        } else {
            // jika ada ID, berarti edit
            $this->db->update('soal', $data, array('id_soal' => $this->input->post("id")));
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
        $this->db->select('soal.id_soal, mata_pelajaran.nama as mapel, paket.paket, SUBSTRING(soal.soal, 1, 20) as soal');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = soal.id_mata_pelajaran');
        $this->db->join('paket', 'soal.id_paket = paket.id_paket');
        $this->db->like('paket.paket', $search); 
        $this->db->or_like('mata_pelajaran.nama', $search); 
        $this->db->order_by($order_field, $order_ascdesc); 
        $this->db->limit($limit, $start); 

        return $this->db->get('soal')->result_array();
    }

    private function count_all()
    {
        return $this->db->count_all('soal');
    }

    private function count_filter($search)
    {
        $this->db->select('soal.id_soal, mata_pelajaran.nama, paket.paket');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = soal.id_mata_pelajaran');
        $this->db->join('paket', 'soal.id_paket = paket.id_paket');
        $this->db->like('paket.paket', $search); 
        $this->db->or_like('mata_pelajaran.nama', $search); 

        return $this->db->get('soal')->num_rows();
    }
    
    // ----- View Helpers 

    private function tampil_manage($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('soal/soal_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('soal/soal_edit.php', $data);
        $this->load->view('_partial/admin_foot.php', $data);
    }
}
