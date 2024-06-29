<?php

class Dosen extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_dosen');

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
            'title'         => 'Dosen',
            'title2'        => 'Laboratorium Teknik Informatika',
            'dosen'        => $this->m_dosen->lists(),
            'isi'           => 'admin/dosen/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_user', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_user/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_user')) {

                $data = array(
                    'title'     => 'Dosen',
                    'title2'    => 'Tambah Data Dosen',
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/dosen/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_user/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'username'     => $this->input->post('username'),
                    'password'     => $this->input->post('password'),
                    'role'         => 2,
                    'nama_user'    => $this->input->post('nama_user'),
                    'nip'          => $this->input->post('nip'),
                    'email'        => $this->input->post('email'),
                    'foto_user'    => $upload_data['uploads']['file_name']
                );

                $this->m_dosen->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
                redirect('admin/dosen');
            }
        }
        $data = array(
            'title'     => 'Dosen',
            'title2'    => 'Tambah Data Dosen',
            'isi'       => 'admin/dosen/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_user)
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_user', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_user/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_user')) {

                $data = array(
                    'title'     => 'Dosen',
                    'title2'    => 'Ubah Data Dosen',
                    'error'     => $this->upload->display_errors(),
                    'dosen'    =>  $this->m_dosen->detail($id_user),
                    'isi'       => 'admin/dosen/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_user/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $dosen = $this->m_dosen->detail($id_user);
                if ($dosen->foto_user != "") {
                    unlink('./upload/foto_user/' . $dosen->foto_user);
                }

                $data = array(
                    'id_user'      => $id_user,
                    'username'     => $this->input->post('username'),
                    'password'     => $this->input->post('password'),
                    'role'         => 2,
                    'nama_user'    => $this->input->post('nama_user'),
                    'nip'          => $this->input->post('nip'),
                    'email'        => $this->input->post('email'),
                    'foto_user'    => $upload_data['uploads']['file_name']
                );

                $this->m_asprak->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
                redirect('admin/dosen');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_user/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_user'      => $id_user,
                'username'     => $this->input->post('username'),
                'password'     => $this->input->post('password'),
                'role'         => 2,
                'nama_user'    => $this->input->post('nama_user'),
                'nip'          => $this->input->post('nip'),
                'email'        => $this->input->post('email')
            );

            $this->m_dosen->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
            redirect('admin/dosen');
        }
        $data = array(
            'title'     => 'Dosen',
            'title2'    => 'Ubah Data Dosen',
            'dosen'    =>  $this->m_dosen->detail($id_user),
            'isi'       => 'admin/dosen/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_user)
    {
        // Hapus foto yang lama
        $dosen = $this->m_dosen->detail($id_user);
        if ($dosen->foto_user != "") {
            unlink('./upload/foto_user/' . $dosen->foto_user);
        }

        $data = array('id_user' => $id_user);
        $this->m_dosen->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('admin/dosen');
    }
}