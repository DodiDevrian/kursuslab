<?php

class Diskusi extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_diskusi');
        $this->load->model('m_asprak');

        if ($this->session->userdata('role')!=4) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Admin!</strong>
				</div>');
			redirect('auth/login');
		}
	}

    public function index()
    {
        $data = array(
            'title'         => 'Forum Diskusi',
            'title2'        => 'Laboratorium Teknik Informatika',
            'diskusi'        => $this->m_diskusi->lists(),
            'asprak'   => $this->m_asprak->lists(),
            'isi'           => 'asprak/diskusi/v_list'
        );
        $this->load->view('asprak/layout/v_wrapper', $data, FALSE);
    }
}