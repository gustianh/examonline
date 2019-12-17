<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_Ujian extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // ----- Routes - Views

    public function index()
    {
        $this->tampil_manage();
    }

    public function cetak()
    {
        $id_ujian = $this->input->post("id_ujian");
        $id_kelas = $this->input->post("id_kelas");
        $data["rows"] = $this->ambil_print($id_ujian, $id_kelas);
        $data["ujian"] = $this->db->get_where('ujian', array('id_ujian' => $id_ujian))->row();

        $this->tampil_print($data);
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

    // ----- Data Access
    
    private function ambil_print($id_ujian, $id_kelas)
    {
        $this->db->select('hasil_ujian.id_hasil, siswa.nama, kelas.nama as kelas, hasil_ujian.skor');
        $this->db->join('siswa', 'siswa.id_siswa = hasil_ujian.id_siswa', 'inner'); #join
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'inner'); #join
        $this->db->where('hasil_ujian.id_ujian', $id_ujian);
        $this->db->where('hasil_ujian.id_kelas', $id_kelas);
        $this->db->order_by('id_hasil', 'DESC');

        return $this->db->get('hasil_ujian')->result();
    }

    private function ambil_ujian()
    {
        $this->db->select('ujian.id_ujian, ujian.judul');
        $this->db->order_by('id_ujian', 'DESC');

        return $this->db->get('ujian')->result();
    }

    // ----- View Helpers 

    private function tampil_manage()
    {
        $data["level"] = $this->session->level;
        $data["data_ujian"] = $this->db->get('ujian')->result();
        $data["data_kelas"] = $this->db->get('kelas')->result();
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('ujian/hasil_ujian_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('ujian/hasil_ujian_edit.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_print($data)
    {
        $this->load->view('ujian/hasil_ujian_print.php', $data);
    }
}
