<?php

class Profile extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_materi');
        $this->load->model('m_dosen');

        if ($this->session->userdata('role') != 2 ) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Dosen!</strong>
				</div>');
			redirect('auth/login');
		}
	}

    public function index()
    {
        $data = array(
            'title' => 'Dosen',
            'title2' => 'Dashboard',
            'kursus'   => $this->m_kursus->lists(),
            'isi'   => 'dosen/kursus/v_list'
        );
        $this->load->view('dosen/layout/v_wrapper', $data, FALSE);
    }

    public function edit_foto($id_admin)
    {
        $config['upload_path']      = './upload/foto_dosen/';
        $config['allowed_types']    = 'jpg|png|jpeg|gif';
        $config['max_size']         = 20000;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_dosen')) {
            echo "Data Gagal Diubah";
        } else {
            // $upload_data = array('uploads' => $this->upload->data());
            // $config['image_library'] = 'gd2';
            // $config['source_image'] = './upload/foto_dosen/' . $upload_data['uploads']['file_name'];
            // $this->load->library('image_lib', $config);

            // $profile = $this->m_dosen->profile($id_admin);
            // if ($profile->foto_dosen != "") {
            //     unlink('./upload/foto_dosen/' . $profile->foto_dosen);
            // }

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
                'foto_dosen'    => $upload_data['uploads']['file_name']
            );

            $this->m_dosen->edit($data);
            $this->session->set_flashdata('pesan', 'Gambar Berhasil Diubah!');
            redirect('dosen/dashboard/profile/' . $id_admin);
        }
    }

    public function edit_data($id_admin)
	{
		// $data = array(
		// 	'id_admin'	   => $id_admin,
		// 	'password'     => md5($this->input->post('password')),
        //     'nama_dosen'    => $this->input->post('nama_dosen'),
        //     'nip'          => $this->input->post('nip'),
        //     'email'        => $this->input->post('email'),
		// );

        if ($this->input->post('password')=='') {
            $data = array(
                'id_admin'	   => $id_admin,
                'nama_dosen'    => $this->input->post('nama_dosen'),
                'nip'          => $this->input->post('nip'),
                'email'        => $this->input->post('email'),
            );
        }else {
            $data = array(
                'id_admin'	   => $id_admin,
                'password'     => md5($this->input->post('password')),
                'nama_dosen'    => $this->input->post('nama_dosen'),
                'nip'          => $this->input->post('nip'),
                'email'        => $this->input->post('email'),
            );
        }

		$this->m_dosen->edit($data);
		$this->session->set_flashdata('pesan_data', 'Data Berhasil Diubah!');
        redirect('dosen/dashboard/profile/' . $id_admin);
	}
}
