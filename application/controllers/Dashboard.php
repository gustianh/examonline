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

        $this->load->view("_partial/admin_head.php", $data);
        $this->load->view("admin/dashboard.php");
        $this->load->view("_partial/admin_foot.php");
    }
}
