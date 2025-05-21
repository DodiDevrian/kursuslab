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
			redirect('auth/login_admin');
		}
	}

    public function index()
    {
        $data = array(
            'title'   => 'Pre-Test',
            'title2'  => 'Laboratorium Teknik Informatika',
            'count_new'     => $this->m_praktikan->lists(),
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
            'count_new'     => $this->m_praktikan->lists(),
            'materi'        => $this->m_kursus->detail_materi($id_materi),
            'pretest'       => $this->m_pretest->lists_soal(),
            'kunci_list'    => $this->m_pretest->list_kunci(),
            'kunci'       => $this->m_pretest->kunci($id_materi),
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
                'count_new'     => $this->m_praktikan->lists(),
                'materi'        => $this->m_kursus->detail_materi($id_materi),
                'pretest'       => $this->m_pretest->lists_soal(),
                'id'            => $this->uri->segment(4),
                'isi'           => 'admin/pretest/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'soal'          => $this->input->post('soal'),
                'nomor_soal'          => $this->input->post('nomor_soal'),
                'id_materi'     => $this->input->post('id_materi'),
                'jawaban_a'     => $this->input->post('jawaban_a'),
                'jawaban_b'     => $this->input->post('jawaban_b'),
                'jawaban_c'     => $this->input->post('jawaban_c'),
                'jawaban_d'     => $this->input->post('jawaban_d'),
                'jawaban_e'     => $this->input->post('jawaban_e'),
            );
            $this->m_pretest->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            $referred_from = $this->session->userdata('halaman_soal');
            redirect($referred_from, 'refresh');
        }
    }

    public function edit($id_pretest)
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
                'title2'        => 'Edit Data Soal',
                'count_new'     => $this->m_praktikan->lists(),
                'pretest'       => $this->m_pretest->lists_soal(),
                'detail'        => $this->m_pretest->detail($id_pretest),
                'id'            => $this->uri->segment(4),
                'isi'           => 'admin/pretest/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_pretest'          => $id_pretest,
                'soal'          => $this->input->post('soal'),
                'id_materi'     => $this->input->post('id_materi'),
                'jawaban_a'     => $this->input->post('jawaban_a'),
                'jawaban_b'     => $this->input->post('jawaban_b'),
                'jawaban_c'     => $this->input->post('jawaban_c'),
                'jawaban_d'     => $this->input->post('jawaban_d'),
                'jawaban_e'     => $this->input->post('jawaban_e'),
                'nomor_soal'     => $this->input->post('nomor_soal'),
            );
            $this->m_pretest->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
            
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

    public function add_kunci($id_materi)
	{
        $this->form_validation->set_rules('kunci_1', 'Soal 1', 'required');
        $this->form_validation->set_rules('kunci_2', 'Soal 2', 'required');
        $this->form_validation->set_rules('kunci_3', 'Soal 3', 'required');
        $this->form_validation->set_rules('kunci_4', 'Soal 4', 'required');
        $this->form_validation->set_rules('kunci_5', 'Soal 5', 'required');
        $this->form_validation->set_rules('kunci_6', 'Soal 6', 'required');
        $this->form_validation->set_rules('kunci_7', 'Soal 7', 'required');
        $this->form_validation->set_rules('kunci_8', 'Soal 8', 'required');
        $this->form_validation->set_rules('kunci_9', 'Soal 9', 'required');
        $this->form_validation->set_rules('kunci_10', 'Soal 10', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Soal',
                'title2'        => 'Tambah Data Soal',
                'count_new'     => $this->m_praktikan->lists(),
                'materi'        => $this->m_kursus->detail_materi($id_materi),
                'pretest'       => $this->m_pretest->lists_soal(),
                'id'            => $this->uri->segment(4),
                'isi'           => 'admin/pretest/v_add_kunci'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_materi'     => $id_materi,
                'kunci_1'       => $this->input->post('kunci_1'),
                'kunci_2'       => $this->input->post('kunci_2'),
                'kunci_3'       => $this->input->post('kunci_3'),
                'kunci_4'       => $this->input->post('kunci_4'),
                'kunci_5'       => $this->input->post('kunci_5'),
                'kunci_6'       => $this->input->post('kunci_6'),
                'kunci_7'       => $this->input->post('kunci_7'),
                'kunci_8'       => $this->input->post('kunci_8'),
                'kunci_9'       => $this->input->post('kunci_9'),
                'kunci_10'      => $this->input->post('kunci_10'),
            );
            $this->m_pretest->add_kunci($data);
            $this->session->set_flashdata('pesan', 'Kunci Jawaban Berhasil Dibuat!');

            $referred_from = $this->session->userdata('halaman_soal');
            redirect($referred_from, 'refresh');
        }
	}

    public function edit_kunci($id_materi)
	{
        $this->form_validation->set_rules('kunci_1', 'Soal 1', 'required');
        $this->form_validation->set_rules('kunci_2', 'Soal 2', 'required');
        $this->form_validation->set_rules('kunci_3', 'Soal 3', 'required');
        $this->form_validation->set_rules('kunci_4', 'Soal 4', 'required');
        $this->form_validation->set_rules('kunci_5', 'Soal 5', 'required');
        $this->form_validation->set_rules('kunci_6', 'Soal 6', 'required');
        $this->form_validation->set_rules('kunci_7', 'Soal 7', 'required');
        $this->form_validation->set_rules('kunci_8', 'Soal 8', 'required');
        $this->form_validation->set_rules('kunci_9', 'Soal 9', 'required');
        $this->form_validation->set_rules('kunci_10', 'Soal 10', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Soal',
                'title2'        => 'Tambah Data Soal',
                'count_new'     => $this->m_praktikan->lists(),
                'materi'        => $this->m_kursus->detail_materi($id_materi),
                'pretest'       => $this->m_pretest->lists_soal(),
                'kunci'       => $this->m_pretest->kunci($id_materi),
                'id'            => $this->uri->segment(4),
                'isi'           => 'admin/pretest/v_edit_kunci'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {


            $data = array(
                'id_materi'     => $id_materi,
                'kunci_1'       => $this->input->post('kunci_1'),
                'kunci_2'       => $this->input->post('kunci_2'),
                'kunci_3'       => $this->input->post('kunci_3'),
                'kunci_4'       => $this->input->post('kunci_4'),
                'kunci_5'       => $this->input->post('kunci_5'),
                'kunci_6'       => $this->input->post('kunci_6'),
                'kunci_7'       => $this->input->post('kunci_7'),
                'kunci_8'       => $this->input->post('kunci_8'),
                'kunci_9'       => $this->input->post('kunci_9'),
                'kunci_10'      => $this->input->post('kunci_10'),

            );

            $this->m_pretest->edit_kunci($data);
            $this->session->set_flashdata('pesan', 'Kunci Jawaban Berhasil Diubah!');

            $referred_from = $this->session->userdata('halaman_soal');
            redirect($referred_from, 'refresh');
        }
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

    public function delete($id_pretest)
    {
        $data = array('id_pretest' => $id_pretest);
        $this->m_pretest->delete($data);
        $this->session->set_flashdata('pesan', 'Soal Berhasil Dihapus!');
        
        $referred_from = $this->session->userdata('halaman_soal');
        redirect($referred_from, 'refresh');
    }
    

}