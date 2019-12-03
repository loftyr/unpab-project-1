<?php
defined('BASEPATH') or exit('No direct script access allowed');
// <!-- Create 24-Oktober-2019 -->
class Home extends CI_Controller
{

    public function login()
    {
        $dataheader['judul']    = 'Lembaga Penelitian dan Pengabdian Masyarakat';
        $dataheader['css']      = 'login-style.css'; //
        $datafooter['js']       = 'login-script.js'; //

        $this->load->view('templates/headerlogin', $dataheader);
        $this->load->view('login_v');
        $this->load->view('templates/footerlogin', $datafooter);
    }

    public function index()
    {
        $dataheader['judul']    = 'Lembaga Penelitian dan Pengabdian Masyarakat';
        $dataheader['css']      = 'home-style.css'; // 
        $datafooter['js']       = 'home-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();


        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/home_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getAllData($Tahun)
    {
        $data['data1']          = $this->base_m->getData1($Tahun);
        $data['data2']          = $this->base_m->getData2($Tahun);
        $data['data3']          = $this->base_m->getData3($Tahun); //Penelitian Ristekdikti
        $data['data4']          = $this->base_m->getData4($Tahun); //Penelitian Internal
        $data['data5']          = $this->base_m->getData5($Tahun); //Pengabdian Ristekdikti
        $data['data6']          = $this->base_m->getData6($Tahun); //Pengabdian Internal
        $data['data7']          = $this->base_m->getData7($Tahun); //Penelitian Asing
        $data['data8']          = $this->base_m->getData8($Tahun); //Fasiltias Pendukung
        $data['data9']          = '0';
        $data['data10']         = $this->base_m->getData9($Tahun); //Fasiltias Forum Ilmiah
        $data['data11']         = $this->base_m->getData10($Tahun); //Publikasi Jurnal
        $data['data12']         = $this->base_m->getData11($Tahun); //Publikasi Buku
        $data['data13']         = $this->base_m->getData12($Tahun); //Publikasi HKI
        $data['data14']         = $this->base_m->getData13($Tahun); //Publikasi Kerjasama

        echo json_encode($data);
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
                        'id_user'   => $dataUser['id_user'],
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
