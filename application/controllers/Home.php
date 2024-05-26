<?php

class Home extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_home');
	}
    
    public function index()
    {
        $data = array(
            'title'                 => 'Kursus Online',
            'title2'                => 'Laboratorium Teknik Informatika',
            'kursus_terakhir'       => $this->m_home->kursus_terakhir(),
            'isi'                   => 'v_home'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}