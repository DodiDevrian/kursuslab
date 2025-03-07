<?php

class Notif extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_home');
        $this->load->model('m_kursus');
        $this->load->model('m_asprak');
	}
    
    public function index()
    {
        $data = array(
            'title'                 => 'Kursus Online',
            'title2'                => 'Laboratorium Teknik Informatika',
            'isi'                   => 'v_notif'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}