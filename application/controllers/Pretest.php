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
        $this->form_validation->set_rules('jawab_1', 'Soal 1', 'required');
        $this->form_validation->set_rules('jawab_2', 'Soal 2', 'required');
        $this->form_validation->set_rules('jawab_3', 'Soal 3', 'required');
        $this->form_validation->set_rules('jawab_4', 'Soal 4', 'required');
        $this->form_validation->set_rules('jawab_5', 'Soal 5', 'required');
        $this->form_validation->set_rules('jawab_6', 'Soal 6', 'required');
        $this->form_validation->set_rules('jawab_7', 'Soal 7', 'required');
        $this->form_validation->set_rules('jawab_8', 'Soal 8', 'required');
        $this->form_validation->set_rules('jawab_9', 'Soal 9', 'required');
        $this->form_validation->set_rules('jawab_10', 'Soal 10', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Pretest',
                'title2'        => 'Laboratorium Teknik Informatika',
                'list_kursus'   => $this->m_kursus->lists(),
                'materi'        => $this->m_kursus->detail_materi($id_materi),
                'pretest'       => $this->m_pretest->lists_soal(),
                'id'            => $this->uri->segment(3),
                'isi'           => 'pretest/v_do_pretest'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $kunci=$this->m_pretest->detail_kunci($id_materi);
            if ($this->input->post('jawab_1') == $kunci->kunci_1) {
                $poin_1 = 10;
            }else{
                $poin_1 = 0;
            }

            if ($this->input->post('jawab_2') == $kunci->kunci_2) {
                $poin_2 = 10;
            }else{
                $poin_2 = 0;
            }

            if ($this->input->post('jawab_3') == $kunci->kunci_3) {
                $poin_3 = 10;
            }else{
                $poin_3 = 0;
            }

            if ($this->input->post('jawab_4') == $kunci->kunci_4) {
                $poin_4 = 10;
            }else{
                $poin_4 = 0;
            }

            if ($this->input->post('jawab_5') == $kunci->kunci_5) {
                $poin_5 = 10;
            }else{
                $poin_5 = 0;
            }

            if ($this->input->post('jawab_6') == $kunci->kunci_6) {
                $poin_6 = 10;
            }else{
                $poin_6 = 0;
            }

            if ($this->input->post('jawab_7') == $kunci->kunci_7) {
                $poin_7 = 10;
            }else{
                $poin_7 = 0;
            }

            if ($this->input->post('jawab_8') == $kunci->kunci_8) {
                $poin_8 = 10;
            }else{
                $poin_8 = 0;
            }

            if ($this->input->post('jawab_9') == $kunci->kunci_9) {
                $poin_9 = 10;
            }else{
                $poin_9 = 0;
            }

            if ($this->input->post('jawab_10') == $kunci->kunci_10) {
                $poin_10 = 10;
            }else{
                $poin_10 = 0;
            }

            
            $data = array(
                'id_materi'     => $id_materi,
                'id_kursus'     => $this->input->post('id_kursus'),
                'id_user'       => $this->input->post('id_user'),
                'jawab_1'     => $this->input->post('jawab_1'),
                'jawab_2'     => $this->input->post('jawab_2'),
                'jawab_3'     => $this->input->post('jawab_3'),
                'jawab_4'     => $this->input->post('jawab_4'),
                'jawab_5'     => $this->input->post('jawab_5'),
                'jawab_6'     => $this->input->post('jawab_6'),
                'jawab_7'     => $this->input->post('jawab_7'),
                'jawab_8'     => $this->input->post('jawab_8'),
                'jawab_9'     => $this->input->post('jawab_9'),
                'jawab_10'    => $this->input->post('jawab_10'),
                'poin_1'      => $poin_1,
                'poin_2'     => $poin_2,
                'poin_3'     => $poin_3,
                'poin_4'     => $poin_4,
                'poin_5'     => $poin_5,
                'poin_6'     => $poin_6,
                'poin_7'     => $poin_7,
                'poin_8'     => $poin_8,
                'poin_9'     => $poin_9,
                'poin_10'    => $poin_10,
                'sum'       => $poin_1 + $poin_2 + $poin_3 + 
                                $poin_4 + $poin_5 + $poin_6 + 
                                $poin_7 + $poin_8 + $poin_9 + 
                                $poin_10
                // 'poin_1'     => $this->input->post('poin_1'),


            );

            $this->m_pretest->submit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            
            redirect('pretest/hasil_pretest/' . $id_materi);
        }
    }

    public function re_pretest($id_dopretest)
    {
        $this->form_validation->set_rules('jawab_1', 'Soal 1', 'required');
        $this->form_validation->set_rules('jawab_2', 'Soal 2', 'required');
        $this->form_validation->set_rules('jawab_3', 'Soal 3', 'required');
        $this->form_validation->set_rules('jawab_4', 'Soal 4', 'required');
        $this->form_validation->set_rules('jawab_5', 'Soal 5', 'required');
        $this->form_validation->set_rules('jawab_6', 'Soal 6', 'required');
        $this->form_validation->set_rules('jawab_7', 'Soal 7', 'required');
        $this->form_validation->set_rules('jawab_8', 'Soal 8', 'required');
        $this->form_validation->set_rules('jawab_9', 'Soal 9', 'required');
        $this->form_validation->set_rules('jawab_10', 'Soal 10', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Pretest',
                'title2'        => 'Laboratorium Teknik Informatika',
                'list_kursus'   => $this->m_kursus->lists(),
                'materi'        => $this->m_kursus->detail_materi($id_dopretest),
                'do_pretest'    => $this->m_pretest->detail_do($id_dopretest),
                'pretest'       => $this->m_pretest->lists_soal(),
                // 'id'            => $this->uri->segment(3),
                'isi'           => 'pretest/v_repretest'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $do_pretest = $this->m_pretest->detail_do($id_dopretest);
            $kunci=$this->m_pretest->detail_kunci($do_pretest->id_materi);

            if ($this->input->post('jawab_1') == $kunci->kunci_1) {
                $poin_1 = 10;
            }else{
                $poin_1 = 0;
            }

            if ($this->input->post('jawab_2') == $kunci->kunci_2) {
                $poin_2 = 10;
            }else{
                $poin_2 = 0;
            }

            if ($this->input->post('jawab_3') == $kunci->kunci_3) {
                $poin_3 = 10;
            }else{
                $poin_3 = 0;
            }

            if ($this->input->post('jawab_4') == $kunci->kunci_4) {
                $poin_4 = 10;
            }else{
                $poin_4 = 0;
            }

            if ($this->input->post('jawab_5') == $kunci->kunci_5) {
                $poin_5 = 10;
            }else{
                $poin_5 = 0;
            }

            if ($this->input->post('jawab_6') == $kunci->kunci_6) {
                $poin_6 = 10;
            }else{
                $poin_6 = 0;
            }

            if ($this->input->post('jawab_7') == $kunci->kunci_7) {
                $poin_7 = 10;
            }else{
                $poin_7 = 0;
            }

            if ($this->input->post('jawab_8') == $kunci->kunci_8) {
                $poin_8 = 10;
            }else{
                $poin_8 = 0;
            }

            if ($this->input->post('jawab_9') == $kunci->kunci_9) {
                $poin_9 = 10;
            }else{
                $poin_9 = 0;
            }

            if ($this->input->post('jawab_10') == $kunci->kunci_10) {
                $poin_10 = 10;
            }else{
                $poin_10 = 0;
            }

            
            $data = array(
                'id_dopretest'  => $id_dopretest,
                'id_kursus'     => $this->input->post('id_kursus'),
                'id_materi'     => $this->input->post('id_materi'),
                'id_user'       => $this->input->post('id_user'),
                'jawab_1'       => $this->input->post('jawab_1'),
                'jawab_2'       => $this->input->post('jawab_2'),
                'jawab_3'       => $this->input->post('jawab_3'),
                'jawab_4'       => $this->input->post('jawab_4'),
                'jawab_5'       => $this->input->post('jawab_5'),
                'jawab_6'       => $this->input->post('jawab_6'),
                'jawab_7'       => $this->input->post('jawab_7'),
                'jawab_8'       => $this->input->post('jawab_8'),
                'jawab_9'       => $this->input->post('jawab_9'),
                'jawab_10'      => $this->input->post('jawab_10'),
                'poin_1'     => $poin_1,
                'poin_2'     => $poin_2,
                'poin_3'     => $poin_3,
                'poin_4'     => $poin_4,
                'poin_5'     => $poin_5,
                'poin_6'     => $poin_6,
                'poin_7'     => $poin_7,
                'poin_8'     => $poin_8,
                'poin_9'     => $poin_9,
                'poin_10'    => $poin_10,
                'sum'       => $poin_1 + $poin_2 + $poin_3 + 
                                $poin_4 + $poin_5 + $poin_6 + 
                                $poin_7 + $poin_8 + $poin_9 + 
                                $poin_10
            );

            $this->m_pretest->repretest($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            
            $id_materi = $this->input->post('id_materi');
            redirect('pretest/hasil_pretest/' . $id_materi);
        }
    }

    public function hasil_pretest($id_materi)
    {
        $data = array(
            'title'         => 'Pretest',
            'title2'        => 'Laboratorium Teknik Informatika',
            'list_kursus'   => $this->m_kursus->lists(),
            'materi'        => $this->m_kursus->detail_materi($id_materi),
            'pretest'       => $this->m_pretest->lists_soal(),
            'hasil_pretest' => $this->m_pretest->do_pretest(),
            'id'            => $this->uri->segment(3),
            'isi'           => 'pretest/v_hasil_pretest'
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