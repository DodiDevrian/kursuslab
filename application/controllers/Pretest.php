<?php

class Pretest extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('M_auth');
	}

    public function do($id_materi)
    {
        $data = array(
            'title'         => 'Pretest',
            'title2'        => 'Laboratorium Teknik Informatika',
            'list_kursus'        => $this->m_kursus->lists(),
            // 'kursus'        => $this->m_kursus->detail_kursus($id_kursus),
            'materi'        => $this->m_kursus->lists_materi(),
            'materi_button' => $this->m_kursus->lists_materi_button(),
            'id'            => $this->uri->segment(3),
            'isi'           => 'pretest/v_do_pretestss'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}