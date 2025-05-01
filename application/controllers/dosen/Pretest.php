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

        if ($this->session->userdata('role')!=2) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Admin!</strong>
				</div>');
			redirect('auth/login_admin');
		}
	}

    public function index()
    {
        $data = array(
            'title'   => 'Pre-Test',
            'title2'  => 'Laboratorium Teknik Informatika',
            'dosen'        => $this->m_dosen->lists(),
            'count_new'     => $this->m_praktikan->lists(),
            'pretest'   => $this->m_pretest->lists(),
            'materi'   => $this->m_materi->lists(),
            'isi'     => 'admin/pretest/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function soal($id_materi)
    {
        $data = array(
            'title'         => 'Soal Pre-Test',
            'title2'        => 'Laboratorium Teknik Informatika',
            'dosen'        => $this->m_dosen->lists(),
            'count_new'     => $this->m_praktikan->lists(),
            'materi'        => $this->m_kursus->detail_materi($id_materi),
            'pretest'       => $this->m_pretest->lists_soal(),
            'kunci_list'    => $this->m_pretest->list_kunci(),
            'kunci'       => $this->m_pretest->kunci($id_materi),
            // 'keypretest'    => $this->m_pretest->keypretest(),
            'id'            => $this->uri->segment(4),
            'isi'           => 'dosen/pretest/v_list'
        );
        $this->load->view('dosen/layout/v_wrapper', $data, FALSE);
    }

    public function hasil()
    {
        $data = array(
            'title' => 'Admin',
            'title2' => 'Dashboard',
            'count_new'     => $this->m_praktikan->lists(),
            'dosen'        => $this->m_dosen->lists(),
            'id'            => $this->uri->segment(5),
            'isi'   => 'dosen/pretest/v_hasil'
        );
        $this->load->view('dosen/layout/v_wrapper', $data, FALSE);
    }

}