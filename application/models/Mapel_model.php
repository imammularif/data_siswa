<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Mapel_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function data()
	{
		$this->db->select('mata_pelajaran.*, pegawai.*');
		$this->db->join('pegawai', 'pegawai.nip = mata_pelajaran.nip');
		$this->db->from('mata_pelajaran');
		$this->db->order_by('pelajaran','desc');
		$query = $this->db->get();
		return $query->result();
	}
	

    public function cekNilai($user)
	{
		$this->db->select('*');
		$this->db->from('mata_pelajaran');
        $this->db->where('nip', $user);
		$query = $this->db->get();
		return $query->row();
	}

    public function detail($id_pelajaran){
        $this->db->select('*');
        $this->db->from('mata_pelajaran');
        $this->db->where('id_pelajaran', $id_pelajaran);
        $query = $this->db->get();
        return $query->row();
    }

    public function cariGuru($nip){
        $this->db->select('*');
        $this->db->from('mata_pelajaran');
        $this->db->where('nip', $nip);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('mata_pelajaran', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_pelajaran', $data['id_pelajaran']);
        $this->db->update('mata_pelajaran', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_pelajaran', $data['id_pelajaran']);
        $this->db->delete('mata_pelajaran', $data);
    }

}

?>