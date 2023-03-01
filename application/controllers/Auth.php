<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        } else {
            $this->_rules();

            if ($this->form_validation->run() == false) {
                $this->load->view('auth/login');
            } else {
                $this->_login();
                $this->session->set_flashdata('auth', 'Anda berhasil login!');
                redirect('dashboard');
            }
        }
    }

    public function logout()
    {
        if ($this->session->userdata('username')) {

            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama_lengkap');
            $this->session->set_flashdata('auth', 'Anda berhasil logout!');
            redirect();
        }
    }

    private function _rules()
    {

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => "Username harus di isi"
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]', [
            'min_length' => "Password terlalu pendek",
            'required' => "Password harus di isi"
        ]);
    }

    private function _login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['nama_user' => $username])->row_array();

        if ($user && password_verify($password, $user['password'])) {

            $data = [
                'username' => $user['nama_user'],
            ];

            $this->session->set_userdata($data);
        } else {
            $this->session->set_flashdata('validasi_login', 'Username atau password salah');
            redirect();
        }
    }
}
