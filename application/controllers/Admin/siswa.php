<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
       $this->load->model('Siswa_model');


	}

	public function index()
	{
		$siswa = $this->Siswa_model->data();
            $data = array('title'  => 'Data siswa',
                'siswa' => $siswa,
              'isi'  => 'admin/siswa/data');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function tambah(){
		$valid = $this->form_validation;
            $valid->set_rules('nis','NIS','required',array('required'=> '%s Harus di isi'));

            
             if ($valid->run() === FALSE) {
                

                   
                        $data = array('title' => 'Tambah Data siswa',
                                    'error' => $this->upload->display_errors('Ukuran file terlalu besar'),
                                    'isi' => 'admin/siswa/tambah');
                        $this->load->view('admin/layout/wrapper', $data, FALSE);
                    }else{

                        $i= $this->input;
                        $data = array('nis'        => $i->post('nis'),  
                                'nama'        => $i->post('nama'),
                                'kelas'       => $i->post('kelas'),
                                'j_kelamin'    => $i->post('j_kelamin'),
                                'tempat_lahir'    => $i->post('tempat_lahir'),
                                'tanggal_lahir'    => $i->post('tanggal_lahir'),
                                'hp_siswa' => $i->post('hp_siswa'),
                                'hp_ortu' => $i->post('hp_ortu'),
                                'alamat'  => $i->post('alamat'));

                        $this->Siswa_model->tambah($data);
                        $this->session->set_flashdata('sukses', 'data telah ditambah');
                        redirect(base_url('admin/siswa'), 'refresh');        
                    }
}

    public function edit($nik)
    {
    	$siswa = $this->Siswa_model->detail($nik);
            $valid = $this->form_validation;
             $valid->set_rules('nis','NIS','required',array('required'=> '%s Harus di isi'));

            if ($valid->run()) {
                if (!empty($_FILES['photo']['name'])) {
                    $config['upload_path'] = './asset/siswa';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '20000';
                    $config['max_width'] = '20000';
                    $config['max_height'] = '20000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('photo')) {
                        $data = array('title' => 'Edit Data siswa',
                                    'siswa' => $siswa,
                                    'error' => $this->upload->display_errors('Ukuran file terlalu besar'),
                                    'isi' => 'admin/siswa/edit');
                        $this->load->view('admin/layout/wrapper', $data, FALSE);
                    }else {
                        $upload_data = array('uploads' => $this->upload->data());

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './gambar/siswa/'.$upload_data['uploads']['file_name'];
                        $config['quality'] = "100%";
                        $config['maintain_ratio'] = TRUE;
                        $config['width'] = 360;
                        $config['height'] = 360;
                        $config['x_axis'] = 0;
                        $config['y_axis'] = 0;
                        $config['thumb_marker'] = '';
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        if (!empty($_POST['password'])) {
                            $i= $this->input;
                            $data = array( 'nis'        => $i->post('nis'),  
                                'nama'        => $i->post('nama'),
                                'kelas'       => $i->post('kelas'),
                                'j_kelamin'    => $i->post('j_kelamin'),
                                'tempat_lahir'    => $i->post('tempat_lahir'),
                                'tanggal_lahir'    => $i->post('tanggal_lahir'),
                                'hp_siswa' => $i->post('hp_siswa'),
                                'hp_ortu' => $i->post('hp_ortu'),
                                'alamat'  => $i->post('alamat'));

                            $this->Siswa_model->edit($data);
                            $this->session->set_flashdata('sukses', 'data telah diedit');
                            redirect(base_url('admin/siswa'), 'refresh');        
                        }    
                        }
            }else {
                $i = $this->input;
                $data = array(  'nis'        => $i->post('nis'),  
                                'nama'        => $i->post('nama'),
                                'kelas'       => $i->post('kelas'),
                                'j_kelamin'    => $i->post('j_kelamin'),
                                'tempat_lahir'    => $i->post('tempat_lahir'),
                                'tanggal_lahir'    => $i->post('tanggal_lahir'),
                                'hp_siswa' => $i->post('hp_siswa'),
                                'hp_ortu' => $i->post('hp_ortu'),
                                'alamat'  => $i->post('alamat'));

                        $this->Siswa_model->edit($data);
                        $this->session->set_flashdata('sukses', 'Data telah diedit');
                        redirect(base_url('admin/siswa'),'refresh');
                }
        }
        $data = array('title' => 'Edit Data siswa',
        'siswa' => $siswa,
        'isi' => 'admin/siswa/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    public function delete($nis){
    	$data = array('nis' => $nis);
            $this->Siswa_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/siswa'),'refresh');
}
}
?>