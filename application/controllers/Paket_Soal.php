<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_Soal extends MY_Controller
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
        $this->tampil_edit(null);
    }

    public function edit($id)
    {
        $data["data"] = $this->db->get_where('paket', array('id_paket' => $id))->row();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('paket', array('id_paket' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "paket" => $this->input->post('paket')
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('paket', $data);
        } else {
            // jika ada ID, berarti edit
            $this->db->update('paket', $data, array('id_paket' => $this->input->post("id")));
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
        $this->db->select('id_paket, paket'); 
        $this->db->like('paket', $search); 
        $this->db->order_by($order_field, $order_ascdesc); 
        $this->db->limit($limit, $start); 

        return $this->db->get('paket')->result_array();
    }

    private function count_all()
    {
        return $this->db->count_all('paket');
    }

    private function count_filter($search)
    {
        $this->db->select('id_paket, paket'); 
        $this->db->like('paket', $search); 

        return $this->db->get('paket')->num_rows();
    }
    
    // ----- View Helpers 

    private function tampil_manage($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('soal/paket_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('soal/paket_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
