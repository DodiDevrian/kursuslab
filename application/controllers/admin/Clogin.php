<?php

class Clogin extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_clogin');

        if ($this->session->userdata('role')!=1) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Melakukan <strong>Login Sebagai Admin!</strong>
				</div>');
			redirect('auth/login_admin');
		}
	}

    public function index($id_clogin)
    {
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_login/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_login')) {

                $data = array(
                    'title'     => 'Cover Login',
                    'title2'    => 'Ubah Data Cover Login',
                    'error'     => $this->upload->display_errors(),
                    'clogin'    =>  $this->m_clogin->detail($id_clogin),
                    'count_new'     => $this->m_praktikan->lists(),
                    'id'        => $this->uri->segment(5),
                    'isi'       => 'admin/clogin/v_list'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_login/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $clogin = $this->m_clogin->detail($id_clogin);
                if ($clogin->foto_login != "") {
                    unlink('./upload/foto_login/' . $clogin->foto_login);
                }

                $data = array(
                    'id_clogin'       => $id_clogin,
                    'foto_login'    => $upload_data['uploads']['file_name']
                );

                $this->m_clogin->edit($data);
                $this->session->set_flashdata('pesan', 'Gambar Berhasil Diubah!');
                redirect('admin/clogin/index/' . $id_clogin);
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_login/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_clogin'      => $id_clogin,
            );

            $this->m_clogin->edit($data);
            $this->session->set_flashdata('pesan', 'Gambar Berhasil Diubah!');
            redirect('admin/clogin/index/' . $id_clogin);
        }
        $data = array(
            'title'     => 'Cover Login',
            'title2'    => 'Ubah Data Cover Login',
            'id'        => $this->uri->segment(5),
            'clogin'    =>  $this->m_clogin->detail($id_clogin),
            'count_new'     => $this->m_praktikan->lists(),
            'isi'       => 'admin/clogin/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_clogin)
    {
        $config['upload_path']      = './upload/foto_login/';
        $config['allowed_types']    = 'jpg|png|jpeg|gif';
        $config['max_size']         = 20000;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_login')) {
            echo "Data Gagal Ditambah";
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_login/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $clogin = $this->m_clogin->detail($id_clogin);
            if ($clogin->foto_login != "") {
                unlink('./upload/foto_login/' . $clogin->foto_login);
            }

            $data = array(
                'id_clogin'      => $id_clogin,
                'foto_login'    => $upload_data['uploads']['file_name']
            );

            $this->m_clogin->edit($data);
            $this->session->set_flashdata('pesan', 'Gambar Berhasil Diubah!');
            redirect('admin/clogin/index/' . $id_clogin);
        }
    }

    public function add()
    {
        $config['upload_path']      = './upload/foto_login/';
        $config['allowed_types']    = 'jpg|png|jpeg|gif';
        $config['max_size']         = 20000;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_login')) {
            echo "Data Gagal Ditambah";
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_login/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'foto_login'    => $upload_data['uploads']['file_name']
            );

            $this->m_clogin->add($data);
            $this->session->set_flashdata('pesan', 'Data Asset Berhasil Ditambahkan!');
            redirect('admin/clogin');
        }
    }

    public function delete($id_asset)
    {
        // Hapus foto yang lama
        $asset = $this->m_asset->detail($id_asset);
        if ($asset->foto_login != "") {
            unlink('./upload/foto_login/' . $asset->foto_login);
        }

        $data = array('id_asset' => $id_asset);
        $this->m_asset->delete($data);
        $this->session->set_flashdata('pesan', 'Data Asset Berhasil Dihapus!');
        redirect('admin/asset');
    }
}