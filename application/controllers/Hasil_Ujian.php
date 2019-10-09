<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_Ujian extends MY_Controller
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

    public function hapus($id)
    {
        // hapus data
        $this->db->delete('hasil_ujian', array('id_hasil' => $id));

        // tampilkan data
        $data["message"] = "Data sudah dihapus.";
        $data["rows"] = $this->ambil_data();
        $this->tampil_manage($data);
    }

    public function simpan()
    {
        // buat kueri
        $data = array(
            "id_siswa" => $this->input->post('id_siswa'),
            "skor" => $this->input->post('skor')
        );
        $this->db->insert('hasil_ujian', $data);
    }

    private function ambil_data()
    {
        $this->db->select('hasil_ujian.id_hasil, siswa.nama, hasil_ujian.skor');
        $this->db->from('hasil_ujian');
        $this->db->join('siswa', 'siswa.id_siswa = hasil_ujian.id_siswa'); #join
        $this->db->order_by('id_hasil', 'DESC');

        return $this->db->get()->result();
    }

    private function tampil_manage($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('admin/hasil_ujian_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('admin/hasil_ujian_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
