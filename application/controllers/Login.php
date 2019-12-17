<?php
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function index()
    {
        if ($this->is_logged_in()) {
            redirect("dashboard/index", "refresh");
        } else {
            $this->load->view('login');
        }
    }

    public function register()
    {
        if ($this->is_logged_in()) {
            redirect("dashboard/index", "refresh");
        } else {
            $data["data_kelas"] = $this->db->get('kelas')->result();
            $this->load->view('register', $data);
        }
    }

    public function register_do()
    {
        // buat kueri
        $data = array(
            "nis" => $this->input->post('nis'),
            "nama" => $this->input->post('nama'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            'id_kelas' => $this->input->post("kelas"),
            'tahun_masuk' => $this->input->post("tahun_masuk"),
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password')
        );
        
        $this->db->insert('siswa', $data);
        redirect("login/index", "refresh");
    }
 
    public function auth()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $level = $this->input->post("level");

        $user = $this->auth_user($username, $password, $level);
        if ($user) {
            $newdata = array(
                'username'  => $username,
                'level'     => $level,
            );
            if ($level == '3') $newdata["id_siswa"] = $user->id_siswa;
            $this->session->set_userdata($newdata);
            redirect("dashboard/index", 'refresh');
        } else {
            $this->session->sess_destroy();
            redirect("login/index", 'refresh');
        }
    }
 
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("login/index", 'refresh');
    }

    public function auth_user($username, $password, $level)
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
