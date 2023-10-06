<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');
		$this->load->model('User_model');
		$this->load->model('Kelas_model');

        if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Silahkan login terlebih dahulu.!</div>');
						redirect(base_url('login'),'refresh');
		}
	}

	public function index()
    {
        $siswa = $this->Siswa_model->data();
            $data = array('title'  => 'Data Siswa',
                          'siswa' => $siswa,
                          'isi'    => 'siswa/list'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

	public function tambah()
	{
		$kelas = $this->Kelas_model->data();

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nis','nis','required|is_unique[siswa.nis]',array(
			'required'			=>'nis harus diisi',
            'is_unique'		=> 'nis <strong>'.$this->input->post('nis').
            '&nbsp; </strong> sudah ada. Buat nis baru'));

		$valid->set_rules('nama_siswa','nama_siswa','required',array(
			'required'			=>'Nama siswa harus diisi'));
		


		if($valid->run()){

            if (!empty($_FILES['gambar1']['name'])) {
					
                $config['upload_path'] = './asset/upload/siswa/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000'; // KB
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('gambar1')) {
                    $data = array('title' => 'Tambah Data siswa',
                                'kelas'	=> $kelas,
                                'error' => $this->upload->display_errors('Ukuran file terlalu besar atau format file tidak sesuai'),
                                'isi' => 'siswa/tambah');
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                }else {
                    $upload_data = array('uploads' => $this->upload->data());

                    $config['image_library']	=	'gd2';
                    $config['source_image']		=	'./asset/upload/siswa/'.$upload_data['uploads']['file_name'];
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
                        	'nis'				=> $i->post('nis'),
							'nama_siswa'		=> $i->post('nama_siswa'),
							'id_kelas'			=> $i->post('id_kelas'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							'hp_siswa'			=> $i->post('hp_siswa'),
							'hp_ortu'			=> $i->post('hp_ortu'),
							'alamat'			=> $i->post('alamat'),
							'photo'			    => $upload_data['uploads']['file_name']
                        );

                        $dataU = array(  
                        	'username'			=> $i->post('nis'),
							'password'		    => password_hash(123456, PASSWORD_DEFAULT),
							'akses_level'		=> "SISWA"
							
                        );

                        $this->Siswa_model->tambah($data);
                        $this->User_model->tambahSiswa($dataU);
                        $this->session->set_flashdata('sukses', 'data telah ditambah');
                        redirect(base_url('siswa'), 'refresh');       
                    }

            }else {
                $i = $this->input;
                    $data = array(  'nis'				=> $i->post('nis'),
									'nama_siswa'		=> $i->post('nama_siswa'),
									'id_kelas'			=> $i->post('id_kelas'),
									'jenis_kelamin'		=> $i->post('jenis_kelamin'),
									'tempat_lahir'		=> $i->post('tempat_lahir'),
									'tanggal_lahir'		=> $i->post('tanggal_lahir'),
									'hp_siswa'			=> $i->post('hp_siswa'),
									'hp_ortu'			=> $i->post('hp_ortu'),
									'alamat'			=> $i->post('alamat'));

                    $dataU = array(  
                            'username'			=> $i->post('nis'),
							'password'		    => password_hash(123456, PASSWORD_DEFAULT),
							'akses_level'		=> "SISWA"
                        
                    );

                    $this->Siswa_model->tambah($data);
                    $this->User_model->tambahSiswa($dataU);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah');
                    redirect(base_url('siswa'),'refresh');
            }
        }
			//end validasi
				$data = array('title' => 'Tambah Data siswa',
                                'kelas'	=> $kelas,
								'isi' => 'siswa/tambah');
								$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function edit($nis)
	{
		$siswa = $this->Siswa_model->detail($nis);
		$user = $this->User_model->detail($nis);
		$kelas = $this->Kelas_model->data();
		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_siswa','nama_siswa','required',array(
			'required'			=>'Nama siswa harus diisi'));
		

		if($valid->run()){
			

			if (!empty($_FILES['gambar1']['name'])) {
				
				$config['upload_path'] = './asset/upload/siswa/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size']  = '20000';
				$config['max_width']  = '20000';
				$config['max_height']  = '20000';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar1')){
					$data = array('title' => 'Edit Data Siswa',
									'user'	=> $user,
									'kelas'	=> $kelas,
									'siswa'	=> $siswa,
									'error' => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
									'isi' => 'siswa/edit');
									$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data = array('uploads' => $this->upload->data());

					$config['image_library']	=	'gd2';
					$config['source_image']		=	'./asset/upload/siswa/'.$upload_data['uploads']['file_name'];
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
						$data = array(  'nis'				=> $nis,
                                        'nama_siswa'		=> $i->post('nama_siswa'),
                                        'id_kelas'			=> $i->post('id_kelas'),
                                        'jenis_kelamin'		=> $i->post('jenis_kelamin'),
                                        'tempat_lahir'		=> $i->post('tempat_lahir'),
                                        'tanggal_lahir'		=> $i->post('tanggal_lahir'),
                                        'hp_siswa'			=> $i->post('hp_siswa'),
                                        'hp_ortu'			=> $i->post('hp_ortu'),
                                        'alamat'			=> $i->post('alamat'),
                                        'photo'			    => $upload_data['uploads']['file_name']
									);

						
						$id = $this->db->get_where('siswa',['nis' => $nis])->row();
						unlink("./asset/upload/siswa/".$id->photo);

						$this->Siswa_model->edit($data);
						$this->session->set_flashdata('sukses', 'data telah diedit');
						redirect(base_url('siswa'),'refresh');
					
				}
			
			//end cek data gambar
			}else{
				$i = $this->input;
				$data = array('nis'				=> $nis,
                                'nama_siswa'		=> $i->post('nama_siswa'),
                                'id_kelas'			=> $i->post('id_kelas'),
                                'jenis_kelamin'		=> $i->post('jenis_kelamin'),
                                'tempat_lahir'		=> $i->post('tempat_lahir'),
                                'tanggal_lahir'		=> $i->post('tanggal_lahir'),
                                'hp_siswa'			=> $i->post('hp_siswa'),
                                'hp_ortu'			=> $i->post('hp_ortu'),
                                'alamat'			=> $i->post('alamat'));


				$this->Siswa_model->edit($data);
				$this->session->set_flashdata('sukses', 'data berhasil diedit');
				redirect(base_url('siswa'),'refresh');
				

				
			}
		
		//end valid
		}else{
			
			$data = array('title' => 'Edit Data User',
			'user'	=> $user,
            'kelas'	=> $kelas,
			'siswa'	=> $siswa,
			'isi' => 'siswa/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}
	}
	//end edit

	public function delete($nis){
		$id = $this->db->get_where('siswa',['nis' => $nis])->row();
		unlink("./asset/upload/siswa/".$id->photo);
		$dataU = array('username' => $nis);
		$this->User_model->delete1($dataU);
		$data = array('nis'	=> $nis);
		$this->Siswa_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Di Hapus');
		redirect(base_url('siswa'),'refresh');
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */