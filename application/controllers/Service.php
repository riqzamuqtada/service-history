<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{

    var $title = "Riwayat Service";

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
            'title' =>  $this->title,
            'unit'  => $this->db->get('unit')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('service/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('service/script');
    }

    public function getdata()
    {

        $result = $this->service_model->getDataTable();
        $no = $_POST['start'];
        $data = [];
        foreach ($result as $r) {
            $color = $r->status_service == 0 ? "warning" : "primary";
            $field = $r->status_service == 0 ? "Proses" : "Selesai";
            $tgl = date('d-m-Y', strtotime($r->tanggal));
            $keterangan = '<span class="d-inline-block text-truncate" style="max-width: 150px;">' . $r->keterangan . '</span>';
            $status = '<span class="badge badge-' . $color . '">' . $field . '</span>';
            $action =   "<center>
                            <i data-url='" . base_url('service/detail/' . $r->id_service) . "' class='btn-detail fas fa-info-circle text-primary mr-1'></i>
                            |
                            <i data-url='" . base_url('service/update/' . $r->id_service) . "' class='btn-update info fas fa-edit text-primary mx-1'></i>
                            |
                            <i data-url='" . base_url() . "' data-id='" . $r->id_service . "' class='btn-delete fas fa-trash-alt text-danger ml-1'></i>
                        </center>";

            $row = [];
            $row[] = ++$no;
            $row[] = $tgl;
            $row[] = $r->nama_unit;
            $row[] = $r->nama_barang_service;
            $row[] = $keterangan;
            $row[] = $status;
            $row[] = $action;
            $data[] = $row;
        }

        $ouput = [
            'draw' => $_POST['draw'],
            'recordsTotal'      => $this->service_model->count_all_data(),
            'recordsFiltered'   => $this->service_model->count_filtered_data(),
            'data'              => $data
        ];

        echo json_encode($ouput);
    }

    public function tambah()
    {
        $data = [
            'title' => $this->title,
            'unit'  =>  $this->service_model->getUnit()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('service/tambah', $data);
        $this->load->view('templates/footer');
        $this->load->view('service/script');
    }

    public function tambahAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == true) {

            $tgl = $this->input->post('tanggal');

            if ($tgl <= date('Y-m-d')) {

                $foto = $_FILES['foto']['name'];

                if (!empty($foto)) {

                    $config['upload_path']      = './assets/img/';
                    $config['allowed_types']    = 'jpeg|jpg|png|svg';
                    $config['max_size']         = 2048;
                    $config['file_ext_tolower'] = true;
                    $config['encrypt_name']     = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {

                        $status_barang = $this->input->post('status_barang') === 'Y' ? '1' : '0';
                        $tempat = $this->input->post('tempat_perbaikan') === 'Y' ? '1' : '0';
                        $photo = $this->upload->data('file_name');
                        $data = [
                            'tanggal'                   => preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $this->input->post('tanggal')),
                            'id_unit'                   => $this->input->post('unit'),
                            'nama_barang_service'       => htmlspecialchars($this->input->post('barang_service', true)),
                            'keterangan'                => htmlspecialchars($this->input->post('keterangan', true)),
                            'status_barang'             => $status_barang,
                            'keterangan_barang_diganti' => htmlspecialchars($this->input->post('keterangan2', true)),
                            'foto'                      => $photo,
                            'status_service'            => $this->input->post('status'),
                            'tempat_perbaikan'         => $tempat
                        ];
                        $id_service = $this->service_model->tambahRiwayat($data);
                        $service = $this->service_model->getById($id_service);
                        $logData = [
                            'id_service'    => $id_service,
                            'keterangan'    => $this->session->userdata('username') . " menambah service '" . $service['nama_barang_service'] . "' unit " . $service['nama_unit']
                        ];
                        $this->db->insert('log', $logData);

                        $this->session->set_flashdata('main', 'Unit berhasil ditambahkan');
                        redirect('service');
                    } else {

                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('validasi_foto', $error);
                        $this->tambah();
                    }
                } else {

                    $this->session->set_flashdata('validasi_foto', 'Pilih foto terlebih dahulu');
                    $this->tambah();
                }
            } else {

                $this->session->set_flashdata('validasi_tgl', 'Tanggal service tidak boleh lebih dari tanggal hari ini');
                $this->tambah();
            }
        } else {

            $this->tambah();
        }
    }

    public function update($id)
    {
        $data = [
            'title'     => $this->title,
            'unit'      =>  $this->service_model->getUnit(),
            'service'   => $this->service_model->getById($id)
        ];
        $data['value'] = [
            'tanggal'                   => !empty(set_value('tanggal')) ? set_value('tanggal') : $data['service']['tanggal'],
            'id_unit'                   => !empty(set_value('unit')) ? set_value('unit') : $data['service']['id_unit'],
            'nama_barang_service'       => !empty(set_value('barang_service')) ? set_value('barang_service') : $data['service']['nama_barang_service'],
            'keterangan'                => !empty(set_value('keterangan')) ? set_value('keterangan') : $data['service']['keterangan'],
            'keterangan_barang_diganti' => !empty(set_value('keterangan2')) ? set_value('keterangan2') : $data['service']['keterangan_barang_diganti']
        ];
        $data['checked2'] = $data['service']['tempat_perbaikan'] === "0" ? "" : "checked";
        $data['select'] = $data['service']['status_service'] === "0" ? "" : "selected";
        $data['checked1'] = $data['service']['status_barang'] === "0" ? "" : "checked";
        $data['hidden'] = $data['service']['status_barang'] === "0" ? "hidden" : "";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('service/update', $data);
        $this->load->view('templates/footer');
        $this->load->view('service/script');
    }

    public function updateAksi()
    {
        $id = $this->input->post('id_service');
        $service = $this->service_model->getById($id);
        $unit = $this->service_model->getUnitById($this->input->post('unit'));
        // status
        $status = $this->input->post('status') == $service['status_service'] ? "" : "status ";
        $update =  $this->input->post('status') == 0 ? "proses" : "selesai";
        $menjadi = $this->input->post('status') == $service['status_service'] ? "" : " menjadi " . $update;

        $status_barang = $this->input->post('status_barang') === 'Y' ? '1' : '0';
        $tempat = $this->input->post('tempat_perbaikan') === 'Y' ? '1' : '0';
        $data = [
            'tanggal'                   => preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $this->input->post('tanggal')),
            'id_unit'                   => $this->input->post('unit'),
            'nama_barang_service'       => htmlspecialchars($this->input->post('barang_service', true)),
            'keterangan'                => htmlspecialchars($this->input->post('keterangan', true)),
            'status_barang'             => $status_barang,
            'keterangan_barang_diganti' => htmlspecialchars($this->input->post('keterangan2', true)),
            'status_service'            => $this->input->post('status'),
            'tempat_perbaikan'          => $tempat
        ];
       
        $logData = [
            'id_service'    => $id,
            'keterangan'    => $this->session->userdata('username') . " mengupdate " . $status . "service '" . $service['nama_barang_service'] . "' unit " . $unit['nama_unit'] . $menjadi
        ];
        
        $this->_rules();

        if ($this->form_validation->run() == true) {

            $tgl = $this->input->post('tanggal');

            if ($tgl <= date('Y-m-d')) {

                $foto = $_FILES['foto']['name'];

                if (!empty($foto)) {

                    $config['upload_path']      = './assets/img/';
                    $config['allowed_types']    = 'jpeg|jpg|png|svg';
                    $config['max_size']         = 3072;
                    $config['detect_mime']      = true;
                    $config['file_ext_tolower'] = true;
                    $config['encrypt_name']     = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {

                        $photo = $this->upload->data('file_name');
                        $this->db->set('foto', $photo);
                        $this->service_model->updateRiwayat($id, $data, $logData);
                    } else {

                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('validasi_foto', $error);
                        $this->update($id);
                    }
                } else {

                    $this->service_model->updateRiwayat($id, $data, $logData);
                }
            } else {

                $this->session->set_flashdata('validasi_tgl', 'Tanggal service tidak boleh lebih dari tanggal hari ini');
                $this->update($id);
            }
        } else {

            $this->update($id);
        }
    }

    public function detail($id = "")
    {
        $data = [
            'title'     => $this->title,
            'detail'    => $this->service_model->getById($id),
            'logService' => $this->service_model->logById($id)
        ];

        $data['tanggal'] = date('d-m-Y', strtotime($data['detail']['tanggal']));

        $data['tempat_perbaikan'] = $data['detail']['tempat_perbaikan'] === "1" ? "Diperbaiki di lokasi" : "Diperbaiki di puskom";
        $data['status_perbaikan'] = $data['detail']['status_service'] === "1" ? "Selesai" : "Proses";
        $data['status_barang'] = $data['detail']['status_barang'] === "1" ? "iya" : "tidak";
        $data['ketStatus'] = $data['detail']['status_barang'] === "1" ? $data['detail']['keterangan_barang_diganti'] : "-";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('service/detail', $data);
        $this->load->view('templates/footer');
        $this->load->view('service/script');
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->service_model->delete($id);

        $alert = [
            'type' => "success", // type alert
            'text' => "Data riwayat berhasil dihapus" // text alert
        ];

        echo json_encode($alert);
    }

    public function cetak()
    {
        $data = [
            'service' => $this->service_model->getLaporan()
        ];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-riwayat-service.pdf";
        $this->pdf->load_view('service/laporan', $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal Service', 'trim|required', [
            'required' => "{field} harus di isi"
        ]);
        $this->form_validation->set_rules('unit', 'Unit', 'trim|required', [
            'required' => "Pilih {field} terlebih dahulu"
        ]);
        $this->form_validation->set_rules('barang_service', 'Barang Service', 'trim|required', [
            'required' => 'Apa barang yang anda service?'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', [
            'required' => "{field} harus di isi"
        ]);
    }
}
