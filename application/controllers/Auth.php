<?php 

class Auth extends CI_Controller {

	public function login(){

			$this->form_validation->set_rules('username', 'Username', 'required',[
				'required' => 'Username wajib diisi!']);
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',[
				'required' => 'Password wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_login');
		}else{
			$auth = $this->M_auth->cek_login();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password</strong> Salah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('login');
			}else {
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('id_user', $auth->id_user);
				$this->session->set_userdata('role', $auth->role);
				
				switch($auth->role){
					case 0 : redirect('owner/dashboard_owner');
							break;

					case 1 : redirect('admin/dashboard');
							break;

					case 2 : redirect('home');
							break;

					default : break;
				}
			}
		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('home');
	}
}