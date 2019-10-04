<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }
 
    function index(){
        $this->load->view('v_login');
    }
 
    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_operator=$this->login_model->auth_guru($username,$password);
 
        if($cek_operator->num_rows() > 0){ //jika login sebagai guru
                        $data=$cek_operator->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['level']=='1'){ //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('username',$data['username']);
                    $this->session->set_userdata('password',$data['password']);
                    redirect('page');
 
                 }else{ //akses guru
                    $this->session->set_userdata('akses','2');
                                $this->session->set_userdata('username',$data['username']);
                    $this->session->set_userdata('password',$data['password']);
                    redirect('page');
                 }
 
        }else{ //jika login sebagai siswa
                    $cek_siswa=$this->login_model->auth_siswa($username,$password);
                    if($cek_siswa->num_rows() > 0){
                            $data=$cek_siswa->row_array();
                    $this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','3');
                            $this->session->set_userdata('username',$data['username']);
                            $this->session->set_userdata('password',$data['password']);
                            redirect('page');
                    }else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url();
                            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                            redirect($url);
                    }
        }
 
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
 