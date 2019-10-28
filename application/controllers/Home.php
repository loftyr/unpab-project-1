<!-- Create 24-Oktober-2019 -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function login(){
        $dataheader['judul']    = 'Lembaga Penelitian dan Pengabdian Masyarakat';
        $dataheader['css']      = 'login-style.css'; //
        $datafooter['js']       = ''; //home-script.js

        $this->load->view('templates/header', $dataheader);
        $this->load->view('login_v');
        $this->load->view('templates/footer', $datafooter);
    }

    public function index(){
        $dataheader['judul']    = 'Lembaga Penelitian dan Pengabdian Masyarakat';
        $dataheader['css']      = 'home-style.css'; // 
        $datafooter['js']       = 'home-script.js'; // 

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/home_v');
        $this->load->view('templates/footer', $datafooter);
    }
}
