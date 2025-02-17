<?php

class Pretest extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_pretest');
        $this->load->model('M_auth');
	}

    public function do($id_materi)
    {
        $data = array(
            'title'         => 'Pretest',
            'title2'        => 'Laboratorium Teknik Informatika',
            'list_kursus'   => $this->m_kursus->lists(),
            'materi'        => $this->m_kursus->detail_materi($id_materi),
            'id'            => $this->uri->segment(3),
            'isi'           => 'pretest/v_do_pretest'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}