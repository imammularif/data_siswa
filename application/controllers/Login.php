<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');

		
	}

	public function index()
	{
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required',
			    array('required' => 'Username harus diisi' ));
		$valid->set_rules('password','Password','required|min_length[6]', 
			    array('required' => 'Password harus diisi',
			    	  'min_length' => 'password minimal 6 karakter' ));
		if ($valid->run()=== FALSE) {
			
			$data = array('title' => 'Login Pengolahan Nilai Siswa' );
			$this->load->view('login_view', $data, FALSE);	

			}else{
				$this->_login();
				
			}
	}

	private function _login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',array('username' => $username))->row();
		
		// JIKA usernya ada
		if($user){
			// cek password
			if(password_verify($password, $user->password)){
				$data = array(
					'username' => $user->username,
					'akses_level' => $user->akses_level,
					'id_user' => $user->id_user
				);
				$this->session->set_userdata($data);
				if($user->akses_level == 'TU'){
					redirect(base_url('welcome'),'refresh');
				}else if($user->akses_level == 'Guru'){
					redirect(base_url('nilai/kelas'),'refresh');
				}else if($user->akses_level == 'SISWA'){
				redirect(base_url('nilai/perorangan'),'refresh');
				}else{
					redirect(base_url('login'),'refresh');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" 
				role="alert">Password salah!</div>');
				redirect(base_url('login'),'refresh');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" 
			role="alert">Username tidak terdaftar</div>');
			redirect(base_url('login'),'refresh');
		}
	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('akses_level');

		$this->session->set_flashdata('message', '<div class="alert alert-success" 
		role="alert">Berhasil Logout!</div>');
		redirect(base_url('login'),'refresh');
	}


	public function changePassword()
	{
		$data['user'] = $this->db->get_where('user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$valid = $this->form_validation;
		$valid->set_rules('passwordLama','Password Lama','required|trim');
		$valid->set_rules('password1','Password Baru','required|trim|min_length[6]|matches[password2]');
		$valid->set_rules('password2','Ulangi Password Baru','required|trim|min_length[6]|matches[password1]');

		if ($valid->run()=== FALSE) {
			
			$data = array('title'  => 'Ganti Password',
                          'isi'    => 'changePassword'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);	

		}else{
			$passwordLama = $this->input->post('passwordLama');
			$passwordBaru = $this->input->post('password1');
			
			if(!password_verify($passwordLama, $data['user']['password'])){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password Lama Salah!</div>');
				redirect(base_url('login/changePassword'),'refresh');
			}else{
				if($passwordLama == $passwordBaru){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
					redirect(base_url('login/changePassword'),'refresh');
				}else{
				
					$password_hash = password_hash($passwordBaru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Password Berhasil di Update</div>');
					redirect(base_url('login/changePassword'),'refresh');
				}
			}
		}

	}
		
}



/* End of file login.php */
/* Location: ./application/controllers/login.php */