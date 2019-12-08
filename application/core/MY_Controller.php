<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        /* $page = strtolower($this->uri->segment(1));
        if ($page != "login" && !$this->is_logged_in())
        {
            redirect("login/index");
        } */
    }

    public function is_logged_in()
    {        
        //return isset($this->session->username);
        //return true;
    }
}
