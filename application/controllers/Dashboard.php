<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    // Create 04-November-2019

    public function index()
    {
        $dataheader['judul']    = 'Admin';
        $dataheader['css']      = ''; // 
        $datafooter['js']       = ''; // 


        $this->load->view('templates/headerDashboard', $dataheader);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footerDashboard', $datafooter);
    }

    public function user()
    {
        $dataheader['judul']    = 'Data User LPPM';
        $dataheader['css']      = ''; // 
        $datafooter['js']       = 'dashboard-user.js'; // 


        $this->load->view('templates/headerDashboard', $dataheader);
        $this->load->view('dashboard/user_v');
        $this->load->view('templates/footerDashboard', $datafooter);
    }

    public function getDataUser()
    {
        $data   = $this->dashboard_m->getUser();
        echo json_encode($data);
    }

    public function getEditUser()
    {
        $Id     = $this->input->post('id');
        $data   = $this->dashboard_m->getEditUser($Id);
        echo json_encode($data);
    }

    public function saveData()
    {
        $this->form_validation->set_rules('Username', 'Username', 'required|trim');
        $this->form_validation->set_rules('Email', 'Email', 'required|trim|valid_email|is_unique[ap_user.email]');
        $this->form_validation->set_rules('Password', 'Password', 'required|trim|min_length[5]', [
            'min_length'    => 'Password too Short'
        ]);
        $this->form_validation->set_rules('Level', 'Level', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');


        if ($this->form_validation->run() == false) {
            $pesan  = explode('<p>', validation_errors());

            $result['Msg']          = $pesan[1];
            $result['Status']       = false;
        } else {
            $data = [
                'Level'         => htmlspecialchars($this->input->post('Level')),
                'username'      => htmlspecialchars($this->input->post('Username')),
                'password'      => password_hash($this->input->post('Nama_Pegawai'), PASSWORD_DEFAULT),
                'email'         => htmlspecialchars($this->input->post('Email')),
                'Status'        => htmlspecialchars($this->input->post('Status')),
                'Date_Create'   => date('Y-m-d H:i:s'),
                'Tgl_Input'     => date('Y-m-d H:i:s'),
                'User_Input'    => $this->session->userdata['logged_in']['id_user']
            ];

            $hasil = $this->dashboard_m->saveData($data);

            if ($hasil == true) {
                $result['Msg']       = 'Data Berhasil Disimpan . . .';
                $result['Status']    = true;
            } else {
                $result['Msg']       = $this->db->error()['message'];
                $result['Status']    = false;
            }
        }

        echo json_encode($result);
    }
}
