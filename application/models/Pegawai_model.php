<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Pegawai_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function data()
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->order_by('nip','DESC');
		$query = $this->db->get();
		return $query->result();
	}

    public function detail($nip){
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('nip', $nip);
        $query = $this->db->get();
        return $query->row();
    }

    

	public function login($username,$password)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where(array('username' => $username,
                                'password' => sha1($password)
                            ));
        $this->db->order_by('nis', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('pegawai', $data);
    }

    public function edit($data)
    {
        $this->db->where('nip', $data['nip']);
        $this->db->update('pegawai', $data);
    }

    public function delete($data)
    {
        $this->db->where('nip', $data['nip']);
        $this->db->delete('pegawai', $data);
    }

}

?>