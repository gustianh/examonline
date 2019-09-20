<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function tambah()
    {
        $this->tampil_edit(null);
    }

    public function edit($id)
    {
        $data["data"] = $this->db->get_where('administrator', array('id_administrator' => $id))->row();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('administrator', array('id_administrator' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password')
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('administrator', $data);
        } else {
            // jika ada ID, berarti edit
            $this->db->update('administrator', $data, array('id_guru' => $this->input->post("id")));
        }

        // tampilkan data
        $data["message"] = "Data sudah disimpan.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    private function ambil_data()
    {
        $this->db->select('*');
        $this->db->order_by('id_administrator', 'DESC');
        return $this->db->get('administrator')->result();
    }

    private function tampil_manage($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/operator_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/operator_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
