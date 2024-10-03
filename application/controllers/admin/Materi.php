<?php

class Materi extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_kursus');
        $this->load->model('m_materi');

        if ($this->agent->is_referral())
        {
            echo $this->agent->referrer();
        }

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
            'title'         => 'Materi',
            'title2'        => 'Laboratorium Teknik Informatika',
            'materi'        => $this->m_materi->lists(),
            'isi'           => 'admin/materi/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('ket_materi', 'Keterangan Materi', 'required');
        $this->form_validation->set_rules('id_yt', 'ID Youtube', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/doc_materi/';
            $config['allowed_types']    = 'doc|pdf|docx';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('doc_materi')) {

                $data = array(
                    'title'     => 'Materi',
                    'title2'    => 'Tambah Data Materi',
                    'error'     => $this->upload->display_errors(),
                    'kursus'     => $this->m_kursus->lists(),
                    'isi'       => 'admin/materi/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/doc_materi/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_materi'    => $this->input->post('nama_materi'),
                    'ket_materi'     => $this->input->post('ket_materi'),
                    'id_yt'          => $this->input->post('id_yt'),
                    'id_kursus'      => $this->input->post('id_kursus'),
                    'doc_materi'     => $upload_data['uploads']['file_name']
                );

                $this->m_materi->add($data);
                $this->session->set_flashdata('pesan', 'Data Materi Berhasil Ditambahkan!');
                redirect('admin/materi');
            }
        }
        $data = array(
            'title'     => 'Materi',
            'title2'    => 'Tambah Data Materi',
            'kursus'     => $this->m_kursus->lists(),
            'isi'       => 'admin/materi/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_materi)
    {
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('ket_materi', 'Keterangan Materi', 'required');
        $this->form_validation->set_rules('id_yt', 'Keterangan Materi', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/doc_materi/';
            $config['allowed_types']    = 'pdf|docx|doc';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('doc_materi')) {

                $data = array(
                    'title'     => 'Materi',
                    'title2'    => 'Ubah Data Materi',
                    'error'     => $this->upload->display_errors(),
                    'kursus'     => $this->m_kursus->lists(),
                    'materi'         =>  $this->m_materi->detail($id_materi),
                    'isi'       => 'admin/materi/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/doc_materi/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $kursus = $this->m_kursus->detail($id_materi);
                if ($kursus->doc_materi != "") {
                    unlink('./upload/doc_materi/' . $kursus->doc_materi);
                }

                $data = array(
                    'id_materi'       => $id_materi,
                    'id_kursus'       => $this->input->post('id_kursus'),
                    'nama_materi'     => $this->input->post('nama_materi'),
                    'ket_materi'      => $this->input->post('ket_materi'),
                    'id_yt'           => $this->input->post('id_yt'),
                    'doc_materi'        => $upload_data['uploads']['file_name']
                );

                $this->m_kursus->edit($data);
                $this->session->set_flashdata('pesan', 'Data kursus Berhasil Diubah!');
                redirect('akursus/list_materi/'. $this->uri->segment(3));
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/doc_materi/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_materi'       => $id_materi,
                'id_kursus'       => $this->input->post('id_kursus'),
                'nama_materi'     => $this->input->post('nama_materi'),
                'ket_materi'      => $this->input->post('ket_materi'),
                'id_yt'           => $this->input->post('id_yt')
            );

            $this->m_materi->edit($data);
            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Diubah!');
            redirect('admin/materi');
        }
        $data = array(
            'title'     => 'Materi',
            'title2'    => 'Ubah Data Materi',
            'materi'    =>  $this->m_materi->detail($id_materi),
            'kursus'     => $this->m_kursus->lists(),
            'isi'       => 'admin/materi/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_materi)
    {
        // Hapus foto yang lama
        $kursus = $this->m_kursus->detail_kursus($id_materi);
        if ($kursus->doc_materi != "") {
            unlink('./upload/doc_materi/' . $kursus->doc_materi);
        }

        $data = array('id_materi' => $id_materi);
        $this->m_materi->delete($data);
        $this->session->set_flashdata('pesan', 'Data Guru Berhasil Dihapus!');
        redirect('admin/materi');
    }
}