<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Siswa_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function data()
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->from('siswa');
		$this->db->order_by('nis','desc');
		$query = $this->db->get();
		return $query->result();
	}

    public function siswaKelas($id_kelas)
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->from('siswa');
        $this->db->where('kelas.id_kelas', $id_kelas);
		$query = $this->db->get();
		return $query->result();
	}

    public function nilaiList($id_kelas)
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->from('siswa');
        $this->db->where('kelas.id_kelas', $id_kelas);
		$query = $this->db->get();
		return $query->result();
	}

    public function nilaiSiswa($id_kelas,$nis)
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->from('siswa');
        $this->db->where('kelas.id_kelas', $id_kelas);
        $this->db->where('siswa.nis', $nis);
		$query = $this->db->get();
		return $query->row();
	}

    public function detail($nis){
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('siswa', $data);
    }

    public function edit($data)
    {
        $this->db->where('nis', $data['nis']);
        $this->db->update('siswa', $data);
    }

    public function delete($data)
    {
        $this->db->where('nis', $data['nis']);
        $this->db->delete('siswa', $data);
    }

}

?>