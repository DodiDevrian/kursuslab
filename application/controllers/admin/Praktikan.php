<?php

class Praktikan extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_praktikan');
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
            'title'         => 'Praktikan',
            'title2'        => 'Laboratorium Teknik Informatika',
            'praktikan'        => $this->m_praktikan->lists(),
            'isi'           => 'admin/praktikan/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_user', 'Nama Praktikan', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_user/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_user')) {

                $data = array(
                    'title'     => 'Praktikan',
                    'title2'    => 'Tambah Data Praktikan',
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/praktikan/v_add'
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
                    'role'         => 3,
                    'nama_user'    => $this->input->post('nama_user'),
                    'nim'          => $this->input->post('nim'),
                    'email'        => $this->input->post('email'),
                    'foto_user'    => $upload_data['uploads']['file_name']
                );

                $this->m_praktikan->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
                redirect('admin/praktikan');
            }
        }
        $data = array(
            'title'     => 'Dosen',
            'title2'    => 'Tambah Data Dosen',
            'isi'       => 'admin/praktikan/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_user)
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_user', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_user/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_user')) {

                $data = array(
                    'title'     => 'Praktikan',
                    'title2'    => 'Ubah Data Praktikan',
                    'error'     => $this->upload->display_errors(),
                    'praktikan' =>  $this->m_praktikan->detail($id_user),
                    'isi'       => 'admin/praktikan/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_user/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $praktikan = $this->m_praktikan->detail($id_user);
                if ($praktikan->foto_user != "") {
                    unlink('./upload/foto_user/' . $praktikan->foto_user);
                }

                $data = array(
                    'id_user'      => $id_user,
                    'username'     => $this->input->post('username'),
                    'password'     => $this->input->post('password'),
                    'nama_user'    => $this->input->post('nama_user'),
                    'nim'          => $this->input->post('nim'),
                    'email'        => $this->input->post('email'),
                    'foto_user'    => $upload_data['uploads']['file_name']
                );

                $this->m_praktikan->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
                redirect('admin/praktikan');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_user/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_user'      => $id_user,
                'username'     => $this->input->post('username'),
                'password'     => $this->input->post('password'),
                'nama_user'    => $this->input->post('nama_user'),
                'nim'          => $this->input->post('nim'),
                'email'        => $this->input->post('email')
            );

            $this->m_praktikan->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
            redirect('admin/praktikan');
        }
        $data = array(
            'title'     => 'Praktikan',
            'title2'    => 'Ubah Data Praktikan',
            'praktikan' =>  $this->m_praktikan->detail($id_user),
            'isi'       => 'admin/praktikan/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_slider)
    {
        // Hapus foto yang lama
        $slider = $this->m_slider->detail($id_slider);
        if ($slider->foto_slider != "") {
            unlink('./upload/foto_slider/' . $slider->foto_slider);
        }

        $data = array('id_slider' => $id_slider);
        $this->m_slider->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('admin/slider');
    }

    public function edit_role_yes($id_user)
    {
        $data = array(
			'id_user'	=> $id_user,
            'role' 	    => 4
		);

		$this->m_praktikan->edit($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');

		redirect('admin/praktikan');
    }

    public function edit_role_no($id_user)
    {
        $data = array(
			'id_user'	=> $id_user,
            'role' 	    => 3
		);

		$this->m_praktikan->edit($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');

		redirect('admin/praktikan');
    }
}