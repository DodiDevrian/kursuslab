<?php

class Profile extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_profile');
        $this->load->model('m_posttest');
        $this->load->model('m_pretest');
	}

    public function mahasiswa($slug_user)
    {
        $data = array(
            'title'     => 'Profile',
            'title2'    => 'Laboratorium Teknik Informatika',
            'profile'   => $this->m_profile->profile($slug_user),
            'slug_user' => $this->uri->segment(4),
            'posttest'     => $this->m_posttest->do_posttest(),
            'pretest'     => $this->m_pretest->do_pretest(),
            'isi'       => 'v_profile'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function edit($slug_user)
    {
        $config['upload_path']      = './upload/foto_user/';
        $config['allowed_types']    = 'jpg|png|jpeg|gif';
        $config['max_size']         = 20000;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_user')) {
            echo "Data Gagal Ditambah";
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_user/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $profile = $this->m_profile->profile($slug_user);
            if ($profile->foto_user != "") {
                unlink('./upload/foto_user/' . $profile->foto_user);
            }

            $data = array(
                'slug_user'    => $slug_user,
                'foto_user'    => $upload_data['uploads']['file_name']
            );

            $this->m_profile->edit($data);
            $this->session->set_flashdata('pesan', 'Gambar Berhasil Diubah!');
            redirect('profile/mahasiswa/' . $slug_user);
        }
    }


}