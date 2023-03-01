<?php
defined('BASEPATH') or exit('No direct script access allowed');

class notes_model extends CI_Model
{
    var $table = "notes";
    var $order = ['', 'judul', 'catatan', 'created_at'];

    private function _getDataQuery()
    {
        $this->db->from($this->table);
        if (isset($_POST['search']['value'])) {

            $this->db->like('Judul', $_POST['search']['value']);
            $this->db->or_like('catatan', $_POST['search']['value']);
            $this->db->or_like('created_at', $_POST['search']['value']);
            $this->db->or_like('update_at', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {

            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('update_at', 'DESC');
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

    public function tambahNotes($data)
    {
        $this->db->insert($this->table, $data);
        $this->session->set_flashdata('main', 'Catatan berhasil ditambahkan');
        redirect('notes');
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id_notes' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_notes', $id);
        $this->db->update($this->table, $data);
        $this->session->set_flashdata('main', "Catatan berhasil diubah");
        redirect('notes');
    }

    public function getLaporan()
    {
        $this->db->order_by('update_at', 'DESC');
        return $this->db->get($this->table)->result_array();
    }
}
