<!-- Create 24-Oktober-2019 -->

<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $data['data1']          = $this->base_m->getData1();
        $data['data2']          = $this->base_m->getData2();
        $data['data3']          = $this->base_m->getData3(); //Penelitian Ristekdikti
        $data['data4']          = $this->base_m->getData4(); //Penelitian Internal
        $data['data5']          = $this->base_m->getData5(); //Pengabdian Ristekdikti
        $data['data6']          = $this->base_m->getData6(); //Pengabdian Internal
        $data['data7']          = $this->base_m->getData7(); //Penelitian Asing
        $data['data8']          = $this->base_m->getData8(); //Fasiltias Pendukung
        $data['data9']          = $this->base_m->getData9(); //Fasiltias Forum Ilmiah
        $data['data10']         = $this->base_m->getData10(); //Publikasi Jurnal
        $data['data11']         = $this->base_m->getData11(); //Publikasi Buku
        $data['data12']         = $this->base_m->getData12(); //Publikasi HKI
        $data['data13']         = $this->base_m->getData13(); //Publikasi Kerjasama

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/home_v', $data);
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
