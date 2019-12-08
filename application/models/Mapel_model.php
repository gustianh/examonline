<?php
class Guru_model extends CI_Model
{
    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    public function populate_table()
    {
        $search = $_POST['search']['value'];
        $limit = $_POST['length']; 
        $start = $_POST['start']; 
        $order_index = $_POST['order'][0]['column']; 
        $order_field = $_POST['columns'][$order_index]['data']; 
        $order_ascdesc = $_POST['order'][0]['dir'];
        
        return array(
            'draw' => $_POST['draw'] + 1,
            'recordsTotal' => $this->count_all(),
            'recordsFiltered' => $this->count_filter($search),
            'data' => $this->filter($search, $limit, $start, $order_field, $order_ascdesc)
        );
    }
    
    public function get($id)
    {
        $row_guru = $this->db->get_where('guru', array('id_ujian' => $id))->row();
        $row_pengguna = $this->db->get_where('pengguna', array('id_pengguna' => $row_guru->id_pengguna))->row();

        return array(
            "id_guru" => $row_guru->id_guru,
            "id_mapel" => $row_guru->id_mapel,
            "nip" => $row_guru->nip,
            "nama" => $row_guru->nama,
            "jenis_kelamin" => $row_guru->jenis_kelamin,
            "id_pengguna" => $row_pengguna->id_pengguna,
            "username" => $row_pengguna->username,
            "password" => $row_pengguna->password,
        );
    }

    public function empty()
    {
        return array(
            "id_guru" => "",
            "id_pengguna" => "",
            "id_mapel" => "",
            "nip" => "",
            "nama" => "",
            "jenis_kelamin" => "L",
            "username" => "",
            "password" => "",
        );
    }

    public function simpan()
    {
        if ($this->input->post('id_guru') == null) {
            // jika tidak ada ID, maka buat data baru
            $data = array(          
                "id_pengguna" => $this->input->post('id_pengguna'),
                "id_mapel" => $this->input->post('id_mapel'),
                "nip" => $this->input->post('nip'),
                "nama" => $this->input->post('nama'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin')
            );
            $this->db->insert('guru', $data);
        } else {
            // jika ada ID, berarti edit
            $data = array(          
                "nip" => $this->input->post('nip'),
                "nama" => $this->input->post('nama'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin')
            );
            $this->db->update('guru', $data, array('id_guru' => $this->input->post("id_guru")));
        }
    }

    public function filter($search, $limit, $start, $order_field, $order_ascdesc)
    {
        $this->db->select('id_mapel, mapel'); 
        $this->db->like('mapel', $search); 
        $this->db->order_by($order_field, $order_ascdesc); 
        $this->db->limit($limit, $start); 

        return $this->db->get('mapel')->result_array();
    }

    public function count_all()
    {
        return $this->db->count_all('mapel');
    }

    public function count_filter($search)
    {
        $this->db->select('id_mapel, mapel'); 
        $this->db->like('mapel', $search);
        return $this->db->get('mapel')->num_rows();
    }
}
