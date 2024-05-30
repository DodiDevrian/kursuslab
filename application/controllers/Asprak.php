<?php

class Asprak extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_asprak');
	}

    public function index()
    {
        $data = array(
            'title'   => 'Asprak',
            'title2'  => 'Laboratorium Teknik Informatika',
            'asprak'   => $this->m_asprak->lists(),
            'isi'     => 'v_asprak'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}