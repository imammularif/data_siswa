<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kelas_model');

        if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Silahkan login terlebih dahulu.!</div>');
						redirect(base_url('login'),'refresh');
		}
	}

	public function index()
    {
        $kelas = $this->Kelas_model->data();
            $data = array('title'  => 'Data kelas',
                          'kelas' => $kelas,
                          'isi'    => 'kelas/list'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

	public function tambah()
	{
		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('kelas','kelas','required|is_unique[kelas.kelas]',array(
			'required'			=>'Kelas harus diisi',
            'is_unique'		=> 'id_kelas <strong>'.$this->input->post('kelas').
            '&nbsp; </strong> sudah ada. Buat Kelas baru'));
		

		if($valid->run()){
            $i= $this->input;
            $data = array(  
                'kelas'			=> $i->post('kelas')
                
            );

            $this->Kelas_model->tambah($data);
            $this->session->set_flashdata('sukses', 'data telah ditambah');
            redirect(base_url('kelas'), 'refresh'); 

            
        }
			//end validasi
				$data = array('title' => 'Tambah Data kelas',
								'isi' => 'kelas/tambah');
								$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function edit($id_kelas)
	{
		$kelas = $this->Kelas_model->detail($id_kelas);
		
		$valid = $this->form_validation;
		$valid->set_rules('kelas','kelas','required',array(
			'required'			=>'Nama kelas harus diisi'));
		

		if($valid->run()){

            $i = $this->input;
            $data = array('id_kelas'				=> $id_kelas,
                        'kelas'		=> $i->post('kelas')
                        );

            $this->Kelas_model->edit($data);
            $this->session->set_flashdata('sukses', 'data berhasil diedit');
            redirect(base_url('kelas'),'refresh');
			

			
		
		//end valid
		}else{
			
			$data = array('title' => 'Edit Data User',
			'kelas'	=> $kelas,
			'isi' => 'kelas/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}
	}
	//end edit

	public function delete($id_kelas){
		
		$data = array('id_kelas'	=> $id_kelas);
		$this->Kelas_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Di Hapus');
		redirect(base_url('kelas'),'refresh');
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */