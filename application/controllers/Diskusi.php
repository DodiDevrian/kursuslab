<?php

class Diskusi extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

        $this->load->library('pagination');

        $this->load->model('m_diskusi');
        $this->load->model('m_kursus');
        $this->load->model('m_asprak');
	}

    public function index2()
    {
        $data = array(
            'title'   => 'Forum Diskusi',
            'title2'  => 'Laboratorium Teknik Informatika',
            'diskusi'   => $this->m_diskusi->lists(),
            'kursus'    => $this->m_kursus->lists(),
            'isi'     => 'diskusi/v_diskusi'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function index()
    {

        $config['base_url'] = site_url('diskusi/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_diskusi'); //total row
        $config['per_page'] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['next_link']		= 'Next';
		$config['prev_link']		= 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']	= '</ul></nav></div>';

		$config['num_tag_open']		= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']	= '</span></li>';

		$config['cur_tag_open']		= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']	= '</span></li>';

		$config['next_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']	= '<span aria-hidden="true">&raquo</span></span></li>';

		$config['prev_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']	= '</span>Next</li>';

		$config['first_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close']	= '</span></li>';

		$config['last_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']	= '</span></li>';

        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['diskusi'] = $this->m_diskusi->lists($config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['kursus'] = $this->m_kursus->lists();
        $data['title'] = 'Forum Diskusi';
        $data['title2'] = 'Laboratorium Teknik Informatika';

        $this->load->view('layout/v_head', $data);
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('diskusi/v_diskusi', $data);
        $this->load->view('layout/v_footer');
    }

    public function me()
    {

        $config['base_url'] = site_url('diskusi/me/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_diskusi'); //total row
        $config['per_page'] = 10;
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['next_link']		= 'Next';
		$config['prev_link']		= 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']	= '</ul></nav></div>';

		$config['num_tag_open']		= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']	= '</span></li>';

		$config['cur_tag_open']		= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']	= '</span></li>';

		$config['next_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']	= '<span aria-hidden="true">&raquo</span></span></li>';

		$config['prev_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']	= '</span>Next</li>';

		$config['first_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close']	= '</span></li>';

		$config['last_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']	= '</span></li>';

        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['diskusi'] = $this->m_diskusi->lists($config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['kursus'] = $this->m_kursus->lists();
        $data['title'] = 'Forum Diskusi';
        $data['title2'] = 'Laboratorium Teknik Informatika';

        $this->load->view('layout/v_head', $data);
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('diskusi/v_diskusi_id', $data);
        $this->load->view('layout/v_footer');
    }

    public function detail_diskusi2($id_kursus)
    {

        // $idkursus = $this->m_kursus->detail_kursus($id_kursus);

        $config['base_url'] = site_url('diskusi/detail_diskusi/'. $id_kursus . '/index/' ); //site url
        // $config['total_rows'] = $this->db->count_all('tbl_diskusi'); //total row
        $config['total_rows'] = $this->db->where('id_kursus','1')->from("tbl_diskusi")->count_all_results();

        $config['per_page'] = 5;
        $config["uri_segment"] = 5;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['next_link']		= 'Next';
		$config['prev_link']		= 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']	= '</ul></nav></div>';

		$config['num_tag_open']		= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']	= '</span></li>';

		$config['cur_tag_open']		= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']	= '</span></li>';

		$config['next_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']	= '<span aria-hidden="true">&raquo</span></span></li>';

		$config['prev_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']	= '</span>Next</li>';

		$config['first_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close']	= '</span></li>';

		$config['last_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']	= '</span></li>';

        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['diskusi'] = $this->m_diskusi->listsById($id_kursus,$config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['kursus'] = $this->m_kursus->lists();
        $data['detail_asprak'] = $this->m_asprak->detail_asprak($id_kursus);
        $data['detail_kursus'] = $this->m_kursus->detail_kursus($id_kursus);
        $data['id'] = $this->uri->segment(3);
        $data['title'] = 'Forum Diskusi';
        $data['title2'] = 'Laboratorium Teknik Informatika';

        $this->load->view('layout/v_head', $data);
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('diskusi/v_detail_diskusi', $data);
        $this->load->view('layout/v_footer');
    }

    public function detail_diskusi($id_kursus)
    {
        $data = array(
            'title'         => 'Kursus',
            'title2'        => 'Laboratorium Teknik Informatika',
            'kursus'        => $this->m_kursus->lists(),
            'detail_asprak' => $this->m_asprak->detail_asprak($id_kursus),
            'detail_kursus' => $this->m_kursus->detail_kursus($id_kursus),
            'diskusi'       => $this->m_diskusi->list(),
            'id'            => $this->uri->segment(3),
            'isi'           => 'diskusi/v_detail_diskusi'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function detail_diskusi_me($id_kursus)
    {
        $data = array(
            'title'         => 'Kursus',
            'title2'        => 'Laboratorium Teknik Informatika',
            'kursus'        => $this->m_kursus->lists(),
            'detail_asprak' => $this->m_asprak->detail_asprak($id_kursus),
            'detail_kursus' => $this->m_kursus->detail_kursus($id_kursus),
            'diskusi'       => $this->m_diskusi->list(),
            'id'            => $this->uri->segment(3),
            'isi'           => 'diskusi/v_detail_diskusi_me'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function add_chat_user()
    {
        $config['upload_path']      = './upload/foto_diskusi/';
        $config['allowed_types']    = 'jpg|png|jpeg|gif';
        $config['max_size']         = 20000;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_diskusi')) {
            $data = array(
                'id_user'           => $this->input->post('id_user'),
                'id_kursus'         => $this->input->post('id_kursus'),
                'id_asprak'         => $this->input->post('id_asprak'),
                'diskusi_user'      => $this->input->post('diskusi_user')
            );

            $this->m_diskusi->add_chat_user($data);
            $this->session->set_flashdata('pesan', 'Diskusi Berhasil Ditambahkan!');

            $referred_from = $this->session->userdata('chat_diskusi');
            redirect($referred_from, 'refresh');
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto_diskusi/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_user'   => $this->input->post('id_user'),
                'id_kursus'     => $this->input->post('id_kursus'),
                'id_asprak'     => $this->input->post('id_asprak'),
                'diskusi_user'     => $this->input->post('diskusi_user'),
                'foto_diskusi'    => $upload_data['uploads']['file_name']
            );

            $this->m_diskusi->add_chat_user($data);
            $this->session->set_flashdata('pesan', 'Diskusi Berhasil Ditambahkan!');

            $referred_from = $this->session->userdata('chat_diskusi');
            redirect($referred_from, 'refresh');
        }
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

        $referred_from = $this->session->userdata('chat_diskusi');
            redirect($referred_from, 'refresh');
    }
}