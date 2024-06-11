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
        $this->form_validation->set_rules('nama_slider', 'Nama Slider', 'required');


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_slider/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_slider')) {

                $data = array(
                    'title'     => 'Slider',
                    'title2'    => 'Tambah Data Slider',
                    'error'     => $this->upload->display_errors(),
                    'slider'     => $this->m_slider->lists(),
                    'isi'       => 'admin/slider/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_slider/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_slider'    => $this->input->post('nama_slider'),
                    'foto_slider'    => $upload_data['uploads']['file_name']
                );

                $this->m_slider->add($data);
                $this->session->set_flashdata('pesan', 'Data Asprak Berhasil Ditambahkan!');
                redirect('admin/slider');
            }
        }
        $data = array(
            'title'     => 'Slider',
            'title2'    => 'Tambah Data Slider',
            'slider'     => $this->m_slider->lists(),
            'isi'       => 'admin/slider/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_slider)
    {
        $this->form_validation->set_rules('nama_slider', 'Nama Slider', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_slider/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_slider')) {

                $data = array(
                    'title'     => 'Slider',
                    'title2'    => 'Ubah Data Slider',
                    'error'     => $this->upload->display_errors(),
                    'slider'    =>  $this->m_slider->detail($id_slider),
                    'isi'       => 'admin/slider/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_slider/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $kursus = $this->m_kursus->detail($id_slider);
                if ($kursus->foto_slider != "") {
                    unlink('./upload/foto_slider/' . $kursus->foto_slider);
                }

                $data = array(
                    'id_slider'       => $id_slider,
                    'nama_slider'    => $this->input->post('nama_slider'),
                    'foto_slider'    => $upload_data['uploads']['file_name']
                );

                $this->m_slider->edit($data);
                $this->session->set_flashdata('pesan', 'Data kursus Berhasil Diubah!');
                redirect('admin/slider');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_slider/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_slider'      => $id_slider,
                'nama_slider'    => $this->input->post('nama_slider')
            );

            $this->m_slider->edit($data);
            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Diubah!');
            redirect('admin/slider');
        }
        $data = array(
            'title'     => 'Slider',
            'title2'    => 'Ubah Data Slider',
            'slider'    =>  $this->m_slider->detail($id_slider),
            'isi'       => 'admin/slider/v_edit'
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
}