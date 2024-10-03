<?php

class Dashboard extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        if ($this->session->userdata('role') != 4 ) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Asprak!</strong>
				</div>');
			redirect('auth/login_asprak');
		}
	}

    public function index()
    {
        $data = array(
            'title' => 'Asprak',
            'title2' => 'Dashboard',
            'isi'   => 'asprak/v_dashboard'
        );
        $this->load->view('asprak/layout/v_wrapper', $data, FALSE);
    }
}
