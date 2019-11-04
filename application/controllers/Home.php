<!-- Create 24-Oktober-2019 -->

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function login()
    {
        $dataheader['judul']    = 'Lembaga Penelitian dan Pengabdian Masyarakat';
        $dataheader['css']      = 'login-style.css'; //
        $datafooter['js']       = ''; //home-script.js

        $this->load->view('templates/headerlogin', $dataheader);
        $this->load->view('login_v');
        $this->load->view('templates/footerlogin', $datafooter);
    }

    public function index()
    {
        $dataheader['judul']    = 'Lembaga Penelitian dan Pengabdian Masyarakat';
        $dataheader['css']      = 'home-style.css'; // 
        $datafooter['js']       = 'home-script.js'; // 

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/home_v');
        $this->load->view('templates/footer', $datafooter);
    }

    public function authLogin()
    {
        $user = htmlspecialchars($this->input->post('username'));
        $pass = $this->input->post('password');

        $dataUser = $this->db->get_where('ap_user', ['username' => $user])->row_array();

        // Check Data User
        if ($dataUser) {

            // Check Status User
            if ($dataUser['Status'] == 1) {

                // Check Password User
                if (password_verify($pass, $dataUser['password'])) {
                    $data = [
                        'username'  => $dataUser['username'],
                        'Level'     => $dataUser['Level']
                    ];

                    $this->session->set_userdata('logged_in', $data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Password Salah !!!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('home/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>User Tidak Aktif</strong> Mohon Hubungin Admin
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('home/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>User Tidak Ditemukan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('home/login');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        redirect('home/login', 'refresh');
    }
}
