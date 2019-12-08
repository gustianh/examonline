<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends MY_Controller
{
    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
    }

    // Routes
    public function index()
    {
        $this->tampil_manage(null);
    }

    public function tambah()
    {
        $data["mode"] = "add";
        $data["data"] = $this->guru_model->empty();
        $data["data_mapel"] = $this->mapel_model->all();
        $data["data_mapel_selected"] = $this->mapel_model->top_id();
        
        $this->tampil_edit($data);
    }

    public function edit($id)
    {
        $data["mode"] = "edit";
        $data["data"] = $this->guru_model->get($id);
        $data["data_mapel"] = $this->mapel_model->all();

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
        $this->guru_model->simpan();

        // tampilkan data
        $data["message"] = "Data sudah disimpan.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    // VIEW HELPER
    public function ajax_data()
    {
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($this->Guru_model->populate_table()));
    }

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
