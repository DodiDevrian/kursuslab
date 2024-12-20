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
			redirect('auth/login_admin');
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
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_dosen/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_dosen')) {

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
                $config['source_image'] = './upload/foto_dosen/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'username'     => $this->input->post('username'),
                    'password'     => $this->input->post('password'),
                    'role'         => 2,
                    'nama_dosen'    => $this->input->post('nama_dosen'),
                    'nip'          => $this->input->post('nip'),
                    'email'        => $this->input->post('email'),
                    'foto_dosen'    => $upload_data['uploads']['file_name']
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

    public function edit($id_admin)
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_dosen/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_dosen')) {

                $data = array(
                    'title'     => 'Dosen',
                    'title2'    => 'Ubah Data Dosen',
                    'error'     => $this->upload->display_errors(),
                    'dosen'    =>  $this->m_dosen->detail($id_admin),
                    'isi'       => 'admin/dosen/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_dosen/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $dosen = $this->m_dosen->detail($id_admin);
                if ($dosen->foto_dosen != "") {
                    unlink('./upload/foto_dosen/' . $dosen->foto_dosen);
                }

                $data = array(
                    'id_admin'      => $id_admin,
                    'username'     => $this->input->post('username'),
                    'password'     => $this->input->post('password'),
                    'role'         => 2,
                    'nama_dosen'    => $this->input->post('nama_dosen'),
                    'nip'          => $this->input->post('nip'),
                    'email'        => $this->input->post('email'),
                    'foto_dosen'    => $upload_data['uploads']['file_name']
                );

                $this->m_asprak->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
                redirect('admin/dosen');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_dosen/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_admin'      => $id_admin,
                'username'     => $this->input->post('username'),
                'password'     => $this->input->post('password'),
                'role'         => 2,
                'nama_dosen'    => $this->input->post('nama_dosen'),
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
            'dosen'    =>  $this->m_dosen->detail($id_admin),
            'isi'       => 'admin/dosen/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_admin)
    {
        // Hapus foto yang lama
        $dosen = $this->m_dosen->detail($id_admin);
        if ($dosen->foto_dosen != "") {
            unlink('./upload/foto_dosen/' . $dosen->foto_dosen);
        }

        $data = array('id_admin' => $id_admin);
        $this->m_dosen->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('admin/dosen');
    }
}