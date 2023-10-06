<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model');
		$this->load->model('User_model');

		if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Silahkan login terlebih dahulu.!</div>');
						redirect(base_url('login'),'refresh');
		}
	}

	public function index()
    {
        $pegawai = $this->Pegawai_model->data();
            $data = array('title'  => 'Data Pegawai',
                          'pegawai' => $pegawai,
                          'isi'    => 'pegawai/list'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

	public function tambah()
	{
		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nip','nip','required|is_unique[pegawai.nip]',array(
			'required'			=>'nip harus diisi',
            'is_unique'		=> 'nip <strong>'.$this->input->post('nip').
            '&nbsp; </strong> sudah ada. Buat nip baru'));

		$valid->set_rules('nama_pegawai','nama_pegawai','required',array(
			'required'			=>'Nama pegawai harus diisi'));
		


		if($valid->run()){

            if (!empty($_FILES['gambar1']['name'])) {
					
                $config['upload_path'] = './asset/upload/pegawai/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000'; // KB
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('gambar1')) {
                    $data = array('title' => 'Tambah Data pegawai',
                                'error' => $this->upload->display_errors('Ukuran file terlalu besar atau format file tidak sesuai'),
                                'isi' => 'pegawai/tambah');
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                }else {
                    $upload_data = array('uploads' => $this->upload->data());

                    $config['image_library']	=	'gd2';
                    $config['source_image']		=	'./asset/upload/pegawai/'.$upload_data['uploads']['file_name'];
                    $config['quality']			=	"100%";
                    $config['maintain_ratio']	=	TRUE;
                    $config['width']			=	360;
                    $config['height']			=	360;
                    $config['x_axis']			=	0;
                    $config['y_axis']			=	0;
                    $config['thumb_marker']		=	'';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $i= $this->input;
                        $data = array(  
                        	'nip'				=> $i->post('nip'),
							'nama_pegawai'		=> $i->post('nama_pegawai'),
							'status'			=> $i->post('status'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							'hp'			    => $i->post('hp'),
							'alamat'			=> $i->post('alamat'),
							'photo'			    => $upload_data['uploads']['file_name']
                        );

                        $dataU = array(  
                        	'username'			=> $i->post('nip'),
							'password'		    => password_hash(123456, PASSWORD_DEFAULT),
							'akses_level'		=> $i->post('akses_level')
							
                        );

                        $this->Pegawai_model->tambah($data);
                        $this->User_model->tambah($dataU);
                        $this->session->set_flashdata('sukses', 'data telah ditambah');
                        redirect(base_url('pegawai'), 'refresh');       
                    }

            }else {
                $i = $this->input;
                    $data = array(  'nip'				=> $i->post('nip'),
                                    'nama_pegawai'		=> $i->post('nama_pegawai'),
                                    'status'			=> $i->post('status'),
                                    'jenis_kelamin'		=> $i->post('jenis_kelamin'),
                                    'tempat_lahir'		=> $i->post('tempat_lahir'),
                                    'tanggal_lahir'		=> $i->post('tanggal_lahir'),
                                    'hp'			    => $i->post('hp'),
                                    'alamat'			=> $i->post('alamat'));

                    $dataU = array(  
                        'username'			=> $i->post('nip'),
                        'password'		    => password_hash(123456, PASSWORD_DEFAULT),
                        'akses_level'		=> $i->post('akses_level')
                        
                    );

                    $this->Pegawai_model->tambah($data);
                    $this->User_model->tambah($dataU);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah');
                    redirect(base_url('pegawai'),'refresh');
            }
        }
			//end validasi
				$data = array('title' => 'Tambah Data Pegawai',
								'isi' => 'pegawai/tambah');
								$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function edit($nip)
	{
		$pegawai = $this->Pegawai_model->detail($nip);
		$user = $this->User_model->detail($nip);
		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_pegawai','nama_pegawai','required',array(
			'required'			=>'Nama pegawai harus diisi'));
		

		if($valid->run()){
			

			if (!empty($_FILES['gambar1']['name'])) {
				
				$config['upload_path'] = './asset/upload/pegawai/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size']  = '20000';
				$config['max_width']  = '20000';
				$config['max_height']  = '20000';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar1')){
					$data = array('title' => 'Edit Data Pegawai',
									'user'	=> $user,
									'pegawai'	=> $pegawai,
									'error' => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
									'isi' => 'pegawai/edit');
									$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data = array('uploads' => $this->upload->data());

					$config['image_library']	=	'gd2';
					$config['source_image']		=	'./asset/upload/pegawai/'.$upload_data['uploads']['file_name'];
					$config['quality']			=	"100%";
					$config['maintain_ratio']	=	TRUE;
					$config['width']			=	360;
					$config['height']			=	360;
					$config['x_axis']			=	0;
					$config['y_axis']			=	0;
					$config['thumb_marker']		=	'';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

						$i = $this->input;
						$data = array(  'nip'				=> $nip,
									'nama_pegawai'		=> $i->post('nama_pegawai'),
									'status'			=> $i->post('status'),
									'jenis_kelamin'		=> $i->post('jenis_kelamin'),
									'tempat_lahir'		=> $i->post('tempat_lahir'),
									'tanggal_lahir'		=> $i->post('tanggal_lahir'),
									'hp'			    => $i->post('hp'),
									'alamat'			=> $i->post('alamat'),
									'photo'			    => $upload_data['uploads']['file_name']
									);

						$dataU = array(  
							'username'			=> $i->post('nip'),
							'akses_level'		=> $i->post('akses_level')
							
						);
						
						$id = $this->db->get_where('pegawai',['nip' => $nip])->row();
						unlink("./asset/upload/pegawai/".$id->photo);

						$this->Pegawai_model->edit($data);
						$this->User_model->edit($dataU);
						$this->session->set_flashdata('sukses', 'data telah diedit');
						redirect(base_url('pegawai'),'refresh');
					
				}
			
			//end cek data gambar
			}else{
				$i = $this->input;
				$data = array('nip'				=> $nip,
							'nama_pegawai'		=> $i->post('nama_pegawai'),
							'status'			=> $i->post('status'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							'hp'			    => $i->post('hp'),
							'alamat'			=> $i->post('alamat'));

				$dataU = array(  
					'username'			=> $i->post('nip'),
					'akses_level'		=> $i->post('akses_level')
					
				);

				$this->Pegawai_model->edit($data);
				$this->User_model->edit($dataU);
				$this->session->set_flashdata('sukses', 'data berhasil diedit');
				redirect(base_url('pegawai'),'refresh');
				

				
			}
		
		//end valid
		}else{
			
			$data = array('title' => 'Edit Data User',
			'user'	=> $user,
			'pegawai'	=> $pegawai,
			'isi' => 'pegawai/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}
	}
	//end edit

	public function delete($nip){
		$id = $this->db->get_where('pegawai',['nip' => $nip])->row();
		unlink("./asset/upload/pegawai/".$id->photo);
		$dataU = array('username' => $nip);
		$this->User_model->delete1($dataU);
		$data = array('nip'	=> $nip);
		$this->Pegawai_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Di Hapus');
		redirect(base_url('pegawai'),'refresh');
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */