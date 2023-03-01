<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    var $title = "Data Users";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        if (!$this->session->userdata('username')) {
            redirect();
        }
    }

    public function index()
    {
        $data = [
            'title' =>  $this->title
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('users/script');
    }

    public function getdata()
    {
        $result = $this->users_model->getDataTable();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $r) {
            $created_at = date('d-m-Y H:i:s', strtotime($r->created_at));
            $update_at = date('d-m-Y H:i:s', strtotime($r->update_at));
            $action =   "<center>
                            <i data-url=" . base_url('users/update/' . $r->id_user) . " class='btn-update fas fa-edit text-primary mr-1'></i></i>
                            |
                            <i data-url=" . base_url('users/gantipass/' . $r->id_user) . " class='btn-gantiPass fas fa-unlock-alt text-warning ml-1'></i>
                            |
                            <i data-url=" . base_url() . " data-id='$r->id_user'  data-nama='$r->nama_user' class='btn-hapus fas fa-trash-alt text-danger mx-1'></i>
                        </center>";
            $row = [];
            $row[] = ++$no;
            $row[] = $r->nama_user;
            $row[] = $r->nama_lengkap;
            $row[] = $created_at;
            $row[] = $update_at;
            $row[] = $action;
            $data[] = $row;
        }

        $ouput = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->users_model->count_all_data(),
            'recordsFiltered' => $this->users_model->count_filtered_data(),
            'data' => $data
        ];

        // $this->output->set_content_type('application/json')->set_output(json_encode($ouput));
        echo json_encode($ouput);
    }

    public function tambah()
    {
        $this->_rulesTambah();

        if ($this->form_validation->run() == false) {

            $data = [
                'title' =>  $this->title
            ];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('users/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'nama_user' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];

            $this->users_model->tambahUser($data);
            $this->session->set_flashdata('main', 'User berhasil ditambahkan');
            redirect('users');
        }
    }

    public function update($id)
    {
        $data = [
            'title' => $this->title,
            'user' => $this->db->get_where('user', ['id_user' => $id])->row_array()
        ];
        $data['value'] = [
            'username' => !empty(set_value('username')) ? set_value('username') : $data['user']['nama_user'],
            'nama_lengkap' => !empty(set_value('nama_lengkap')) ? set_value('nama_lengkap') : $data['user']['nama_lengkap']
        ];

        $this->_rulesUpdate($data['user']['nama_user']);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('users/update', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'nama_user' => htmlspecialchars($this->input->post('username', true))
            ];

            $this->users_model->updateUser($data, $id);
            $this->session->set_flashdata('main', 'User berhasil diubah');
            redirect('users');
        }
    }

    public function gantipass($id)
    {
        $data = [
            'title' => $this->title,
            'user' => $this->users_model->getUserById($id)
        ];

        $this->_rulesGantiPass();

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('users/ganti', $data);
            $this->load->view('templates/footer');
        } else {

            $userPassword = $data['user']['password'];

            if (password_verify($this->input->post('passwordLama'), $userPassword)) {

                $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $dataUser = [
                    'password' => $password
                ];

                $this->users_model->gantiPassUser($dataUser, $id);
                $this->session->set_flashdata('main', 'Password berhasil diganti');
                redirect('users');
            } else {

                $this->session->set_flashdata('validasi_gantiPass', 'Password salah');
                redirect('users/gantipass/' . $id);
            }
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alert = [
            'type' => "success", // type alert
            'text' => "User " . $nama . " berhasil dihapus" //text alert
        ];

        $this->db->delete('user', ['id_user' => $id]);
        echo json_encode($alert);
    }

    public function cetak()
    {
        $data = [
            'users' => $this->users_model->getLaporan()
        ];

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data-users.pdf";
        $this->pdf->load_view('users/laporan', $data);
    }

    private function _rulesTambah()
    {
        $message = [
            'required' => "{field} harus di isi",
            'is_unique' => "{field} sudah digunakan",
            'min_length' => "{field} terlalu pendek",
            'matches' => "{field} tidak cocok"
        ];

        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.nama_user]', $message);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required', $message);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]', $message);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required', $message);
    }

    private function _rulesUpdate($username)
    {
        $message = [
            'required' => "{field} harus di isi",
            'is_unique' => "{field} sudah digunakan"
        ];

        // rules ketika username tidak di ubah
        if ($this->input->post('username') === $username) {

            $this->form_validation->set_rules('username', 'Username', 'trim|required', $message);
        } else {

            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.nama_user]', $message);
        }

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required', $message);
    }

    private function _rulesGantiPass()
    {
        $message = [
            'min_length' => "{field} terlalu pendek",
            'matches' => "{field} tidak cocok",
            'required' => "{field} harus di isi"
        ];

        $this->form_validation->set_rules('password1', 'Password baru', 'trim|required|min_length[3]|matches[password2]', $message);
        $this->form_validation->set_rules('password2', 'Konfirmasi password', 'trim|required', $message);
        $this->form_validation->set_rules('passwordLama', 'Password Lama', 'trim|required', $message);
    }
}
