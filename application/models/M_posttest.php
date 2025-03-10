<?php

class M_posttest extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_posttest');
        $this->db->order_by('id_posttest', 'DESC');

        return $this->db->get()->result();
    }

    public function lists_soal()
    {
        $this->db->select('*');
        $this->db->from('tbl_posttest');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_posttest.id_kursus', 'left');
        $this->db->order_by('id_posttest', 'ASC');

        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_posttest', $data);
    }



    public function detail($id_posttest)
    {
        $this->db->select('*');
        $this->db->from('tbl_posttest');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_posttest.id_kursus', 'left');
        $this->db->where('id_posttest', $id_posttest);

        return $this->db->get()->row();
    }

    public function list_kunci()
    {
        $this->db->select('*');
        $this->db->from('tbl_kunci_posttest');
        $this->db->order_by('id_kunciposttest', 'DESC');

        return $this->db->get()->result();
    }

    public function kunci($id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tbl_kunci_posttest');
        $this->db->where('id_kursus', $id_kursus);

        return $this->db->get()->row();
    }

    public function add_kunci($data)
    {
        $this->db->insert('tbl_kunci_posttest', $data);
    }

    public function detail_kunci($id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tbl_kunci_posttest');
        $this->db->where('id_kursus', $id_kursus);

        return $this->db->get()->row();
    }

    public function submit($data)
    {
        $this->db->insert('tbl_do_posttest', $data);
    }

    public function hasil_posttest($id_kursus)
    {
        $this->db->select('*');
        $this->db->from('tbl_do_posttest');
        $this->db->where('id_kursus', $id_kursus);

        return $this->db->get()->row();
    }

    public function nilai()
    {
        $this->db->select('*');
        $this->db->from('tbl_do_posttest');
        $this->db->order_by('id_doposttest', 'ASC');

        return $this->db->get()->result();
    }

    public function do_posttest()
    {
        $this->db->select('*');
        $this->db->from('tbl_do_posttest');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_do_posttest.id_kursus', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_do_posttest.id_user', 'left');
        $this->db->order_by('id_doposttest', 'ASC');

        return $this->db->get()->result();
    }

    public function get_highest_values() {
        // Menggunakan join untuk mengambil data dari tabel data_values dan categories
        $this->db->select('*');
        $this->db->from('tbl_do_posttest');
        $this->db->join('tbl_kursus', 'tbl_kursus.id_kursus = tbl_do_posttest.id_kursus', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_do_posttest.id_user', 'left');

        $query = $this->db->get();
        $result = $query->result_array();

        // Array untuk menyimpan nilai tertinggi berdasarkan ID
        $highestValues = [];

        // Menggunakan foreach untuk iterasi data
        foreach ($result as $row) {
            $id_user = $row['id_user'];
            $nama_user = $row['nama_user'];
            $nim = $row['nim'];
            $nama_kursus = $row['nama_kursus'];
            $sum = $row['sum'];

            // Jika ID belum ada di highestValues, atau nilai saat ini lebih tinggi, simpan nilai tertinggi
            if (!isset($highestValues[$id_user]) || $sum > $highestValues[$id_user]['sum']) {
                $highestValues[$id_user] = [
                    'nama_user' => $nama_user,
                    'nim' => $nim,
                    'nama_kursus' => $nama_kursus,
                    'sum' => $sum,
                ];
            }
        }
        
        return $highestValues;
    }

}