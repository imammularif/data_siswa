<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class user_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing(){
		$this->db->select('*');
		$this->db->from('tabel_user');
		$this->db->order_by('id_user','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function detail($nip){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$nip);
		$query = $this->db->get();
		return $query->row();
	}
	public function login($username, $password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'=> $username,
						  'password'=> sha1($password)));
		$this->db->order_by('id_user','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($dataU){
		$this->db->insert('user',$dataU);
	}

	public function edit($dataU){
		$this->db->where('username',$dataU['username']);
		$this->db->update('user',$dataU);
	}

	public function delete1($dataU){
		$this->db->where('username', $dataU['username']);
		$this->db->delete('user', $dataU);
	}

	public function tambahSiswa($dataU){
		$this->db->insert('user',$dataU);
	}

	public function editSiswa($dataU){
		$this->db->where('username',$dataU['username']);
		$this->db->update('user',$dataU);
	}

	public function deleteSiswa($dataU){
		$this->db->where('username', $dataU['username']);
		$this->db->delete('user', $dataU);
	}
}
?>