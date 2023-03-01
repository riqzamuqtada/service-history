<?php
defined('BASEPATH') or exit('No direct script access allowed');

class unit_model extends CI_Model
{
    var $table = "unit";
    var $order = [ '', 'code_unit', 'nama_unit', 'created_at', 'update_at'];

    private function _getDataQuery()
    {
        $this->db->from($this->table);
        if (isset($_POST['search']['value'])) {

            $this->db->like('code_unit', $_POST['search']['value']);
            $this->db->or_like('nama_unit', $_POST['search']['value']);
            $this->db->or_like('created_at', $_POST['search']['value']);
            $this->db->or_like('update_at', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {

            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('code_unit', 'ASC');
        }
    }

    public function getDataTable()
    {
        $this->_getDataQuery();
        if($_POST['length'] != 1){
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

    public function tambahUnit($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($data, $id)
    {
        $this->db->update('unit', $data, ['id_unit' => $id]);
    }

    public function getLaporan()
    {
        $this->db->order_by('code_unit', 'ASC');
        return $this->db->get($this->table)->result_array();
    }
    
}
