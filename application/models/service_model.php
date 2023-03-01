<?php
defined('BASEPATH') or exit('No direct script access allowed');

class service_model extends CI_Model
{
    var $table = "service s";
    var $order = ['', 's.tanggal', 'u.nama_unit', 's.nama_barang_service', 's.keterangan'];

    private function _getDataQuery()
    {
        $id_unit = $this->input->post('id_unit');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->db->from($this->table);
        $this->db->join('unit u', 's.id_unit=u.id_unit');

        if (!empty($id_unit)) {
            $this->db->where('s.id_unit', $id_unit);
        }

        if (!empty($bulan)) {
            $this->db->like('s.tanggal', '-' . $bulan . '-');
        }

        if (!empty($tahun)) {
            $this->db->like('s.tanggal', $tahun);
        }

        if (isset($_POST['search']['value'])) {
            $this->db->like('s.nama_barang_service', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {

            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tanggal', 'DESC');
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

    public function getUnitById($id)
    {
        $this->db->select('id_unit, nama_unit');
        return $this->db->get_where('unit', ['id_unit' => $id])->row_array();
    }

    public function getById($id)
    {
        $this->db->select("s.*, u.nama_unit");
        $this->db->join('unit u', 's.id_unit=u.id_unit');
        $this->db->where('s.id_service', $id);
        return $this->db->get($this->table)->row_array();
    }

    public function tambahRiwayat($data)
    {
        $this->db->insert('service', $data);

        return $this->db->insert_id();
    }

    public function updateRiwayat($id, $data, $logData)
    {
        $this->db->where('id_service', $id);
        $this->db->update($this->table, $data);

        $this->db->insert('log', $logData);

        $this->session->set_flashdata('main', "Riwayat service berhasil diubah");
        redirect('service');
    }

    public function delete($id)
    {
        $service = $this->getById($id);
        $this->db->delete('service', ['id_service' => $id]);
        $logData = [
            'id_service'    => $id,
            'keterangan'    => $this->session->userdata('username') . " mengahapus riwayat service " . $service['nama_barang_service'] . " unit " . $service['nama_unit']
        ];
        $this->db->insert('log', $logData);
    }

    public function getLaporan()
    {
        $unit = $this->input->post('id_unit');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        if (!empty($unit)) {
            $this->db->where('s.id_unit', $unit);
        }

        if (!empty($bulan)) {
            $this->db->like('s.tanggal', '-' . $bulan . '-');
        }

        if (!empty($tahun)) {
            $this->db->like('s.tanggal', $tahun);
        }

        $this->db->from($this->table);
        $this->db->select('s.*, u.nama_unit');
        $this->db->join('unit u', 's.id_unit=u.id_unit');
        $this->db->order_by('s.tanggal', 'DESC');

        $data = $this->db->get()->result_array();
        return $data;
    }

    public function logById($id)
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get_where('log', ['id_service' => $id])->result_array();
    }

    public function getLog()
    {
        return $this->db->get('log')->result_array();
    }

    private function _getDataQueryLog()
    {
        $id_unit = $this->input->post('id_unit');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->db->from('log');

        if (isset($_POST['search']['value'])) {
            $this->db->like('keterangan', $_POST['search']['value']);
            $this->db->or_like('created_at', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {

            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('created_at', 'DESC');
        }
    }

    public function getDataLog()
    {
        $this->_getDataQueryLog();
        if ($_POST['length'] != 1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get()->result();
        return $query;
    }

    public function count_filtered_log()
    {
        $this->_getDataQueryLog();
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function count_all_log()
    {
        $this->db->from('log');
        return $this->db->count_all_results();
    }

    public function insertLog($status)
    {
        
    }
}
