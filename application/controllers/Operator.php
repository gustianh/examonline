<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        public function simpan()
        {
            // buat kueri
            $data = array(
                "username" => $this->input->post('username'),
                "tanggal_lahir" => $this->input->post('tanggal_lahir'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "nidn" => $this->input->post('nidn'),
                "jabatan" => $this->input->post('jabatan'),
                "username" => $this->input->post('username'),
                "password" => $this->input->post('password')
            );
            if ($this->input->post('id') == null) {
                // jika tidak ada ID, maka buat data baru
                $this->db->insert('guru', $data);
            } else {
                // jika ada ID, berarti edit
                $this->db->update('guru', $data, array('id_guru' => $this->input->post("id")));
            }
    
            // tampilkan data
            $data["message"] = "Data sudah disimpan.";
            $data["rows"] = $this->ambil_data();
            $this->tampil_manage($data);
        }

        $data["rows"] = $this->db->query('SELECT * FROM admin ORDER BY id ASC')->result();
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/admin_dashboard.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
