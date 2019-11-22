<?php
class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
 
    function index()
    {
        if ($this->is_logged_in())
        {
            redirect("dashboard/index", "refresh");
        }
        else
        {
            $this->load->view('login');
        }
    }
 
    function auth()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $level = $this->input->post("level");

        $user = $this->auth_user($username, $password, $level);
        if ($user)
        {
            $newdata = array
            (
                'username'  => $username,
                'level'     => $level
            );
            $this->session->set_userdata($newdata);
            redirect("dashboard/index", 'refresh');
        }
        else
        {
            $this->session->sess_destroy();
            redirect("login/index", 'refresh');
        }
    }
 
    function logout()
    {
        $this->session->sess_destroy();
        redirect("login/index", 'refresh');
    }

    function auth_user($username, $password, $level)
    {
        $kondisi = array(
            "username" => $username,
            "password" => $password
        );

        $query = null;
        switch ($level) {
            case '2':
                $query = $this->db->get_where("guru", $kondisi, 1);
                break;

            case '3':
                $query = $this->db->get_where("siswa", $kondisi, 1);
                break;

            case '1':
            default:
                $query = $this->db->get_where("operator", $kondisi, 1);
                break;
        }

        return $query->row();
    }
}
