<?php

class Kursus extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
	}
    
    public function index()
    {
        $data = array(
            'title'   => 'Kursus',
            'title2'  => 'Laboratorium Teknik Informatika',
            'kursus'   => $this->m_kursus->lists(),
            'isi'     => 'v_kursus'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function detail_kursus($id_kursus)
    {
        $data = array(
            'title'         => 'Kursus',
            'title2'        => 'Laboratorium Teknik Informatika',
            'kursus'        => $this->m_kursus->detail_kursus($id_kursus),
            'materi'        => $this->m_kursus->lists_materi(),
            'materi_button' => $this->m_kursus->lists_materi_button(),
            'id'            => $this->uri->segment(3),
            'isi'           => 'v_prolog'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function detail_materi($id_materi)
    {
        $data = array(
            'title'         => 'Kursus',
            'title2'        => 'Laboratorium Teknik Informatika',
            'materi'        => $this->m_kursus->detail_materi($id_materi),
            'lists_materi'  => $this->m_kursus->lists_materi(),
            'id'            => $this->uri->segment(4),
            'isi'           => 'v_detail_kursus'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}