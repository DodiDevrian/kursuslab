<?php

class Admin extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
	}

    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'title2' => 'Dashboard',
            'isi'   => 'admin/v_dashboard'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
}
