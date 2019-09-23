<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("_partial/admin_head.php");
        $this->load->view("admin/dashboard.php");
        $this->load->view("_partial/admin_foot.php");
    }
}
