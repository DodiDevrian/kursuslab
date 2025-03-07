<?php

class Praktikan_baru extends CI_Controller
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
            'title'         => 'Praktikan Baru',
            'title2'        => 'Laboratorium Teknik Informatika',
            'praktikan'     => $this->m_praktikan->lists(),
            'count_new'     => $this->m_praktikan->lists(),
            'isi'           => 'admin/praktikan/v_list_new'
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
                    'count_new'     => $this->m_praktikan->lists(),
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
                    'password'     => md5($this->input->post('password')),
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
            'title'     => 'Praktikan',
            'title2'    => 'Tambah Data Praktikan',
            'count_new'     => $this->m_praktikan->lists(),
            'isi'       => 'admin/praktikan/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function tolak($id_user)
    {
        // Hapus foto yang lama
        $user = $this->m_praktikan->detail($id_user);
        if ($user->foto_user != "") {
            unlink('./upload/foto_user/' . $user->foto_user);
        }

        $data = array('id_user' => $id_user);
        $this->m_praktikan->delete($data);
        $this->session->set_flashdata('pesan', 'Akun telah di tolak!');
        
        $count = 0;
        $count_new = $this->m_praktikan->lists();
        foreach ($count_new as $value) {
            if ($value->status_if == 'No') {
            $count++;
            }
        }
        if ($count == 0) {
            redirect('admin/praktikan');
        }else {
            redirect('admin/praktikan_baru');
        }
    }

    public function terima($id_user)
    {
        $data = array(
			'id_user'	    => $id_user,
            'status_if'     => 'Yes'
		);

		$this->m_praktikan->edit($data);
		$this->session->set_flashdata('pesan', 'Akun Telah Diterima');

        $count = 0;
        $count_new = $this->m_praktikan->lists();
        foreach ($count_new as $value) {
            if ($value->status_if == 'No') {
            $count++;
            }
        }
        if ($count == 0) {
            redirect('admin/praktikan');
        }else {
            redirect('admin/praktikan_baru');
        }
		
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