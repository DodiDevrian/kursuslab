<?php

class Profile extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
	}

    public function index()
    {
        $data = array(
            'title'   => 'Profile',
            'title2'  => 'Laboratorium Teknik Informatika',
            'isi'     => 'v_profile'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}