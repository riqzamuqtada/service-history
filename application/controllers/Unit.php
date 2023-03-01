<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    var $title = "Data Unit";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('unit_model');
        if (!$this->session->userdata('username')) {
            redirect();
        }
    }

    public function index()
    {
        $data = [
            'title' =>  $this->title,
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('unit/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('unit/script');
    }

    public function getdata()
    {
        $result = $this->unit_model->getDataTable();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $r) {
            $created_at = date('d-m-Y H:i:s', strtotime($r->created_at));
            $update_at = date('d-m-Y H:i:s', strtotime($r->update_at));
            $action =   "<center>
                            <i data-url='" . base_url('unit/update/') . $r->id_unit . "' class='btn-update fas fa-edit text-primary mr-1'></i>
                            |
                            <i data-url='" . base_url() . "' data-id='" . $r->id_unit . "' data-nama='" . $r->nama_unit . "' class='btn-delete fas fa-trash-alt text-danger ml-1'></i>
                        </center>";
            $row = [];
            $row[] = ++$no;
            $row[] = $r->code_unit;
            $row[] = $r->nama_unit;
            $row[] = $created_at;
            $row[] = $update_at;
            $row[] = $action;
            $data[] = $row;
        }

        $ouput = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->unit_model->count_all_data(),
            'recordsFiltered' => $this->unit_model->count_filtered_data(),
            'data' => $data
        ];

        // $this->output->set_content_type('application/json')->set_output(json_encode($ouput));
        echo json_encode($ouput);
    }

    public function tambah()
    {
        $data = [
            'title' => $this->title
        ];

        $this->_rulesTambah();

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('unit/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'code_unit' => htmlspecialchars($this->input->post('code_unit', true)),
                'nama_unit' => htmlspecialchars($this->input->post('nama_unit', true))
            ];

            $this->unit_model->tambahUnit($data);
            $this->session->set_flashdata('main', 'Unit berhasil ditambahkan');
            redirect('unit');
        }
    }

    public function update($id)
    {
        $data = [
            'title' => $this->title,
            'unit' => $this->db->get_where('unit', ['id_unit' => $id])->row_array()
        ];
        $data['value'] = [
            'code' => !empty(set_value('code_unit')) ? set_value('code_unit') : $data['unit']['code_unit'],
            'nama' => !empty(set_value('nama_unit')) ? set_value('nama_unit') : $data['unit']['nama_unit']
        ];
        $codeUnit = $data['unit']['code_unit'];

        $this->_rulesUpdate($codeUnit);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('unit/update', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'code_unit' => htmlspecialchars($this->input->post('code_unit')),
                'nama_unit' => htmlspecialchars($this->input->post('nama_unit'))
            ];

            $this->unit_model->update($data, $id);
            $this->session->set_flashdata('main', 'Unit berhasil diubah');
            redirect('unit');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $service = $this->db->get_where('service', ['id_unit' => $id])->num_rows();

        if ($service > 0) {

            $alert = [
                'type' => "error", // type alert
                'text' => "Unit " . $nama . " sedang digunakan pada riwayat service" // text alert
            ];
        } else {

            $alert = [
                'text' => "Unit " . $nama . " berhasil dihapus", // text alert
                'type' => "success", // type alert
            ];

            $this->db->delete('unit', ['id_unit' => $id]);
        }
        echo json_encode($alert);
    }

    public function cetak()
    {
        $data = [
            'unit' => $this->unit_model->getLaporan()
        ];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data-unit.pdf";
        $this->pdf->load_view('unit/laporan', $data);
    }

    private function _rulesTambah()
    {
        $this->form_validation->set_rules('code_unit', 'Kode Unit', 'trim|required|is_unique[unit.code_unit]', [
            'required' => "Kode Unit harus di isi",
            'is_unique' => "Kode Unit sudah digunakan"
        ]);
        $this->form_validation->set_rules('nama_unit', 'Nama Unit', 'trim|required', [
            'required' => "Nama Unit harus di isi"
        ]);
    }

    private function _rulesUpdate($codeUnit)
    {
        $message = [
            'required' => "{field} harus di isi",
            'numeric' => "{field} hanya boleh di isi angka",
            'is_unique' => "{field} sudah digunakan"
        ];

        if ($this->input->post('code_unit') === $codeUnit) {
            // jika kode unit tidak di ubah
            $this->form_validation->set_rules('code_unit', 'Kode Unit', 'trim|required|numeric', $message);
        } else {
            // jika di ubah
            $this->form_validation->set_rules('code_unit', 'Kode Unit', 'trim|required|numeric|is_unique[unit.code_unit]', $message);
        }
        $this->form_validation->set_rules('nama_unit', 'Nama Unit', 'trim|required', $message);
    }
}
