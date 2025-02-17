<?php

class Diskusi extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_diskusi');
        $this->load->model('m_asprak');

        if ($this->session->userdata('role')!=4) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Admin!</strong>
				</div>');
			redirect('auth/login');
		}
	}

    public function index()
    {
        $data = array(
            'title'         => 'Forum Diskusi',
            'title2'        => 'Laboratorium Teknik Informatika',
            'diskusi'        => $this->m_diskusi->list(),
            'asprak'   => $this->m_asprak->lists(),
            'isi'           => 'asprak/diskusi/v_list'
        );
        $this->load->view('asprak/layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_diskusi)
    {
        $config['upload_path']      = './upload/foto_diskusi_asprak/';
        $config['allowed_types']    = 'jpg|png|jpeg|gif';
        $config['max_size']         = 20000;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_diskusi_asprak')) {
            $data = array(
                'id_diskusi'      => $id_diskusi,
                'diskusi_asprak'     => $this->input->post('diskusi_asprak')
            );
            $this->m_diskusi->edit($data);
            $this->session->set_flashdata('pesan', 'Jawaban Berhasil Diubah!');
            redirect('asisten/diskusi');

        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_diskusi_asprak/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $jawab = $this->m_diskusi->detail($id_diskusi);
            if ($jawab->foto_diskusi_asprak != "") {
                unlink('./upload/foto_diskusi_asprak/' . $jawab->foto_diskusi_asprak);
            }

            $data = array(
                'id_diskusi'      => $id_diskusi,
                'diskusi_asprak'     => $this->input->post('diskusi_asprak'),
                'foto_diskusi_asprak'    => $upload_data['uploads']['file_name']
            );

            $this->m_diskusi->edit($data);
            $this->session->set_flashdata('pesan', 'Jawaban dan Gambar Berhasil Diubah!');
            redirect('asisten/diskusi');
        }
    }
}