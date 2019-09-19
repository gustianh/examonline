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
        /* if (!isset($this->session->admin_id))
        {
            die("error");
        } */

        $data["rows"] = $this->db->query('SELECT * FROM admin ORDER BY id ASC')->result();
        $this->load->view('_partial/admin_head.php');
        $this->load->view('admin/admin_dashboard.php', $data);
        $this->load->view('_partial/admin_foot.php');
    }
}
