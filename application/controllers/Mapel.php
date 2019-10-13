<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends MY_Controller
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
        $data["data"] = $this->db->get_where('mata_pelajaran', array('id_mata_pelajaran' => $id))->row();
        $data["data_rombel"] = $this->db->get('rombel')->result();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('mata_pelajaran', array('id_mata_pelajaran' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "id_mata_pelajaran" => $this->input->post('id_mata_pelajaran'),
            "kode" => $this->input->post('kode'),
            "nama" => $this->input->post('nama')
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('mata_pelajaran', $data);
        } else {
            // jika ada ID, berarti edit
            $this->db->update('mata_pelajaran', $data, array('id_mata_pelajaran' => $this->input->post("id")));
        }

        // tampilkan data
        $data["message"] = "Data sudah disimpan.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    private function ambil_data()
    {
        $this->db->select('id_mata_pelajaran, kode, mata_pelajaran.nama as mapel');
        $this->db->from('mata_pelajaran');
        $this->db->order_by('id_mata_pelajaran', 'DESC');

        return $this->db->get()->result();
    }

    private function tampil_manage($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('admin/mata_pelajaran_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('admin/mata_pelajaran_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
