<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends MY_Controller
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
        $data["data"] = $this->db->get_where('ujian', array('id_ujian' => $id))->row();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('ujian', array('id_ujian' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "id_paket" => $this->input->post('id_paket'),
            "id_guru" => $this->input->post('id_guru'),
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
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    private function ambil_data()
    {
        $this->db->select('*');
        $this->db->order_by('id_ujian', 'DESC');
        return $this->db->get('ujian')->result();
    }

    private function tampil_manage($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/ujian_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/ujian_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
