<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends MY_Controller
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
        $data["data_rombel"] = $this->db->get('rombel')->result();
        $this->tampil_edit($data);
    }

    public function edit($id)
    {
        $data["data"] = $this->db->get_where('kelas', array('id_kelas' => $id))->row();
        $data["data_rombel"] = $this->db->get('rombel')->result();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('kelas', array('id_kelas' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "id_rombel" => $this->input->post('rombel'),
            "nama" => $this->input->post('kelas'),
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('kelas', $data);
        } else {
            // jika ada ID, berarti edit
            $this->db->update('kelas', $data, array('id_kelas' => $this->input->post("id")));
        }

        // tampilkan data
        $data["message"] = "Data sudah disimpan.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    private function ambil_data()
    {
        $this->db->select('id_kelas, kelas.nama as kls, rombel.nama as rbl');
        $this->db->from('kelas');
        $this->db->join('rombel', 'rombel.id_rombel = kelas.id_rombel'); #join
        $this->db->order_by('id_kelas', 'DESC');

        return $this->db->get()->result();
    }

    private function tampil_manage($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/kelas_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/kelas_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
