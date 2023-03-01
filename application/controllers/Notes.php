<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notes extends CI_Controller
{
    var $title = "Data Notes";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('notes_model');
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
        $this->load->view('notes/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('notes/script');
    }

    public function getdata()
    {
        $result = $this->notes_model->getDataTable();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $r) {
            $catatan = '<span class="d-inline-block text-truncate" style="max-width: 150px;">' . $r->catatan . '</span>';
            $created_at = date('d-m-Y H:i:s', strtotime($r->created_at));
            $update_at = date('d-m-Y H:i:s', strtotime($r->update_at));
            $action =   "<center>
                            <i data-url='" . base_url('notes/detail/' . $r->id_notes) . "' class='btn-detail fas fa-info-circle text-primary mr-1'></i>
                            |
                            <i data-url='" . base_url('notes/update/' . $r->id_notes) . "' class='btn-update fas fa-edit text-primary mr-1'></i>
                            |
                            <i data-url='" . base_url() . "' data-id='" . $r->id_notes . "' data-judul='" . $r->judul . "' class='btn-delete fas fa-trash-alt text-danger ml-1'></i>
                        </center>";
            $row = [];
            $row[] = ++$no;
            $row[] = $r->judul;
            $row[] = $catatan;
            $row[] = $created_at;
            $row[] = $update_at;
            $row[] = $action;
            $data[] = $row;
        }

        $ouput = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->notes_model->count_all_data(),
            'recordsFiltered' => $this->notes_model->count_filtered_data(),
            'data' => $data
        ];

        echo json_encode($ouput);
    }

    public function tambah()
    {
        $data = [
            'title' => $this->title,
            'value' => [
                'judul' => !empty($this->session->flashdata('value_judul')) ? $this->session->flashdata('value_judul') : set_value('judul'),
                'catatan' => !empty($this->session->flashdata('value_catatan')) ? $this->session->flashdata('value_catatan') : set_value('catatan')
            ]
        ];

        $this->_rules();

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('notes/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->_insert();
        }
    }

    public function update($id)
    {
        $data = [
            'title' => $this->title,
            'note'  => $this->notes_model->getById($id)
        ];
        $data['value'] = [
            'judul' => !empty(set_value('judul')) ? set_value('judul') : $data['note']['judul'],
            'catatan' => !empty(set_value('catatan')) ? set_value('catatan') : $data['note']['catatan'],
            'foto' => empty($data['note']['foto_pendukung']) ? "" : base_url('assets/img/') . $data['note']['foto_pendukung'],
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('notes/update', $data);
        $this->load->view('templates/footer');
    }

    public function updateAksi()
    {
        $id = $this->input->post('id_note');
        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'catatan' => htmlspecialchars($this->input->post('catatan', true))
        ];

        $this->_rules();

        if ($this->form_validation->run() == true) {

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
                    $this->db->set('foto_pendukung', $photo);
                    $this->notes_model->update($id, $data);
                } else {

                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('validasi_foto', $error);
                    $this->update($id);
                }
            } else {

                $this->notes_model->update($id, $data);
            }
        } else {

            $this->update($id);
        }
    }

    public function detail($id)
    {
        $data = [
            'title' => $this->title,
            'detail' => $this->notes_model->getById($id)
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('notes/detail', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $alert = [
            'type' => "success", // type alert
            'text' => "Catatan " . $judul . " berhasil dihapus" //text alert
        ];

        $this->db->delete('notes', ['id_notes' => $id]);
        echo json_encode($alert);
    }

    public function cetak()
    {
        $data = [
            'notes' => $this->notes_model->getLaporan()
        ];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data-catatan.pdf";
        $this->pdf->load_view('notes/laporan', $data);
    }

    private function _insert()
    {
        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'catatan' => htmlspecialchars($this->input->post('catatan', true))
        ];

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
                $this->db->set('foto_pendukung', $photo);
            } else {

                $error = $this->upload->display_errors();

                $this->session->set_flashdata('validasi_foto', $error);
                $this->session->set_flashdata('value_judul', set_value('judul'));
                $this->session->set_flashdata('value_catatan', set_value('catatan'));
                redirect('notes/tambah');
            }
        }

        $this->notes_model->tambahNotes($data);
        $this->session->set_flashdata('main', 'Catatan berhasil ditambahkan');
        redirect('notes');
    }

    private function _rules()
    {
        $message = [
            'required' => "{field} harus di isi"
        ];

        $this->form_validation->set_rules('judul', 'Judul catatan', 'trim|required', $message);
        $this->form_validation->set_rules('catatan', 'Catatan', 'trim|required', $message);
    }
}
