<?php

class Diskusi extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->model('m_diskusi');

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
            'title'         => 'Forum Diskusi',
            'title2'        => 'Laboratorium Teknik Informatika',
            'count_new'     => $this->m_praktikan->lists(),
            'diskusi'        => $this->m_diskusi->list(),
            'isi'           => 'admin/diskusi/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_diskusi)
    {
        $diskusi = $this->m_diskusi->detail($id_diskusi);
        if ($diskusi->foto_diskusi != "") {
            unlink('./upload/foto_diskusi/' . $diskusi->foto_diskusi);
        }
        if ($diskusi->foto_diskusi_asprak != "") {
            unlink('./upload/foto_diskusi_asprak/' . $diskusi->foto_diskusi_asprak);
        }

        $data = array('id_diskusi' => $id_diskusi);
        $this->m_diskusi->delete($data);

        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('admin/diskusi');
    }
}