<?php

class Kursus extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_materi');

        if ($this->session->userdata('role')!=2) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Admin!</strong>
				</div>');
			redirect('auth/login');
		}
	}
    
    public function index()
    {
        $data = array(
            'title'   => 'Kursus',
            'title2'  => 'Laboratorium Teknik Informatika',
            'kursus'   => $this->m_kursus->lists(),
            'isi'     => 'dosen/kursus/v_list'
        );
        $this->load->view('dosen/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_kursus', 'Nama Kursus', 'required');
        $this->form_validation->set_rules('ket_kursus', 'Keterangan Kursus', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/cover_kursus/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('cover_kursus')) {

                $data = array(
                    'title'     => 'Kursus',
                    'title2'    => 'Tambah Data Kursus',
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/kursus/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/cover_kursus/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_kursus'    => $this->input->post('nama_kursus'),
                    'ket_kursus'     => $this->input->post('ket_kursus'),
                    'slug_kursus'   => url_title($this->input->post('nama_kursus'), 'dash', TRUE),
                    'cover_kursus'     => $upload_data['uploads']['file_name']
                );

                $this->m_kursus->add($data);
                $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Ditambahkan!');
                redirect('akursus');
            }
        }
        $data = array(
            'title'     => 'Kursus',
            'title2'    => 'Tambah Data Kursus',
            'isi'       => 'admin/kursus/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_kursus)
    {
        $this->form_validation->set_rules('nama_kursus', 'Nama Kursus', 'required');
        $this->form_validation->set_rules('ket_kursus', 'keterangan Kursus', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/cover_kursus/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('cover_kursus')) {

                $data = array(
                    'title'     => 'Kursus',
                    'title2'    => 'Ubah Data Kursus',
                    'error'     => $this->upload->display_errors(),
                    'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
                    'isi'       => 'admin/kursus/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/cover_kursus/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $kursus = $this->m_kursus->detail_kursus($id_kursus);
                if ($kursus->cover_kursus != "") {
                    unlink('./upload/cover_kursus/' . $kursus->cover_kursus);
                }

                $data = array(
                    'id_kursus'       => $id_kursus,
                    'nama_kursus'     => $this->input->post('nama_kursus'),
                    'ket_kursus'      => $this->input->post('ket_kursus'),
                    'cover_kursus'    => $upload_data['uploads']['file_name']
                );

                $this->m_kursus->edit($data);
                $this->session->set_flashdata('pesan', 'Data kursus Berhasil Diubah!');
                redirect('akursus');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/cover_kursus/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_kursus'      => $id_kursus,
                'nama_kursus'    => $this->input->post('nama_kursus'),
                'ket_kursus'     => $this->input->post('ket_kursus'),
            );

            $this->m_kursus->edit($data);
            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Diubah!');
            redirect('akursus');
        }
        $data = array(
            'title'     => 'kursus',
            'title2'    => 'Ubah Data kursus',
            'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
            'isi'       => 'admin/kursus/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    public function delete($id_kursus)
    {
        // Hapus foto yang lama
        $kursus = $this->m_kursus->detail_kursus($id_kursus);
        if ($kursus->cover_kursus != "") {
            unlink('./upload/cover_kursus/' . $kursus->cover_kursus);
        }

        $data = array('id_kursus' => $id_kursus);
        $this->m_kursus->delete($data);
        $this->session->set_flashdata('pesan', 'Data Guru Berhasil Dihapus!');
        redirect('akursus');
    }

    public function list_materi($id_kursus)
    {
        $data = array(
            'title'         => 'Materi',
            'title2'        => 'Laboratorium Teknik Informatika',
            'kursus'        => $this->m_kursus->detail_kursus($id_kursus),
            'materi'        => $this->m_kursus->lists_materi(),
            'id'            => $this->uri->segment(4),
            'isi'           => 'dosen/materi/v_list'
        );
        $this->load->view('dosen/layout/v_wrapper', $data, FALSE);
    }

    public function add_materi($id_kursus)
    {
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('ket_materi', 'Keterangan Materi', 'required');
        $this->form_validation->set_rules('id_yt', 'Keterangan Materi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/doc_materi/';
            $config['allowed_types']    = 'pdf|docx';
            $config['max_size']         = 200000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('doc_materi')) {

                $data = array(
                    'title'     => 'Materi',
                    'title2'    => 'Tambah Data Materi',
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/kursus/v_add_materi'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/doc_materi/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_kursus'      => $id_kursus,
                    'nama_materi'    => $this->input->post('nama_materi'),
                    'ket_materi'     => $this->input->post('ket_materi'),
                    'id_yt'          => $this->input->post('id_yt'),
                    'doc_materi'     => $upload_data['uploads']['file_name']
                );

                $this->m_materi->add($data);
                $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Ditambahkan!');
                redirect('akursus/list_materi/'. $this->uri->segment(3));
            }
        }
        $data = array(
            'title'     => 'Kursus',
            'title2'    => 'Tambah Data Kursus',
            'kursus'     => $this->m_kursus->detail_kursus($id_kursus),
            'isi'       => 'admin/kursus/v_add_materi'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit_status($id_materi)
	{
		$data = array(
			'id_materi'	=> $id_materi,
			'status' 	=> $this->input->post('status')
		);

		$this->m_materi->edit($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');

		$referred_from = $this->session->userdata('dosen_materi');
        redirect($referred_from, 'refresh');
	}



    public function detail_materi($id_materi)
    {
        $data = array(
            'title'         => 'Kursus',
            'title2'        => 'Laboratorium Teknik Informatika',
            'materi'        => $this->m_kursus->detail_materi($id_materi),
            'lists_materi'  => $this->m_kursus->lists_materi(),
            'id'            => $this->uri->segment(4),
            'isi'           => 'v_detail_kursus'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}