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
        $data["data_paket"] = $this->db->get('paket')->result();
        $data["data_guru"] = $this->db->get('guru')->result();
        $this->tampil_edit($data);
    }

    public function edit($id)
    {
        $data["data"] = $this->db->get_where('ujian', array('id_ujian' => $id))->row();
        $data["data_paket"] = $this->db->get('paket')->result();
        $data["data_guru"] = $this->db->get('guru')->result();
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
        $this->db->select('ujian.id_ujian, paket.paket As paket_soal, guru.nama As nama_guru, ujian.batas_waktu');
        $this->db->from('guru');
        $this->db->join('ujian', 'ujian.id_guru = guru.id_guru', 'inner'); #join
        $this->db->join('paket', 'ujian.id_paket = paket.id_paket', 'inner'); #join
        $this->db->order_by('id_ujian', 'DESC');

        return $this->db->get()->result();
    }

    private function tampil_manage($data)
    {
        $data["level"] = $this->session->level;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('admin/ujian_manage.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }

    private function tampil_edit($data)
    {
        $data["level"] = $this->session->level;
        $data["use_editor"] = true;
        $this->load->view('_partial/admin_head.php',$data);
        $this->load->view('admin/ujian_edit.php', $data);
        $this->load->view('_partial/admin_foot.php', $data);
    }
}
