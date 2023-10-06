<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		// error_reporting(0);
		parent::__construct();
		$this->load->model('Nilai_model');
		$this->load->model('Kelas_model');
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');

        if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Silahkan login terlebih dahulu.!</div>');
						redirect(base_url('login'),'refresh');
		}
	}

	public function index()
    {
        

            $data = array('title'  => 'Data Nilai',
                          'isi'    => 'nilai/list'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

	public function perorangan()
    {
        

            $data = array('title'  => 'Data Nilai',
                          'isi'    => 'nilai/perorangan'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
	
    public function kelas()
    {
        $kelas = $this->Kelas_model->data();
            $data = array('title'  => 'Data Nilai',
                          'kelas' => $kelas,
                          'isi'    => 'nilai/kelas'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    public function siswa($id_kelas)
    {

        $siswa = $this->Siswa_model->siswaKelas($id_kelas);
            $data = array('title'  => 'Data Siswa',
                          'siswa' => $siswa,
                          'isi'    => 'nilai/siswa'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

	public function tambah()
	{
		


		$valid = $this->form_validation;
		$valid->set_rules('tugas','tugas','required',array(
			'required'			=>'tugas harus diisi'));
		$valid->set_rules('uts','uts','required',array(
			'required'			=>'uts harus diisi'));
		$valid->set_rules('uas','uas','required',array(
			'required'			=>'uas harus diisi'));
		

		if($valid->run()){
            $i= $this->input;
			$nilai = ($i->post('tugas')*0.4)+($i->post('uts')*0.3)+($i->post('uas')*0.3);
			$nilai = round($nilai,2);

            $data = array(  
                'id_pelajaran'		=> $i->post('id_pelajaran'),
				'nis'				=> $i->post('nis'),
				'tugas'				=> $i->post('tugas'),
				'uts'				=> $i->post('uts'),
				'uas'				=> $i->post('uas'),
				'nilai'				=> $nilai
                
            );

            $this->Nilai_model->tambah($data);
            $this->session->set_flashdata('sukses', 'data telah ditambah');
            redirect(base_url('nilai/kelas'), 'refresh'); 

            
        }
			//end validasi
				$data = array('title' => 'Tambah Nilai Siswa',
								'isi' => 'nilai/tambah');
								$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function edit($id_nilai)
	{
		$mapel = $this->Mapel_model->cariGuru($this->session->userdata('username'));

		$nilai = $this->Nilai_model->detail2($mapel->id_pelajaran,$id_nilai);
		$valid = $this->form_validation;
		$valid->set_rules('tugas','tugas','required',array(
			'required'			=>'tugas harus diisi'));
		$valid->set_rules('uts','uts','required',array(
			'required'			=>'uts harus diisi'));
		$valid->set_rules('uas','uas','required',array(
			'required'			=>'uas harus diisi'));
		

		if($valid->run()){
            $i= $this->input;
			$nilai = ($i->post('tugas')*0.4)+($i->post('uts')*0.3)+($i->post('uas')*0.3);
			$nilai = round($nilai,2);

            $data = array(  
				'id_nilai'			=> $id_nilai,
                'id_pelajaran'		=> $i->post('id_pelajaran'),
				'nis'				=> $i->post('nis'),
				'tugas'				=> $i->post('tugas'),
				'uts'				=> $i->post('uts'),
				'uas'				=> $i->post('uas'),
				'nilai'				=> $nilai
                
            );

            $this->Nilai_model->edit($data);
            $this->session->set_flashdata('sukses', 'data telah ditambah');
            redirect(base_url('nilai/kelas'), 'refresh'); 

            
        }
			//end validasi
				$data = array('title' => 'Tambah Nilai Siswa',
								'nilai' => $nilai,
								'isi' => 'nilai/edit');
								$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//end edit

	public function delete($id_kelas){
		
		$data = array('id_kelas'	=> $id_kelas);
		$this->Kelas_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Di Hapus');
		redirect(base_url('kelas'),'refresh');
	}

	public function laporan_pdf($id_kelas){

        $this->data['siswa'] = $this->Siswa_model->nilaiList($id_kelas);
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan%20nilai%20siswa.pdf";
        $this->pdf->load_view('nilai/cetak_pdf', $this->data, TRUE);
    
    
    }

	public function laporan_pdf2($nis){

        $this->data['nilai'] = $this->Nilai_model->laporan2($nis);
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan%20nilai%20siswa.pdf";
        $this->pdf->load_view('nilai/cetak_pdf_siswa', $this->data, TRUE);
    
    
    }


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */