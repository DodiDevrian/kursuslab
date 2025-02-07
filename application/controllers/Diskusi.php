<?php

class Diskusi extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');

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
            'isi'     => 'v_diskusi'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function index()
    {

        $config['base_url'] = site_url('duskusi/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_diskusi'); //total row
        $config['per_page'] = 5;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['diskusi'] = $this->m_diskusi->lists($config["per_page"], $data['page'])->result();
        // $data['pagination'] = $this->pagination->create_links();
        $data['kursus'] = $this->m_kursus->lists();
        $data['title'] = 'Forum Diskusi';
        $data['title2'] = 'Laboratorium Teknik Informatika';

        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('v_diskusi', $data);
        $this->load->view('layout/v_footer');


        // $data = array(
        //     'title'   => 'Forum Diskusi',
        //     'title2'  => 'Laboratorium Teknik Informatika',
        //     'diskusi'   => $this->m_diskusi->lists($config["per_page"] , ['page'])->result(),
        //     'kursus'    => $this->m_kursus->lists(),
        //     'page'  => ($this->uri->segment(3)) ? $this->uri->segment(3) : 0,
        //     // 'pagination' => $this->pagination->create_links(),
        //     'isi'     => 'v_diskusi'
        // );
        // $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function detail_diskusi($id_kursus)
    {
        $data = array(
            'title'         => 'Kursus',
            'title2'        => 'Laboratorium Teknik Informatika',
            'kursus'        => $this->m_kursus->lists(),
            'detail_asprak' => $this->m_asprak->detail_asprak($id_kursus),
            'detail_kursus' => $this->m_kursus->detail_kursus($id_kursus),
            'diskusi'       => $this->m_diskusi->lists(),
            'id'            => $this->uri->segment(3),
            'isi'           => 'v_detail_diskusi'
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
}