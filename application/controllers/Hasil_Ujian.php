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
        $data["rows_ujian"] = $this->ambil_ujian();
        $this->tampil_manage($data);
    }

    public function cetak()
    {
        $id_ujian = $this->input->post("id_ujian");
        $data["rows"] = $this->ambil_print($id_ujian);
        $data["ujian"] = $this->db->get_where('ujian', array('id_ujian' => $id_ujian))->row();

        $this->tampil_print($data);
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
        $this->db->select('hasil_ujian.id_hasil, siswa.nama, ujian.judul, hasil_ujian.skor');
        $this->db->from('hasil_ujian');
        $this->db->join('siswa', 'siswa.id_siswa = hasil_ujian.id_siswa', 'inner'); #join
        $this->db->join('ujian', 'ujian.id_ujian = hasil_ujian.id_ujian', 'inner'); #join
        $this->db->order_by('id_hasil', 'DESC');

        return $this->db->get()->result();
    }

    private function ambil_print($id_ujian)
    {
        $this->db->select('hasil_ujian.id_hasil, siswa.nama, kelas.nama as kelas, hasil_ujian.skor');
        $this->db->from('hasil_ujian');
        $this->db->join('siswa', 'siswa.id_siswa = hasil_ujian.id_siswa', 'inner'); #join
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'inner'); #join
        $this->db->where('hasil_ujian.id_ujian', $id_ujian);
        $this->db->order_by('id_hasil', 'DESC');

        return $this->db->get()->result();
    }

    private function ambil_ujian()
    {
        $this->db->select('ujian.id_ujian, ujian.judul');
        $this->db->from('ujian');
        $this->db->order_by('id_ujian', 'DESC');

        return $this->db->get()->result();
    }

    private function tampil_manage($data)
    {
        $data["level"] = $this->session->level;
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
