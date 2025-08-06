<?php

class Kursus extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_materi');
        $this->load->model('m_dosen');
        $this->load->model('m_asprak');

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
            'title'   => 'Praktikum',
            'title2'  => 'Laboratorium Teknik Informatika',
            'kursus'   => $this->m_kursus->lists(),
            'count_new'     => $this->m_praktikan->lists(),
            'isi'     => 'admin/kursus/v_list_kursus'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_kursus', 'Nama Kursus', 'required');
        $this->form_validation->set_rules('ket_kursus', 'Keterangan Kursus', 'required');
        $this->form_validation->set_rules('id_admin', 'Dosen', 'required');
        $this->form_validation->set_rules('id_asprak', 'Asprak', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/cover_kursus/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('cover_kursus')) {
                $data = array(
                    'title'     => 'Praktikum',
                    'title2'    => 'Tambah Data Praktikum',
                    'error'     => $this->upload->display_errors(),
                    'count_new'     => $this->m_praktikan->lists(),
                    'isi'       => 'admin/kursus/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/cover_kursus/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_kursus'    => $this->input->post('nama_kursus'),
                    'ket_kursus'     => $this->input->post('ket_kursus'),
                    'id_admin'     => $this->input->post('id_admin'),
                    'id_asprak'     => $this->input->post('id_asprak'),
                    'slug_kursus'   => url_title($this->input->post('nama_kursus'), 'dash', TRUE),
                    'cover_kursus'     => $upload_data['uploads']['file_name']
                );

                $this->m_kursus->add($data);
                $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Ditambahkan!');
                redirect('admin/kursus');
            }
        }
        
        $data = array(
            'title'     => 'Praktikum',
            'title2'    => 'Tambah Data Praktikum',
            'dosen'     => $this->m_dosen->lists(),
            'count_new'     => $this->m_praktikan->lists(),
            'asprak'    => $this->m_asprak->lists_asprak(),
            'isi'       => 'admin/kursus/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_kursus)
    {
        $this->form_validation->set_rules('nama_kursus', 'Nama Kursus', 'required');
        $this->form_validation->set_rules('ket_kursus', 'keterangan Kursus', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/cover_kursus/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('cover_kursus')) {

                $data = array(
                    'title'     => 'Kursus',
                    'title2'    => 'Ubah Data Kursus',
                    'error'     => $this->upload->display_errors(),
                    'count_new'     => $this->m_praktikan->lists(),
                    'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
                    'dosen'     => $this->m_dosen->lists(),
                    'asprak'    => $this->m_asprak->lists_asprak(),
                    'isi'       => 'admin/kursus/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/cover_kursus/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $kursus = $this->m_kursus->detail_kursus($id_kursus);
                if ($kursus->cover_kursus != "") {
                    unlink('./upload/cover_kursus/' . $kursus->cover_kursus);
                }

                $data = array(
                    'id_kursus'       => $id_kursus,
                    'nama_kursus'     => $this->input->post('nama_kursus'),
                    'id_admin'     => $this->input->post('id_admin'),
                    'id_asprak'     => $this->input->post('id_asprak'),
                    'ket_kursus'      => $this->input->post('ket_kursus'),
                    'cover_kursus'    => $upload_data['uploads']['file_name']
                );

                $this->m_kursus->edit($data);
                $this->session->set_flashdata('pesan', 'Data kursus Berhasil Diubah!');
                redirect('admin/kursus');
            }
            // $upload_data = array('uploads' => $this->upload->data());
            // $config['image_library'] = 'gd2';
            // $config['source_image'] = './upload/cover_kursus/' . $upload_data['uploads']['file_name'];
            // $this->load->library('image_lib', $config);

            $data = array(
                'id_kursus'      => $id_kursus,
                'nama_kursus'    => $this->input->post('nama_kursus'),
                'id_admin'     => $this->input->post('id_admin'),
                'id_asprak'     => $this->input->post('id_asprak'),
                'ket_kursus'     => $this->input->post('ket_kursus'),
            );

            $this->m_kursus->edit($data);
            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Diubah!');
            redirect('admin/kursus');
        }
        $data = array(
            'title'     => 'kursus',
            'title2'    => 'Ubah Data kursus',
            'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
            'dosen'     => $this->m_dosen->lists(),
            'count_new'     => $this->m_praktikan->lists(),
            'asprak'    => $this->m_asprak->lists_asprak(),
            'isi'       => 'admin/kursus/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    public function delete($id_kursus)
    {
        $kursus = $this->m_kursus->detail_kursus($id_kursus);
        if ($kursus->cover_kursus != "") {
            unlink('./upload/cover_kursus/' . $kursus->cover_kursus);
        }

        $data = array('id_kursus' => $id_kursus);
        $this->m_kursus->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('admin/kursus');
    }

    public function list_materi($id_kursus)
    {
        $data = array(
            'title'         => 'Materi',
            'title2'        => 'Laboratorium Teknik Informatika',
            'kursus'        => $this->m_kursus->detail_kursus($id_kursus),
            'materi'        => $this->m_kursus->lists_materi(),
            'count_new'     => $this->m_praktikan->lists(),
            'id'            => $this->uri->segment(4),
            'isi'           => 'admin/materi/v_list_materi'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add_materi($id_kursus)
    {
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('ket_materi', 'Keterangan Materi', 'required');
        $this->form_validation->set_rules('id_yt', 'Keterangan Materi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/doc_materi/';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = 200000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('doc_materi')) {

                $data = array(
                    'title'     => 'Materi',
                    'title2'    => 'Tambah Data Materi',
                    'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
                    'error'     => $this->upload->display_errors(),
                    'count_new'     => $this->m_praktikan->lists(),
                    'isi'       => 'admin/kursus/v_add_materi'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/doc_materi/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_kursus'      => $id_kursus,
                    'nama_materi'    => $this->input->post('nama_materi'),
                    'status_pretest'    => $this->input->post('status_pretest'),
                    'cek_last'    => $this->input->post('cek_last'),
                    'ket_materi'     => $this->input->post('ket_materi'),
                    'id_yt'          => $this->input->post('id_yt'),
                    'status'         => 1,
                    'note'           => '-',
                    'doc_materi'     => $upload_data['uploads']['file_name']
                );

                $this->m_materi->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');

                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            }
        }
        $data = array(
            'title'     => 'Materi',
            'title2'    => 'Tambah Data Materi',
            'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
            'count_new'     => $this->m_praktikan->lists(),
            'isi'       => 'admin/kursus/v_add_materi'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit_materi($id_materi)
    {
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('ket_materi', 'Keterangan Materi', 'required');
        $this->form_validation->set_rules('id_yt', 'ID Vidio Youtube', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/doc_materi/';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = 200000000000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('doc_materi')) {

                $data = array(
                    'title'     => 'Materi',
                    'title2'    => 'Ubah Data Materi',
                    'error'     => $this->upload->display_errors(),
                    'materi'         =>  $this->m_materi->detail($id_materi),
                    'count_new'     => $this->m_praktikan->lists(),
                    'isi'       => 'admin/kursus/v_edit_materi'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/doc_materi/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file yang lama
                $kursus = $this->m_kursus->detail_materi($id_materi);
                if ($kursus->doc_materi != "") {
                    unlink('./upload/doc_materi/' . $kursus->doc_materi);
                }

                $data = array(
                    'id_materi'       => $id_materi,
                    'id_kursus'       => $this->input->post('id_kursus'),
                    'status_pretest'    => $this->input->post('status_pretest'),
                    'cek_last'    => $this->input->post('cek_last'),
                    'nama_materi'     => $this->input->post('nama_materi'),
                    'ket_materi'      => $this->input->post('ket_materi'),
                    'id_yt'           => $this->input->post('id_yt'),
                    'doc_materi'      => $upload_data['uploads']['file_name']
                );

                $this->m_materi->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
                
                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            }

            // $upload_data = array('uploads' => $this->upload->data());
            // $config['image_library'] = 'gd2';
            // $config['source_image'] = './upload/doc_materi/' . $upload_data['uploads']['file_name'];
            // $this->load->library('image_lib', $config);

            $data = array(
                'id_materi'       => $id_materi,
                'id_kursus'       => $this->input->post('id_kursus'),
                'status_pretest'    => $this->input->post('status_pretest'),
                'cek_last'    => $this->input->post('cek_last'),
                'nama_materi'     => $this->input->post('nama_materi'),
                'ket_materi'      => $this->input->post('ket_materi'),
                'id_yt'           => $this->input->post('id_yt')
            );

            $this->m_materi->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');

            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        }
        $data = array(
            'title'     => 'Materi',
            'title2'    => 'Ubah Data Materi',
            'count_new'     => $this->m_praktikan->lists(),
            'materi'    =>  $this->m_materi->detail($id_materi),
            'isi'       => 'admin/kursus/v_edit_materi'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    public function delete_materi($id_materi)
    {
        $kursus = $this->m_materi->detail($id_materi);
        if ($kursus->doc_materi != "") {
            unlink('./upload/doc_materi/' . $kursus->doc_materi);
        }

        $data = array('id_materi' => $id_materi);
        $this->m_materi->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');

        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function detail_materi($id_materi)
    {
        $data = array(
            'title'         => 'Kursus',
            'title2'        => 'Laboratorium Teknik Informatika',
            'materi'        => $this->m_kursus->detail_materi($id_materi),
            'count_new'     => $this->m_praktikan->lists(),
            'lists_materi'  => $this->m_kursus->lists_materi(),
            'id'            => $this->uri->segment(4),
            'isi'           => 'v_detail_kursus'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}