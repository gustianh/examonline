<?php
class Login_model extends CI_Model
    {
    //cek username dan password guru
    function auth_guru($username,$password){
        $query=$this->db->query("SELECT * FROM guru WHERE username='$username' AND password=('$password') LIMIT 1");
        return $query;
    }

    //cek username dan password operator
    function auth_operator($username,$password){
        $query=$this->db->query("SELECT * FROM opeator WHERE username='$username' AND password=('$password') LIMIT 1");
        return $query;
    }

     //cek username dan password siswa
     function auth_siswa($username,$password){
        $query=$this->db->query("SELECT * FROM siswa WHERE username='$username' AND password=('$password') LIMIT 1");
        return $query;
    }
 
 
}