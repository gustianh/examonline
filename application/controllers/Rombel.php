<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rombel extends MY_Controller
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
        $data["data"] = $this->db->get_where('rombel', array('id_rombel' => $id))->row();
        $this->tampil_edit($data);
    }

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('rombel', array('id_rombel' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "nama" => $this->input->post('rombel') #ini name
        );
        if ($this->input->post('id') == null) {
            // jika tidak ada ID, maka buat data baru
            $this->db->insert('rombel', $data);
        } else {
            // jika ada ID, berarti edit
            $this->db->update('rombel', $data, array('id_rombel' => $this->input->post("id")));
        }

        // tampilkan data
        $data["message"] = "Data sudah disimpan.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    private function ambil_data()
    {
        $this->db->select('*');
        $this->db->order_by('id_rombel', 'DESC');
        return $this->db->get('rombel')->result();
    }

    private function tampil_manage($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('kelas/rombel_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('kelas/rombel_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
