<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
    protected $table = 'tbl_mahasiswa';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_id($id)
    {
        return $this->db->get_where($this->table, ['id_mahasiswa' => $id])->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($data, $id)
    {
        $this->db->where('id_mahasiswa', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_mahasiswa', $id)->delete($this->table);
    }
}
