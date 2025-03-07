<?php

class Asset extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_asset');

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
            'title'         => 'Asset',
            'title2'        => 'Laboratorium Teknik Informatika',
            'asset'         => $this->m_asset->lists(),
            'count_new'     => $this->m_praktikan->lists(),
            'isi'           => 'admin/asset/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $config['upload_path']      = './upload/foto_asset/';
        $config['allowed_types']    = 'jpg|png|jpeg|gif';
        $config['max_size']         = 20000;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_asset')) {
            echo "Data Gagal Ditambah";
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_asset/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'foto_asset'    => $upload_data['uploads']['file_name']
            );

            $this->m_asset->add($data);
            $this->session->set_flashdata('pesan', 'Data Asset Berhasil Ditambahkan!');
            redirect('admin/asset');
        }
    }

    public function delete($id_asset)
    {
        // Hapus foto yang lama
        $asset = $this->m_asset->detail($id_asset);
        if ($asset->foto_asset != "") {
            unlink('./upload/foto_asset/' . $asset->foto_asset);
        }

        $data = array('id_asset' => $id_asset);
        $this->m_asset->delete($data);
        $this->session->set_flashdata('pesan', 'Data Asset Berhasil Dihapus!');
        redirect('admin/asset');
    }
}