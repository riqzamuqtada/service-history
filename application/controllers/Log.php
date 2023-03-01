<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{

    var $title = "Log Activity";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('service_model');
        if (!$this->session->userdata('username')) {
            redirect();
        }
    }

    public function index()
    {
        $data = [
            'title' => $this->title
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('service/logService', $data);
        $this->load->view('templates/footer');
        $this->load->view('service/script');
    }

    public function getLog()
    {
        $result = $this->service_model->getDataLog();
        $no = $_POST['start'];
        $data = [];
        foreach ($result as $r) {
            $keterangan = '<span class="d-inline-block text-truncate">' . $r->keterangan . ',</span>';
            $waktu = "pada " . date('d-m-Y H:i:s', strtotime($r->created_at));

            $row = [];
            $row[] = ++$no;
            $row[] = $keterangan;
            $row[] = $waktu;
            $data[] = $row;
        }

        $ouput = [
            'draw' => $_POST['draw'],
            'recordsTotal'      => $this->service_model->count_all_log(),
            'recordsFiltered'   => $this->service_model->count_filtered_log(),
            'data'              => $data
        ];

        echo json_encode($ouput);
    }

}