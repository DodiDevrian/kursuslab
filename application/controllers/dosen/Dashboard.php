<?php

class Dashboard extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        if ($this->session->userdata('role') != 2 ) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Dosen!</strong>
				</div>');
			redirect('auth/login');
		}
	}

    public function index()
    {
        $data = array(
            'title' => 'Dosen',
            'title2' => 'Dashboard',
            'isi'   => 'dosen/v_dashboard'
        );
        $this->load->view('dosen/layout/v_wrapper', $data, FALSE);
    }
}
