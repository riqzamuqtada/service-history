<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penempatan extends CI_Controller
{

    var $title = "Penempatan";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penempatan_model');
        if (!$this->session->userdata('username')) {
            redirect();
        }
    }

    public function index()
    {
        $data = [
            'title' =>  $this->title,
            'unit'  => $this->penempatan_model->getUnit()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penempatan/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('penempatan/script');
    }

    public function getdata()
    {

        $result = $this->penempatan_model->getDataTable();
        $no = $_POST['start'];
        $data = [];
        foreach ($result as $r) {
            $tgl = date('d-m-Y', strtotime($r->tanggal));
            $keterangan = '<span class="d-inline-block text-truncate" style="max-width: 150px;">' . $r->keterangan . '</span>';
            $action =   "<center>
                            <i data-url='" . base_url('penempatan/detail/' . $r->id_penempatan) . "' class='btn-detail fas fa-info-circle text-primary mr-1'></i>
                            |
                            <i data-url='" . base_url('penempatan/update/' . $r->id_penempatan) . "' class='btn-update info fas fa-edit text-primary mx-1'></i>
                            |
                            <i data-url='" . base_url() . "' data-id='" . $r->id_penempatan . "' class='btn-delete fas fa-trash-alt text-danger ml-1'></i>
                        </center>";

            $row = [];
            $row[] = ++$no;
            $row[] = $tgl;
            $row[] = $r->nama_unit;
            $row[] = $r->barang;
            $row[] = $keterangan;
            $row[] = $action;
            $data[] = $row;
        }

        $ouput = [
            'draw' => $_POST['draw'],
            'recordsTotal'      => $this->penempatan_model->count_all_data(),
            'recordsFiltered'   => $this->penempatan_model->count_filtered_data(),
            'data'              => $data
        ];

        echo json_encode($ouput);
    }

    public function tambah()
    {
        $data = [
            'title' => $this->title,
            'unit'  =>  $this->penempatan_model->getUnit()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penempatan/tambah', $data);
        $this->load->view('templates/footer');
        $this->load->view('penempatan/script');
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

                        $photo = $this->upload->data('file_name');
                        $data = [
                            'tanggal'                   => preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $this->input->post('tanggal')),
                            'id_unit'                   => $this->input->post('unit'),
                            'barang'                    => htmlspecialchars($this->input->post('barang', true)),
                            'keterangan'                => htmlspecialchars($this->input->post('keterangan', true)),
                            'foto'                      => $photo
                        ];
                        $this->penempatan_model->tambah($data);
                        $this->session->set_flashdata('main', 'Penempatan berhasil ditambahkan');
                        redirect('penempatan');
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
            'unit'      =>  $this->penempatan_model->getUnit(),
            'penempatan'   => $this->penempatan_model->getById($id)
        ];
        $data['value'] = [
            'tanggal'                   => !empty(set_value('tanggal')) ? set_value('tanggal') : $data['penempatan']['tanggal'],
            'id_unit'                   => !empty(set_value('unit')) ? set_value('unit') : $data['penempatan']['id_unit'],
            'barang'                    => !empty(set_value('barang')) ? set_value('barang') : $data['penempatan']['barang'],
            'keterangan'                => !empty(set_value('keterangan')) ? set_value('keterangan') : $data['penempatan']['keterangan'],
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penempatan/update', $data);
        $this->load->view('templates/footer');
        $this->load->view('penempatan/script');
    }

    public function updateAksi()
    {
        $id = $this->input->post('id_penempatan');

        $data = [
            'tanggal'                   => preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $this->input->post('tanggal')),
            'id_unit'                   => $this->input->post('unit'),
            'barang'                    => htmlspecialchars($this->input->post('barang', true)),
            'keterangan'                => htmlspecialchars($this->input->post('keterangan', true)),
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
                        $this->penempatan_model->update($id, $data);
                    } else {

                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('validasi_foto', $error);
                        $this->update($id);
                    }
                } else {

                    $this->penempatan_model->update($id, $data);
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
            'detail'    => $this->penempatan_model->getById($id),
        ];

        $data['tanggal'] = date('d-m-Y', strtotime($data['detail']['tanggal']));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penempatan/detail', $data);
        $this->load->view('templates/footer');
        $this->load->view('penempatan/script');
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->penempatan_model->delete($id);

        $alert = [
            'type' => "success", // type alert
            'text' => "Data penempatan berhasil dihapus" // text alert
        ];

        echo json_encode($alert);
    }

    public function cetak()
    {
        $data = [
            'penempatan' => $this->penempatan_model->getLaporan()
        ];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-penempatan.pdf";
        $this->pdf->load_view('penempatan/laporan', $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal Service', 'trim|required', [
            'required' => "Kolom {field} harus di isi"
        ]);
        $this->form_validation->set_rules('unit', 'Unit', 'trim|required', [
            'required' => "Pilih {field} terlebih dahulu"
        ]);
        $this->form_validation->set_rules('barang', 'Barang', 'trim|required', [
            'required' => 'Kolom {field} harus di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', [
            'required' => "Kolom {field} harus di isi"
        ]);
    }
}
