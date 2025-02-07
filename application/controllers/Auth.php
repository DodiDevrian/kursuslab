<?php 

class Auth extends CI_Controller {

	public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_clogin');
	}

	public function login(){
			$this->form_validation->set_rules('username', 'Username', 'required',[
				'required' => 'Username wajib diisi!']);
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',[
				'required' => 'Password wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'clogin'       => $this->m_clogin->lists(),
			);
			$this->load->view('login/v_login_user', $data, FALSE);
		}else{
			$auth = $this->M_auth->cek_login();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password</strong> Salah!
				</div>');
				redirect('auth/login');
			}else {
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('id_user', $auth->id_user);
				$this->session->set_userdata('role', $auth->role);
				$this->session->set_userdata('nama_user', $auth->nama_user);
				$this->session->set_userdata('nim', $auth->nim);
				$this->session->set_userdata('email', $auth->email);
				$this->session->set_userdata('foto_user', $auth->foto_user);
				$this->session->set_userdata('slug_user', $auth->slug_user);

				switch($auth->role){
					case 3 : redirect('home');
							 break;

					case 4 : redirect('home');
						     break;

					default : break;
				}
			}
		}
	}

	public function login_admin(){
		$this->form_validation->set_rules('username', 'Username', 'required',[
			'required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',[
			'required' => 'Password wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'clogin'       => $this->m_clogin->lists(),
			);
			$this->load->view('login/v_login_admin', $data, FALSE);
		}else{
			$auth = $this->M_auth->cek_login_admin();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username atau Password</strong> Salah!
				</div>');
				redirect('auth/login_admin');
			}else {
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('id_admin', $auth->id_admin);
				$this->session->set_userdata('role', $auth->role);
				$this->session->set_userdata('nama_dosen', $auth->nama_dosen);
				$this->session->set_userdata('foto_user', $auth->foto_user);
				
				switch($auth->role){
					case 1 : redirect('admin/dashboard');
							 break;

					case 2 : redirect('dosen/dashboard');
							 break;

					default : break;
				}
			}
		}
	}

	public function login_asprak(){
		$this->form_validation->set_rules('username', 'Username', 'required',[
			'required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',[
			'required' => 'Password wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/v_login_asprak');
		}else{
			$auth = $this->M_auth->cek_login_asprak();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username atau Password</strong> Salah!
				</div>');
				redirect('auth/login_asprak');
			}else {
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('id_asprak', $auth->id_asprak);
				$this->session->set_userdata('role', $auth->role);
				$this->session->set_userdata('foto_asprak', $auth->foto_asprak);
				
				redirect('asisten/dashboard');
			}
		}
	}

	public function login_dosen(){
		$this->form_validation->set_rules('username', 'Username', 'required',[
			'required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',[
			'required' => 'Password wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/v_login_dosen');
		}else{
			$auth = $this->M_auth->cek_login_dosen();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username atau Password</strong> Salah!
				</div>');
				redirect('auth/login_dosen');
			}else {
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('id_dosen', $auth->id_dosen);
				$this->session->set_userdata('role', $auth->role);
				$this->session->set_userdata('foto_dosen', $auth->foto_dosen);
				
				redirect('dosen/dashboard');
			}
		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('auth/login');
	}

	public function logout_admin(){

		$this->session->sess_destroy();
		redirect('auth/login_admin');
	}
}