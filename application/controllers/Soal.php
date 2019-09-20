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
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function tambah()
    {
        $this->tampil_edit(null);
    }

    public function edit($id)
    {
        $data["data"] = $this->db->get_where('soal', array('id_soal' => $id))->row();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('soal', array('id_soal' => $id));

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
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    private function ambil_data()
    {
        $this->db->select('*');
        $this->db->order_by('id_soal', 'DESC');
        return $this->db->get('soal')->result();
    }

    private function tampil_manage($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/soal_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/soal_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
