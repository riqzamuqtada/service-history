<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    var $table = "user";
    var $column_order = ['id_user', 'nama_lengkap', 'nama_user', 'created_at', 'update_at'];
    var $order = ['id_user', 'nama_lengkap', 'nama_user', 'created_at', 'update_at'];

    private function _getDataQuery()
    {
        $this->db->from($this->table);
        if (isset($_POST['search']['value'])) {

            $this->db->like('nama_user', $_POST['search']['value']);
            $this->db->or_like('nama_lengkap', $_POST['search']['value']);
            $this->db->or_like('created_at', $_POST['search']['value']);
            $this->db->or_like('update_at', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {

            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('nama_user', 'ASC');
        }
    }

    public function getDataTable()
    {
        $this->_getDataQuery();
        if ($_POST['length'] != 1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data()
    {
        $this->_getDataQuery();
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function count_all_data()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function getUserById($id)
    {
        return $this->db->get_where($this->table, ['id_user' => $id])->row_array();
    }

    public function tambahUser($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function updateUser($data, $id)
    {
        $this->db->update($this->table, $data, ['id_user' => $id]);
    }

    public function gantiPassUser($data, $id)
    {
        $this->db->update($this->table, $data, ['id_user' => $id]);
    }

    public function getLaporan()
    {
        $this->db->order_by('nama_user', 'ASC');
        return $this->db->get($this->table)->result_array();
    }
}
