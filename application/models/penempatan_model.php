<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penempatan_model extends CI_Model
{
    var $table = "penempatan p";
    var $order = ['', 'p.tanggal', 'u.nama_unit', 'p.barang', 'p.keterangan'];

    private function _getDataQuery()
    {
        $id_unit = $this->input->post('id_unit');
        $tgl_awal = $this->input->post('awal');
        $tgl_akhir = $this->input->post('akhir');

        $this->db->from($this->table);
        $this->db->join('unit u', 'p.id_unit=u.id_unit');

        if (!empty($id_unit)) {
            $this->db->where('p.id_unit', $id_unit);
        }
        if (!empty($tgl_awal)) {
            $this->db->where('p.tanggal >=', $tgl_awal);
        }
        if (!empty($tgl_akhir)) {
            $this->db->where('p.tanggal <=', $tgl_akhir);
        }

        if (isset($_POST['search']['value'])) {
            $this->db->like('p.barang', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {

            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('p.tanggal', 'DESC');
        }
    }

    public function getDataTable()
    {
        $this->_getDataQuery();
        if ($_POST['length'] != 1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get()->result();
        return $query;
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

    public function getUnit()
    {
        $this->db->select('id_unit, nama_unit');
        return $this->db->get('unit')->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('penempatan', $data);
    }

    public function delete($id)
    {
        $this->db->delete('penempatan', ['id_penempatan' => $id]);
    }

    public function getById($id)
    {
        $this->db->select("p.*, u.nama_unit");
        $this->db->join('unit u', 'p.id_unit=u.id_unit');
        $this->db->where('p.id_penempatan', $id);
        return $this->db->get($this->table)->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_penempatan', $id);
        $this->db->update('penempatan', $data);

        $this->session->set_flashdata('main', "Penempatan berhasil diubah");
        redirect('penempatan');
    }

    public function getLaporan()
    {
        $unit = $this->input->post('id_unit');
        $tgl_awal = $this->input->post('awal');
        $tgl_akhir = $this->input->post('akhir');

        if (!empty($unit)) {
            $this->db->where('s.id_unit', $unit);
        }

        if (!empty($tgl_awal)) {
            $this->db->where('p.tanggal >=', $tgl_awal);
        }

        if (!empty($tgl_akhir)) {
            $this->db->where('p.tanggal <=', $tgl_akhir);
        }

        $this->db->from($this->table);
        $this->db->select('p.*, u.nama_unit');
        $this->db->join('unit u', 'p.id_unit=u.id_unit');
        $this->db->order_by('p.tanggal', 'DESC');

        $data = $this->db->get()->result_array();
        return $data;
    }

}
