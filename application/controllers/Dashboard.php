<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    // Create 04-November-2019

    public function index()
    {
        $this->load->view('dashboard/index');
    }
}
