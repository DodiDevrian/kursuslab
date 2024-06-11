<?php

class Asprak extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_asprak');
        $this->load->model('m_kursus');

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
            'title'         => 'Asprak',
            'title2'        => 'Laboratorium Teknik Informatika',
            'asprak'        => $this->m_asprak->lists(),
            'isi'           => 'admin/asprak/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_asprak', 'Nama Asprak', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('id_kursus', 'Mata Kuliah', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_asprak/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_asprak')) {

                $data = array(
                    'title'     => 'Asprak',
                    'title2'    => 'Tambah Data Asprak',
                    'error'     => $this->upload->display_errors(),
                    'asprak'     => $this->m_asprak->lists(),
                    'isi'       => 'admin/asprak/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_asprak/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_asprak'    => $this->input->post('nama_asprak'),
                    'nim'            => $this->input->post('nim'),
                    'id_kursus'      => $this->input->post('id_kursus'),
                    'no_hp'          => $this->input->post('no_hp'),
                    'foto_asprak'     => $upload_data['uploads']['file_name']
                );

                $this->m_asprak->add($data);
                $this->session->set_flashdata('pesan', 'Data Asprak Berhasil Ditambahkan!');
                redirect('admin/asprak');
            }
        }
        $data = array(
            'title'     => 'asprak',
            'title2'    => 'Tambah Data asprak',
            'kursus'     => $this->m_kursus->lists(),
            'isi'       => 'admin/asprak/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_asprak)
    {
        $this->form_validation->set_rules('nama_asprak', 'Nama Asprak', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('id_kursus', 'Mata Kuliah', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_asprak/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_asprak')) {

                $data = array(
                    'title'     => 'Asprak',
                    'title2'    => 'Ubah Data Asprak',
                    'error'     => $this->upload->display_errors(),
                    'kursus'     => $this->m_kursus->lists(),
                    'asprak'    =>  $this->m_asprak->detail($id_asprak),
                    'isi'       => 'admin/asprak/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_asprak/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $kursus = $this->m_kursus->detail($id_asprak);
                if ($kursus->foto_asprak != "") {
                    unlink('./upload/foto_asprak/' . $kursus->foto_asprak);
                }

                $data = array(
                    'id_asprak'       => $id_asprak,
                    'nama_asprak'    => $this->input->post('nama_asprak'),
                    'nim'            => $this->input->post('nim'),
                    'id_kursus'      => $this->input->post('id_kursus'),
                    'no_hp'          => $this->input->post('no_hp'),
                    'foto_asprak'    => $upload_data['uploads']['file_name']
                );

                $this->m_asprak->edit($data);
                $this->session->set_flashdata('pesan', 'Data kursus Berhasil Diubah!');
                redirect('admin/asprak');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_asprak/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_asprak'      => $id_asprak,
                'nama_asprak'    => $this->input->post('nama_asprak'),
                'nim'            => $this->input->post('nim'),
                'id_kursus'      => $this->input->post('id_kursus'),
                'no_hp'          => $this->input->post('no_hp'),
            );

            $this->m_asprak->edit($data);
            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Diubah!');
            redirect('admin/asprak');
        }
        $data = array(
            'title'     => 'Asprak',
            'title2'    => 'Ubah Data Asprak',
            'asprak'    =>  $this->m_asprak->detail($id_asprak),
            'kursus'     => $this->m_kursus->lists(),
            'isi'       => 'admin/asprak/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_asprak)
    {
        // Hapus foto yang lama
        $kursus = $this->m_kursus->detail_kursus($id_asprak);
        if ($kursus->foto_asprak != "") {
            unlink('./upload/foto_asprak/' . $kursus->foto_asprak);
        }

        $data = array('id_materi' => $id_asprak);
        $this->m_materi->delete($data);
        $this->session->set_flashdata('pesan', 'Data Guru Berhasil Dihapus!');
        redirect('admin/materi');
    }
}