<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->level == 3)
        {
            redirect("ujian/index");
        }
    }

    public function index()
    {
        $data["level"] = $this->session->level;
        $data["total_paket"] = $this->db->count_all_results('paket');
        $data["total_soal"] = $this->db->count_all_results('soal');
        $data["total_guru"] = $this->db->count_all_results('guru');
        $data["total_siswa"] = $this->db->count_all_results('siswa');

        $this->load->view("_partial/admin_head.php", $data);
        $this->load->view("dashboard.php", $data);
        $this->load->view("_partial/admin_foot.php");
    }
}
