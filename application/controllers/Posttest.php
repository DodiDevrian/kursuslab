<?php

class Posttest extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_posttest');
        $this->load->model('M_auth');
	}

    public function do($id_kursus)
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
        $this->form_validation->set_rules('jawab_11', 'Soal 11', 'required');
        $this->form_validation->set_rules('jawab_12', 'Soal 12', 'required');
        $this->form_validation->set_rules('jawab_13', 'Soal 13', 'required');
        $this->form_validation->set_rules('jawab_14', 'Soal 14', 'required');
        $this->form_validation->set_rules('jawab_15', 'Soal 15', 'required');
        $this->form_validation->set_rules('jawab_16', 'Soal 16', 'required');
        $this->form_validation->set_rules('jawab_17', 'Soal 17', 'required');
        $this->form_validation->set_rules('jawab_18', 'Soal 18', 'required');
        $this->form_validation->set_rules('jawab_19', 'Soal 19', 'required');
        $this->form_validation->set_rules('jawab_20', 'Soal 20', 'required');
        $this->form_validation->set_rules('jawab_21', 'Soal 21', 'required');
        $this->form_validation->set_rules('jawab_22', 'Soal 22', 'required');
        $this->form_validation->set_rules('jawab_23', 'Soal 23', 'required');
        $this->form_validation->set_rules('jawab_24', 'Soal 24', 'required');
        $this->form_validation->set_rules('jawab_25', 'Soal 25', 'required');
        $this->form_validation->set_rules('jawab_26', 'Soal 26', 'required');
        $this->form_validation->set_rules('jawab_27', 'Soal 27', 'required');
        $this->form_validation->set_rules('jawab_28', 'Soal 28', 'required');
        $this->form_validation->set_rules('jawab_29', 'Soal 29', 'required');
        $this->form_validation->set_rules('jawab_30', 'Soal 30', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Post-Test',
                'title2'        => 'Laboratorium Teknik Informatika',
                'materi_button' => $this->m_kursus->lists_materi_button(),
                'list_kursus'   => $this->m_kursus->lists(),
                'kursus'        => $this->m_kursus->detail_kursus($id_kursus),
                'do_posttest'    => $this->m_posttest->do_posttest(),
                'posttest'       => $this->m_posttest->lists_soal(),
                'id'            => $this->uri->segment(3),
                'isi'           => 'posttest/v_do_posttest'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);

            if ($this->session->userdata('role')=='') {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Melakukan <strong>Login Sebagai User!</strong>
                    </div>');
                redirect('auth/login');
            }
        } else {
            $kunci=$this->m_posttest->detail_kunci($id_kursus);

            if ($this->input->post('jawab_1') == $kunci->kunci_1) {
                $poin_1 = 10; }else{ $poin_1 = 0; }

            if ($this->input->post('jawab_2') == $kunci->kunci_2) {
                $poin_2 = 10; }else{ $poin_2 = 0; }

            if ($this->input->post('jawab_3') == $kunci->kunci_3) {
                $poin_3 = 10; }else{ $poin_3 = 0; }

            if ($this->input->post('jawab_4') == $kunci->kunci_4) {
                $poin_4 = 10; }else{ $poin_4 = 0; }

            if ($this->input->post('jawab_5') == $kunci->kunci_5) {
                $poin_5 = 10; }else{ $poin_5 = 0; }

            if ($this->input->post('jawab_6') == $kunci->kunci_6) {
                $poin_6 = 10; }else{ $poin_6 = 0; }

            if ($this->input->post('jawab_7') == $kunci->kunci_7) {
                $poin_7 = 10; }else{ $poin_7 = 0; }

            if ($this->input->post('jawab_8') == $kunci->kunci_8) {
                $poin_8 = 10; }else{ $poin_8 = 0; }

            if ($this->input->post('jawab_9') == $kunci->kunci_9) {
                $poin_9 = 10; }else{ $poin_9 = 0; }

            if ($this->input->post('jawab_10') == $kunci->kunci_10) {
                $poin_10 = 10; }else{ $poin_10 = 0; }

            
            if ($this->input->post('jawab_11') == $kunci->kunci_11) {
                $poin_11 = 10; }else{ $poin_11 = 0; }

            if ($this->input->post('jawab_12') == $kunci->kunci_12) {
                $poin_12 = 10; }else{ $poin_12 = 0; }

            if ($this->input->post('jawab_13') == $kunci->kunci_13) {
                $poin_13 = 10; }else{ $poin_13 = 0; }

            if ($this->input->post('jawab_14') == $kunci->kunci_14) {
                $poin_14 = 10; }else{ $poin_14 = 0; }

            if ($this->input->post('jawab_15') == $kunci->kunci_15) {
                $poin_15 = 10; }else{ $poin_15 = 0; }

            if ($this->input->post('jawab_16') == $kunci->kunci_16) {
                $poin_16 = 10; }else{ $poin_16 = 0; }

            if ($this->input->post('jawab_17') == $kunci->kunci_17) {
                $poin_17 = 10; }else{ $poin_17 = 0; }

            if ($this->input->post('jawab_18') == $kunci->kunci_18) {
                $poin_18 = 10; }else{ $poin_18 = 0; }

            if ($this->input->post('jawab_19') == $kunci->kunci_19) {
                $poin_19 = 10; }else{ $poin_19 = 0; }

            if ($this->input->post('jawab_20') == $kunci->kunci_20) {
                $poin_20 = 10; }else{ $poin_20 = 0; }


            if ($this->input->post('jawab_21') == $kunci->kunci_21) {
                $poin_21 = 10; }else{ $poin_21 = 0; }

            if ($this->input->post('jawab_22') == $kunci->kunci_22) {
                $poin_22 = 10; }else{ $poin_22 = 0; }

            if ($this->input->post('jawab_23') == $kunci->kunci_23) {
                $poin_23 = 10; }else{ $poin_23 = 0; }

            if ($this->input->post('jawab_24') == $kunci->kunci_24) {
                $poin_24 = 10; }else{ $poin_24 = 0; }

            if ($this->input->post('jawab_25') == $kunci->kunci_25) {
                $poin_25 = 10; }else{ $poin_25 = 0; }

            if ($this->input->post('jawab_26') == $kunci->kunci_26) {
                $poin_26 = 10; }else{ $poin_26 = 0; }

            if ($this->input->post('jawab_27') == $kunci->kunci_27) {
                $poin_27 = 10; }else{ $poin_27 = 0; }

            if ($this->input->post('jawab_28') == $kunci->kunci_28) {
                $poin_28 = 10; }else{ $poin_28 = 0; }

            if ($this->input->post('jawab_29') == $kunci->kunci_29) {
                $poin_29 = 10; }else{ $poin_29 = 0; }

            if ($this->input->post('jawab_30') == $kunci->kunci_30) {
                $poin_30 = 10; }else{ $poin_30 = 0; }

            
            $data = array(
                'id_kursus'     => $id_kursus,
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
                'jawab_11'     => $this->input->post('jawab_11'),
                'jawab_12'     => $this->input->post('jawab_12'),
                'jawab_13'     => $this->input->post('jawab_13'),
                'jawab_14'     => $this->input->post('jawab_14'),
                'jawab_15'     => $this->input->post('jawab_15'),
                'jawab_16'     => $this->input->post('jawab_16'),
                'jawab_17'     => $this->input->post('jawab_17'),
                'jawab_18'     => $this->input->post('jawab_18'),
                'jawab_19'     => $this->input->post('jawab_19'),
                'jawab_20'     => $this->input->post('jawab_20'),
                'jawab_21'     => $this->input->post('jawab_21'),
                'jawab_22'     => $this->input->post('jawab_22'),
                'jawab_23'     => $this->input->post('jawab_23'),
                'jawab_24'     => $this->input->post('jawab_24'),
                'jawab_25'     => $this->input->post('jawab_25'),
                'jawab_26'     => $this->input->post('jawab_26'),
                'jawab_27'     => $this->input->post('jawab_27'),
                'jawab_28'     => $this->input->post('jawab_28'),
                'jawab_29'     => $this->input->post('jawab_29'),
                'jawab_30'    => $this->input->post('jawab_30'),
                'sum'          => ($poin_1 + $poin_2 + $poin_3 + $poin_4 + $poin_5 + $poin_6 + $poin_7 + $poin_8 + $poin_9 + $poin_10 +
                                    $poin_11 + $poin_12 + $poin_13 + $poin_14 + $poin_15 + $poin_16 + $poin_17 + $poin_18 + $poin_19 + $poin_20 +
                                    $poin_21 + $poin_22 + $poin_23 + $poin_24 + $poin_25 + $poin_26 + $poin_27 + $poin_28 + $poin_29 + $poin_30)/3
            );

            $this->m_posttest->submit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            
            redirect('posttest/hasil_posttest/' . $id_kursus);
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
                'do_posttest'    => $this->m_posttest->do_posttest(),
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
                // 'poin_1'     => $this->input->post('poin_1'),


            );

            $this->m_pretest->repretest($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            
            $id_materi = $this->input->post('id_materi');
            redirect('pretest/hasil_pretest/' . $id_materi);
        }
    }

    public function hasil_posttest($id_kursus)
    {
        $data = array(
            'title'         => 'Post-Test',
            'title2'        => 'Laboratorium Teknik Informatika',
            'list_kursus'   => $this->m_kursus->lists(),
            'kursus'        => $this->m_kursus->detail_kursus($id_kursus),
            'posttest'       => $this->m_posttest->lists_soal(),
            'do_posttest'    => $this->m_posttest->do_posttest(),
            'hasil_posttest' => $this->m_posttest->hasil_posttest($id_kursus),
            'nilai'         => $this->m_posttest->nilai(),
            'id'            => $this->uri->segment(3),
            'isi'           => 'posttest/v_hasil_posttest'
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