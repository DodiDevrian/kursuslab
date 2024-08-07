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
            'pretest'       => $this->m_pretest->lists_soal(),
            'keypretest'    => $this->m_pretest->keypretest(),
            'id'            => $this->uri->segment(4),
            'isi'           => 'admin/pretest/v_list_pretest'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add($id_materi)
    {
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        $this->form_validation->set_rules('jawaban_a', 'Jawaban A', 'required');
        $this->form_validation->set_rules('jawaban_b', 'Jawaban B', 'required');
        $this->form_validation->set_rules('jawaban_c', 'Jawaban C', 'required');
        $this->form_validation->set_rules('jawaban_d', 'Jawaban D', 'required');
        $this->form_validation->set_rules('jawaban_e', 'Jawaban E', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Soal',
                'title2'        => 'Tambah Data Soal',
                'materi'        => $this->m_kursus->detail_materi($id_materi),
                'pretest'       => $this->m_pretest->lists_soal(),
                'id'            => $this->uri->segment(4),
                'isi'           => 'admin/pretest/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {


            $data = array(
                'id_materi'     => $this->input->post('id_materi'),
                'soal'          => $this->input->post('soal'),
                'id_materi'     => $this->input->post('id_materi'),
                'jawaban_a'     => $this->input->post('jawaban_a'),
                'jawaban_b'     => $this->input->post('jawaban_b'),
                'jawaban_c'     => $this->input->post('jawaban_c'),
                'jawaban_d'     => $this->input->post('jawaban_d'),
                'jawaban_e'     => $this->input->post('jawaban_e'),
                'sum'           => 1

            );

            $this->m_pretest->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            
            $referred_from = $this->session->userdata('halaman_soal');
            redirect($referred_from, 'refresh');
        }
    }

    public function add_keypretest($id_materi)
	{
		$data = array(
			'id_materi'     => $id_materi,
			'jawaban_1' 	=> $this->input->post('jawaban_1'),
            'jawaban_2' 	=> $this->input->post('jawaban_2'),
            'jawaban_3' 	=> $this->input->post('jawaban_3'),
            'jawaban_4' 	=> $this->input->post('jawaban_4'),
            'jawaban_5' 	=> $this->input->post('jawaban_5'),
		);

		$this->m_pretest->add_keypretest($data);
		$this->session->set_flashdata('pesan', 'Kunci Jawaban Berhasil Dibuat!');

		$referred_from = $this->session->userdata('halaman_soal');
        redirect($referred_from, 'refresh');
	}

    public function edit_keypretest($id_materi)
	{
		$data = array(
			'id_materi'     => $id_materi,
			'jawaban_1' 	=> $this->input->post('jawaban_1'),
            'jawaban_2' 	=> $this->input->post('jawaban_2'),
            'jawaban_3' 	=> $this->input->post('jawaban_3'),
            'jawaban_4' 	=> $this->input->post('jawaban_4'),
            'jawaban_5' 	=> $this->input->post('jawaban_5'),
		);

		$this->m_pretest->edit_keypretest($data);
		$this->session->set_flashdata('pesan', 'Kunci Jawaban Berhasil Diubah!');

		$referred_from = $this->session->userdata('halaman_soal');
        redirect($referred_from, 'refresh');
	}
    

}