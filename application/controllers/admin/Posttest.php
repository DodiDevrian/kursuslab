<?php

class Posttest extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_materi');
        $this->load->model('m_dosen');
        $this->load->model('m_posttest');

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
            'title'   => 'Post-Test',
            'title2'  => 'Laboratorium Teknik Informatika',
            'kursus'   => $this->m_kursus->lists(),
            'posttest'       => $this->m_posttest->lists_soal(),
            'count_new'     => $this->m_praktikan->lists(),
            'isi'     => 'admin/posttest/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function soal_posttest($id_kursus){
        
        $data = array(
            'title'         => 'Soal Post-Test',
            'title2'        => 'Laboratorium Teknik Informatika',
            'count_new'     => $this->m_praktikan->lists(),
            'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
            'posttest'       => $this->m_posttest->lists_soal(),
            'kunci_list'    => $this->m_posttest->list_kunci(),
            'kunci'       => $this->m_posttest->kunci($id_kursus),
            // 'keypretest'    => $this->m_pretest->keypretest(),
            'id'            => $this->uri->segment(4),
            'isi'           => 'admin/posttest/v_list_posttest'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add($id_kursus)
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
                'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
                'posttest'       => $this->m_posttest->lists_soal(),
                'id'            => $this->uri->segment(4),
                'isi'           => 'admin/posttest/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {


            $data = array(
                'id_kursus'     => $this->input->post('id_kursus'),
                'soal'          => $this->input->post('soal'),
                'nomor_soal'    => $this->input->post('nomor_soal'),
                'jawaban_a'     => $this->input->post('jawaban_a'),
                'jawaban_b'     => $this->input->post('jawaban_b'),
                'jawaban_c'     => $this->input->post('jawaban_c'),
                'jawaban_d'     => $this->input->post('jawaban_d'),
                'jawaban_e'     => $this->input->post('jawaban_e'),

            );

            $this->m_posttest->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            
            $referred_from = $this->session->userdata('halaman_soal');
            redirect($referred_from, 'refresh');
        }
    }

    public function edit($id_posttest)
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
                'count_new'     => $this->m_praktikan->lists(),
                'posttest'       => $this->m_posttest->lists_soal(),
                'detail'        => $this->m_posttest->detail($id_posttest),
                'id'            => $this->uri->segment(4),
                'isi'           => 'admin/posttest/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {


            $data = array(
                'id_pretest'          => $id_posttest,
                'soal'          => $this->input->post('soal'),
                'id_kursus'     => $this->input->post('id_kursus'),
                'jawaban_a'     => $this->input->post('jawaban_a'),
                'jawaban_b'     => $this->input->post('jawaban_b'),
                'jawaban_c'     => $this->input->post('jawaban_c'),
                'jawaban_d'     => $this->input->post('jawaban_d'),
                'jawaban_e'     => $this->input->post('jawaban_e'),
                'nomor_soal'     => $this->input->post('nomor_soal'),

            );

            $this->m_posttest->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
            
            $referred_from = $this->session->userdata('halaman_soal');
            redirect($referred_from, 'refresh');
        }
    }

    public function add_kunci($id_kursus)
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
                'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
                'posttest'       => $this->m_posttest->lists_soal(),
                'id'            => $this->uri->segment(4),
                'isi'           => 'admin/posttest/v_add_kunci'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {


            $data = array(
                'id_kursus'     => $id_kursus,
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
                'kunci_11'       => $this->input->post('kunci_11'),
                'kunci_12'       => $this->input->post('kunci_12'),
                'kunci_13'       => $this->input->post('kunci_13'),
                'kunci_14'       => $this->input->post('kunci_14'),
                'kunci_15'       => $this->input->post('kunci_15'),
                'kunci_16'       => $this->input->post('kunci_16'),
                'kunci_17'       => $this->input->post('kunci_17'),
                'kunci_18'       => $this->input->post('kunci_18'),
                'kunci_19'       => $this->input->post('kunci_19'),
                'kunci_20'      => $this->input->post('kunci_20'),
                'kunci_21'       => $this->input->post('kunci_21'),
                'kunci_22'       => $this->input->post('kunci_22'),
                'kunci_23'       => $this->input->post('kunci_23'),
                'kunci_24'       => $this->input->post('kunci_24'),
                'kunci_25'       => $this->input->post('kunci_25'),
                'kunci_26'       => $this->input->post('kunci_26'),
                'kunci_27'       => $this->input->post('kunci_27'),
                'kunci_28'       => $this->input->post('kunci_28'),
                'kunci_29'       => $this->input->post('kunci_29'),
                'kunci_30'      => $this->input->post('kunci_30'),

            );

            $this->m_posttest->add_kunci($data);
            $this->session->set_flashdata('pesan', 'Kunci Jawaban Berhasil Dibuat!');

            $referred_from = $this->session->userdata('halaman_soal');
            redirect($referred_from, 'refresh');
        }
	}

    public function edit_kunci($id_kursus)
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
                'posttest'       => $this->m_posttest->lists_soal(),
                'kursus'        => $this->m_kursus->detail_kursus($id_kursus),
                'kunci'       => $this->m_posttest->kunci($id_kursus),
                'id'            => $this->uri->segment(4),
                'isi'           => 'admin/posttest/v_edit_kunci'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {


            $data = array(
                'id_kursus'     => $id_kursus,
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

            $this->m_posttest->edit_kunci($data);
            $this->session->set_flashdata('pesan', 'Kunci Jawaban Berhasil Diubah!');

            $referred_from = $this->session->userdata('halaman_soal');
            redirect($referred_from, 'refresh');
        }
	}

    public function delete($id_posttest)
    {
        $data = array('id_posttest' => $id_posttest);
        $this->m_posttest->delete($data);
        $this->session->set_flashdata('pesan', 'Soal Berhasil Dihapus!');
        
        $referred_from = $this->session->userdata('halaman_soal');
        redirect($referred_from, 'refresh');
    }

}