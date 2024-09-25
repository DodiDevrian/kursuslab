<?php

class Diskusi extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_diskusi');
        $this->load->model('m_kursus');
	}

    public function index()
    {
        $data = array(
            'title'   => 'Forum Diskusi',
            'title2'  => 'Laboratorium Teknik Informatika',
            'diskusi'   => $this->m_diskusi->lists(),
            'kursus'    => $this->m_kursus->lists(),
            'isi'     => 'v_diskusi'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}