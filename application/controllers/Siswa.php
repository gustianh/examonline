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
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function tambah()
    {
        $data["kelas"] = $this->ambil_kelas();
        $this->tampil_edit($data);
    }

    public function edit($id)
    {
        $data["data"] =  $this->db->get_where('siswa', array('id_siswa' => $id))->row();
        $data["kelas"] = $this->ambil_kelas();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('siswa', array('id' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "nama" => $this->input->post('nama'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            'kelas' => $this->input->post("kelas"),
            'tahun_masuk' => $this->input->post("tahun_masuk"),
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password')
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('siswa', $data);
        } else {
            // jika ada ID, berarti edit
            $this->db->update('siswa', $data, array('id_siswa' => $id));
        }

        // tampilkan data
        $data["message"] = "Data sudah disimpan.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    private function ambil_data()
    {
        $this->db->select('*');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get('siswa')->result();
    }

    private function ambil_kelas()
    {
        $this->db->select('*');
        $this->db->order_by('id_kelas', 'DESC');
        return $this->db->get('kelas')->result();
    }

    private function tampil_manage($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/siswa_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/siswa_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
