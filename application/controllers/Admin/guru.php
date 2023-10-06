<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guru extends CI_Controller {
	public function __construct(){
		parent::__construct();
       $this->load->model('guru_model');


	}

	public function index()
	{
		$guru = $this->guru_model->data();
            $data = array('title'  => 'Data guru',
                'guru' => $guru,
              'isi'  => 'admin/guru/data');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function tambah(){
		$valid = $this->form_validation;
            $valid->set_rules('nip','nip','required',array('required'=> '%s Harus di isi'));

            
             if ($valid->run() === FALSE) {
                

                   
                        $data = array('title' => 'Tambah Data guru',
                                    'error' => $this->upload->display_errors('Ukuran file terlalu besar'),
                                    'isi' => 'admin/guru/tambah');
                        $this->load->view('admin/layout/wrapper', $data, FALSE);
                    }else{

                        $i= $this->input;
                        $data = array('id_guru'       => $i->post('id_guru'),
                                'nip'    => $i->post('nip'),
                                'nama_guru'    => $i->post('nama_guru'),
                                'status_guru'    => $i->post('status_guru'),
                                'jenip_kelamin_guru' => $i->post('jenip_kelamin_guru'),
                                'tempat_lahir_guru' => $i->post('tempat_lahir_guru'),
                                'hp_guru' => $i->post('hp_guru'),
                                'alamat_guru' => $i->post('alamat_guru'));
                                

                        $this->guru_model->tambah($data);
                        $this->session->set_flashdata('sukses', 'data telah ditambah');
                        redirect(base_url('admin/guru'), 'refresh');        
                    }
}

    public function edit($id_guru)
    {
    	$guru = $this->guru_model->detail($id_guru);
            $valid = $this->form_validation;
             $valid->set_rules('nama','nama','required',array('required'=> '%s Harus di isi'));

            if ($valid->run()) {
                if (!empty($_FILES['photo']['name'])) {
                    $config['upload_path'] = './asset/guru';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '20000';
                    $config['max_width'] = '20000';
                    $config['max_height'] = '20000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('photo')) {
                        $data = array('title' => 'Edit Data guru',
                                    'guru' => $guru,
                                    'error' => $this->upload->display_errors('Ukuran file terlalu besar'),
                                    'isi' => 'admin/guru/edit');
                        $this->load->view('admin/layout/wrapper', $data, FALSE);
                    }else {
                        $upload_data = array('uploads' => $this->upload->data());

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './gambar/guru/'.$upload_data['uploads']['file_name'];
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
                            $data = array('nama'       => $i->post('nama'),
                                'kelas'    => $i->post('kelas'),
                                'uts'    => $i->post('uts'),
                                'uas'    => $i->post('uas'),
                                'guru_tambahan' => $i->post('guru_tambahan'));
                                

                            $this->guru_model->edit($data);
                            $this->session->set_flashdata('sukses', 'data telah diedit');
                            redirect(base_url('admin/guru'), 'refresh');        
                        }    
                        }
            }else {
                $i = $this->input;
                  $data = array('id_guru'       => $i->post('id_guru'),
                                'nip'    => $i->post('nip'),
                                'nama_guru'    => $i->post('nama_guru'),
                                'status_guru'    => $i->post('status_guru'),
                                'jenip_kelamin_guru' => $i->post('jenip_kelamin_guru'),
                                'tempat_lahir_guru' => $i->post('tempat_lahir_guru'),
                                'hp_guru' => $i->post('hp_guru'),
                                'alamat_guru' => $i->post('alamat_guru'));
                                

                        $this->guru_model->edit($data);
                        $this->session->set_flashdata('sukses', 'Data telah diedit');
                        redirect(base_url('admin/guru'),'refresh');
                }
        }
        $data = array('title' => 'Edit Data guru',
        'guru' => $guru,
        'isi' => 'admin/guru/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    public function delete($nip){
    	$data = array('nip' => $nip);
            $this->guru_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/guru'),'refresh');
}
}
?>