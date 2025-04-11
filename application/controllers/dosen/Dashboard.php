<?php

class Dashboard extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_materi');
        $this->load->model('m_dosen');

        if ($this->session->userdata('role') != 2 ) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Dosen!</strong>
				</div>');
			redirect('auth/login_admin');
		}
	}

    public function profile($id_admin)
    {
        $data = array(
            'title' => 'Dosen',
            'title2' => 'Dashboard',
            'kursus'   => $this->m_kursus->lists(),
            'profile' => $this->m_dosen->profile($id_admin),
            'dosen'        => $this->m_dosen->lists(),
            'id'      => $this->uri->segment(4),
            'isi'   => 'dosen/kursus/v_list'
        );
        $this->load->view('dosen/layout/v_wrapper', $data, FALSE);
    }
    
}
