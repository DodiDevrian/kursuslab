<?php 

class Auth extends CI_Controller {

	public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_clogin');
        $this->load->model('m_praktikan');
	}

	public function login(){
			$this->form_validation->set_rules('email', 'Email', 'required',[
				'required' => 'Email wajib diisi!']);
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
				$this->session->set_userdata('id_user', $auth->id_user);
				$this->session->set_userdata('role', $auth->role);
				$this->session->set_userdata('nama_user', $auth->nama_user);
				$this->session->set_userdata('email', $auth->email);
				$this->session->set_userdata('foto_user', $auth->foto_user);
				$this->session->set_userdata('status_if', $auth->status_if);
				$this->session->set_userdata('slug_user', $auth->slug_user);

				switch($auth->role){
					case 3 :
							if ($auth->status_if == 'Yes') {
								redirect('home');
							}else {
								redirect('notif');
							}
							break;

					case 4 : redirect('home');
							break;

					default : break;
				}
			}
		}
	}

	public function slogin(){
		$this->form_validation->set_rules('email', 'Email', 'required',[
			'required' => 'Email wajib diisi!']);
		$this->form_validation->set_rules('spassword', 'Password', 'required|min_length[6]',[
			'required' => 'Password wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'clogin'       => $this->m_clogin->lists(),
			);
			$this->load->view('login/v_slogin_user', $data, FALSE);
		}else{
			$auth = $this->M_auth->cek_slogin();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username atau Password</strong> Salah!
				</div>');
				redirect('auth/login');
			}else {
				$this->session->set_userdata('id_user', $auth->id_user);
				$this->session->set_userdata('role', $auth->role);
				$this->session->set_userdata('nama_user', $auth->nama_user);
				$this->session->set_userdata('email', $auth->email);
				$this->session->set_userdata('foto_user', $auth->foto_user);
				$this->session->set_userdata('status_if', $auth->status_if);
				$this->session->set_userdata('slug_user', $auth->slug_user);

				switch($auth->role){
					case 3 :
							if ($auth->status_if == 'Yes') {
								redirect('home');
							}else {
								redirect('notif');
							}
							break;

					case 4 : redirect('home');
							break;

					default : break;
				}
			}
		}
	}

	public function login_admin(){
		$this->form_validation->set_rules('email', 'Email', 'required',[
			'required' => 'Email wajib diisi!']);
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
				<strong>Email atau Password</strong> Salah!
				</div>');
				redirect('auth/login_admin');
			}else {
				$this->session->set_userdata('id_admin', $auth->id_admin);
				$this->session->set_userdata('role', $auth->role);
				$this->session->set_userdata('nama_dosen', $auth->nama_dosen);
				$this->session->set_userdata('nip', $auth->nip);
				$this->session->set_userdata('email', $auth->email);
				$this->session->set_userdata('foto_dosen', $auth->foto_dosen);
				
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

	public function register()
	{
		$this->form_validation->set_rules('nama_user', 'Nama Praktikan', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_user/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_user')) {

                $data = array(
                    'title'     => 'Register',
                    'title2'    => 'Buat Akun',
                    'error'     => $this->upload->display_errors(),
					'clogin'    => $this->m_clogin->lists(),
                );
                $this->load->view('login/v_register', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_user/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'password'     => md5($this->input->post('password')),
					'spassword'     => 'b398b8a18ef4f69811a32cf169946bac',
                    'role'         => 3,
                    'nama_user'    => $this->input->post('nama_user'),
                    'nim'          => $this->input->post('nim'),
                    'email'        => $this->input->post('email'),
					'slug_user'    => url_title($this->input->post('nama_user'), 'dash', TRUE),
                    'foto_user'    => $upload_data['uploads']['file_name']
                );

                $this->m_praktikan->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
                redirect('auth/login');
            }
        }
        $data = array(
            'title'     => 'Register',
            'title2'    => 'Buat Akun',
			'clogin'       => $this->m_clogin->lists(),
        );
        $this->load->view('login/v_register', $data, FALSE);
    }

	public function logout(){

		$this->session->sess_destroy();
		redirect('auth/login');
	}

	public function logout_admin(){

		$this->session->sess_destroy();
		redirect('auth/login_admin');
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
}