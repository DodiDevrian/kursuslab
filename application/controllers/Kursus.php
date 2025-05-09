<?php

class Kursus extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_pretest');
        $this->load->model('m_posttest');
        $this->load->model('M_auth');

        
	}
    
    public function index()
    {
        $data = array(
            'title'   => 'Kursus',
            'title2'  => 'Laboratorium Teknik Informatika',
            'kursus'   => $this->m_kursus->lists(),
            'materi'        => $this->m_kursus->lists_materi(),
            'materi_button' => $this->m_kursus->lists_materi_button(),
            'isi'     => 'v_kursus'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);

    }

    public function detail_kursus($id_kursus)
    {

        $data = array(
            'title'         => 'Kursus',
            'title2'        => 'Laboratorium Teknik Informatika',
            'list_kursus'   => $this->m_kursus->lists(),
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
            'do_posttest'    => $this->m_posttest->do_posttest(),
            'do_pretest'    => $this->m_pretest->do_pretest(),
            'nilai'         => $this->m_posttest->nilai(),
            'id'            => $this->uri->segment(4),
            'cek_id'        => $this->uri->segment(3),
            'isi'           => 'v_detail_kursus'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);

        if ($this->session->userdata('role')=='') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai User!</strong>
				</div>');
			redirect('auth/login');
		}
    }
}