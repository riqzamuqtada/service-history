<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect();
        } else {

            $data = [
                'title' => "Dashboard",
                'jumlah' => $this->_jumlahData(),
                'log' => $this->_getLog()
            ];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates/footer');
        }
    }

    private function _getLog()
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(10);
        return $this->db->get('log')->result_array();
    }

    private function _jumlahData()
    {
        $data = [
            'service' => $this->db->get('service')->num_rows(),
            'notes' => $this->db->get('notes')->num_rows(),
            'unit' => $this->db->get('unit')->num_rows(),
            'penempatan' => $this->db->get('penempatan')->num_rows(),
        ];

        return $data;
    }
}
