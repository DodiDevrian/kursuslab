<?php

class Asprak extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_asprak');
        $this->load->model('m_kursus');
        $this->load->model('m_praktikan');

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
            'title'         => 'Asprak',
            'title2'        => 'Laboratorium Teknik Informatika',
            'count_new'     => $this->m_praktikan->lists(),
            'asprak'        => $this->m_asprak->lists_asprak(),
            'isi'           => 'admin/asprak/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required', array('required'=>'Nomor Handphone Harus Diisi!'));
        // $this->form_validation->set_rules(
        //     'nama_asprak', 'Asprak', 
        //     'required|is_unique[tbl_asprak.nama_asprak]',
        //     array(
        //         'required'      => 'Harus Pilih Akun!',
        //         'is_unique'     => 'Akun Sudah Menjadi Asprak. Silahkan Pilih Akun Lain!'
        //     )
        // );
        $this->form_validation->set_rules(
            'id_user', 'Email',
            'required|is_unique[tbl_asprak.id_user]',
            array(
                'required'      => 'Harus Pilih Email!',
                'is_unique'     => 'Akun Sudah Menjadi Asprak. Silahkan Pilih Akun Lain!'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Asprak',
                'title2'        => 'Tambah Data Asprak',
                'count_new'     => $this->m_praktikan->lists(),
                'mahasiswa'     => $this-> m_praktikan->lists(),
                'asprak'        => $this->m_asprak->lists_asprak(),
                'isi'           => 'admin/asprak/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            
            $asprak = $this->m_praktikan->lists();
            foreach ($asprak as $key => $value) {
                if ($this->input->post('id_user') == $value->id_user) {
                    $nama_asprak = $value->nama_user;
                }
            }

            $data = array(
                'id_user'          => $this->input->post('id_user'),
                'id_asprak'        => $this->input->post('id_user'),
                'nama_asprak'      => $nama_asprak,
                'no_hp'            => $this->input->post('no_hp'),
            );

            $this->m_asprak->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            redirect('admin/asprak');
        }
    }

    public function edit($id_asprak)
    {
        $this->form_validation->set_rules('nama_asprak', 'Nama Asprak', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './upload/foto_asprak/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';
            $config['max_size']         = 20000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_asprak')) {

                $data = array(
                    'title'     => 'Asprak',
                    'title2'    => 'Ubah Data Asprak',
                    'count_new'     => $this->m_praktikan->lists(),
                    'error'     => $this->upload->display_errors(),
                    'kursus'     => $this->m_kursus->lists(),
                    'asprak'    =>  $this->m_asprak->detail_asprak($id_asprak),
                    'isi'       => 'admin/asprak/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/foto_asprak/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // Hapus file foto yang lama
                $asprak = $this->m_asprak->detail_asprak($id_asprak);
                if ($asprak->foto_asprak != "") {
                    unlink('./upload/foto_asprak/' . $asprak->foto_asprak);
                }

                $data = array(
                    'id_asprak'       => $id_asprak,
                    'username'     => $this->input->post('username'),
                    'password'     => $this->input->post('password'),
                    'nama_asprak'    => $this->input->post('nama_asprak'),
                    'nim'          => $this->input->post('nim'),
                    'no_hp'        => $this->input->post('no_hp'),
                    'foto_asprak'    => $upload_data['uploads']['file_name']
                );

                $this->m_asprak->edit($data);
                $this->session->set_flashdata('pesan', 'Data kursus Berhasil Diubah!');
                redirect('admin/asprak');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_asprak/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_asprak'      => $id_asprak,
                'username'       => $this->input->post('username'),
                'password'       => $this->input->post('password'),
                'nama_asprak'    => $this->input->post('nama_asprak'),
                'nim'            => $this->input->post('nim'),
                'no_hp'          => $this->input->post('no_hp'),
            );

            $this->m_asprak->edit($data);
            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Diubah!');
            redirect('admin/asprak');
        }
        $data = array(
            'title'     => 'Asprak',
            'title2'    => 'Ubah Data Asprak',
            'count_new'     => $this->m_praktikan->lists(),
            'asprak'    =>  $this->m_asprak->detail_asprak($id_asprak),
            'kursus'     => $this->m_kursus->lists(),
            'isi'       => 'admin/asprak/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_asprak)
    {
        $data = array('id_asprak' => $id_asprak);
        $this->m_asprak->delete($data);
        $this->session->set_flashdata('pesan', 'Data Guru Berhasil Dihapus!');
        redirect('admin/asprak');
    }
}