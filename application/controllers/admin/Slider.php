<?php

class Slider extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_slider');
	}
    
    public function index()
    {
        $data = array(
            'title'         => 'Slider',
            'title2'        => 'Laboratorium Teknik Informatika',
            'slider'        => $this->m_slider->lists(),
            'isi'           => 'admin/slider/v_list'
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

    public function edit($id_asprak)
    {
        $this->form_validation->set_rules('nama_slider', 'Nama Asprak', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('id_kursus', 'Mata Kuliah', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_slider/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_slider')) {

                $data = array(
                    'title'     => 'Asprak',
                    'title2'    => 'Ubah Data Asprak',
                    'error'     => $this->upload->display_errors(),
                    'kursus'     => $this->m_kursus->lists(),
                    'asprak'    =>  $this->m_slider->detail($id_asprak),
                    'isi'       => 'admin/slider/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_slider/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $kursus = $this->m_kursus->detail($id_asprak);
                if ($kursus->foto_slider != "") {
                    unlink('./upload/foto_slider/' . $kursus->foto_slider);
                }

                $data = array(
                    'id_asprak'       => $id_asprak,
                    'nama_slider'    => $this->input->post('nama_slider'),
                    'nim'            => $this->input->post('nim'),
                    'id_kursus'      => $this->input->post('id_kursus'),
                    'no_hp'          => $this->input->post('no_hp'),
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
                'id_asprak'      => $id_asprak,
                'nama_slider'    => $this->input->post('nama_slider'),
                'nim'            => $this->input->post('nim'),
                'id_kursus'      => $this->input->post('id_kursus'),
                'no_hp'          => $this->input->post('no_hp'),
            );

            $this->m_slider->edit($data);
            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Diubah!');
            redirect('admin/slider');
        }
        $data = array(
            'title'     => 'Asprak',
            'title2'    => 'Ubah Data Asprak',
            'asprak'    =>  $this->m_slider->detail($id_asprak),
            'kursus'     => $this->m_kursus->lists(),
            'isi'       => 'admin/slider/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_asprak)
    {
        // Hapus foto yang lama
        $kursus = $this->m_kursus->detail_kursus($id_asprak);
        if ($kursus->foto_slider != "") {
            unlink('./upload/foto_slider/' . $kursus->foto_slider);
        }

        $data = array('id_materi' => $id_asprak);
        $this->m_materi->delete($data);
        $this->session->set_flashdata('pesan', 'Data Guru Berhasil Dihapus!');
        redirect('admin/materi');
    }
}