<?php

class Pretest extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_materi');
        $this->load->model('m_dosen');
        $this->load->model('m_pretest');

        if ($this->agent->is_referral())
        {
            echo $this->agent->referrer();
        }

        if ($this->session->userdata('role')!=1) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Admin!</strong>
				</div>');
			redirect('auth/login');
		}
	}

    public function index()
    {
        $data = array(
            'title'   => 'Pre-Test',
            'title2'  => 'Laboratorium Teknik Informatika',
            'pretest'   => $this->m_pretest->lists(),
            'materi'   => $this->m_materi->lists(),
            'isi'     => 'admin/pretest/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function list_soal($id_materi)
    {
        $data = array(
            'title'         => 'Soal Pre-Test',
            'title2'        => 'Laboratorium Teknik Informatika',
            'materi'        => $this->m_kursus->detail_materi($id_materi),
            'pretest'        => $this->m_pretest->lists_soal(),
            'id'            => $this->uri->segment(4),
            'isi'           => 'admin/pretest/v_list_pretest'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
}