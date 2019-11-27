<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    // Create 04-November-2019

    // public function index()
    // {
    //     $dataheader['judul']    = 'Kegiatan Institusi';
    //     $dataheader['css']      = 'kegiatan-style.css'; // 
    //     $datafooter['js']       = 'kegiatan-script.js'; // 

    //     $data['Tahun']          = $this->base_m->getTahun();

    //     $this->load->view('templates/header', $dataheader);
    //     $this->load->view('page/kegiatan_v', $data);
    //     $this->load->view('templates/footer', $datafooter);
    // }

    public function penelitian()
    {
        $dataheader['judul']    = 'Kegiatan Institusi';
        $dataheader['css']      = 'kegiatan-style.css'; // 
        $datafooter['js']       = 'kegiatan-pene-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();
        $data['Ref_Prodi']      = $this->penelitian_m->getProgramStudi();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/kegiatan_pene_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function pengabdian()
    {
        $dataheader['judul']    = 'Kegiatan Institusi';
        $dataheader['css']      = 'kegiatan-style.css'; // 
        $datafooter['js']       = 'kegiatan-peng-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();
        $data['Ref_Prodi']      = $this->penelitian_m->getProgramStudi();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/kegiatan_peng_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    // public function getData($tahun)
    // {
    //     $data   = $this->kegiatan_m->getData($tahun);
    //     echo json_encode($data);
    // }

    public function getDataPenelitian($tahun)
    {
        $data   = $this->kegiatan_m->getDataPenelitian($tahun);
        echo json_encode($data);
    }

    public function getEditPenelitian()
    {
        $Id     = $this->input->post('id');
        $data   = $this->kegiatan_m->getEditPenelitian($Id);
        echo json_encode($data);
    }

    public function getDataPengabdian($tahun)
    {
        $data   = $this->kegiatan_m->getDataPengabdian($tahun);
        echo json_encode($data);
    }

    public function getEditPengabdian()
    {
        $Id     = $this->input->post('id');
        $data   = $this->kegiatan_m->getEditPengabdian($Id);
        echo json_encode($data);
    }

    public function savePenelitian()
    {
        $this->form_validation->set_rules('Nama-Keg', 'Nama-Keg', 'required');
        $this->form_validation->set_rules('Tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('Prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('Tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('Tgl-Start', 'Tgl-Start', 'required');
        $this->form_validation->set_rules('Tgl-End', 'Tgl-End', 'required');

        $Kode = explode('.', $this->input->post('Prodi'));

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                'Tingkat_Forum' => htmlspecialchars($this->input->post('Tingkat')),
                'Nama_Keg'      => htmlspecialchars($this->input->post('Nama-Keg')),
                'Kd_Fakultas'   => htmlspecialchars($Kode[0]),
                'Kd_Prodi'      => htmlspecialchars($Kode[1]),
                'Mitra'         => htmlspecialchars($this->input->post('Mitra')),
                'Tempat'        => htmlspecialchars($this->input->post('Tempat')),
                'Tgl_Start'     => $this->input->post('Tgl-Start'),
                'Tgl_End'       => $this->input->post('Tgl-End'),
                'Narasumber'    => htmlspecialchars($this->input->post('Narasumber')),
                'Source'        => '1',
                'Tgl_Input'     => date('Y-m-d H:i:s'),
                'User_Input'    => $this->session->userdata['logged_in']['id_user']

            ];

            $hasil = $this->kegiatan_m->saveData($data);

            if ($hasil == true) {
                $result['Msg']       = 'Data Berhasil Disimpan . . .';
                $result['MsgUpload'] = $this->upload->display_errors();
                $result['Status']    = true;
            } else {
                $result['Msg']       = $this->db->error()['message'];
                $result['MsgUpload'] = $this->upload->display_errors();
                $result['Status']    = false;
            }
        }

        echo json_encode($result);
    }

    public function savePengabdian()
    {
        $this->form_validation->set_rules('Nama-Keg', 'Nama-Keg', 'required');
        $this->form_validation->set_rules('Tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('Prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('Tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('Tgl-Start', 'Tgl-Start', 'required');
        $this->form_validation->set_rules('Tgl-End', 'Tgl-End', 'required');

        $Kode = explode('.', $this->input->post('Prodi'));

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                'Tingkat_Forum' => htmlspecialchars($this->input->post('Tingkat')),
                'Nama_Keg'      => htmlspecialchars($this->input->post('Nama-Keg')),
                'Kd_Fakultas'   => htmlspecialchars($Kode[0]),
                'Kd_Prodi'      => htmlspecialchars($Kode[1]),
                'Mitra'         => htmlspecialchars($this->input->post('Mitra')),
                'Tempat'        => htmlspecialchars($this->input->post('Tempat')),
                'Tgl_Start'     => $this->input->post('Tgl-Start'),
                'Tgl_End'       => $this->input->post('Tgl-End'),
                'Narasumber'    => htmlspecialchars($this->input->post('Narasumber')),
                'Source'        => '2',
                'Tgl_Input'     => date('Y-m-d H:i:s'),
                'User_Input'    => $this->session->userdata['logged_in']['id_user']

            ];

            $hasil = $this->kegiatan_m->saveData($data);

            if ($hasil == true) {
                $result['Msg']       = 'Data Berhasil Disimpan . . .';
                $result['MsgUpload'] = $this->upload->display_errors();
                $result['Status']    = true;
            } else {
                $result['Msg']       = $this->db->error()['message'];
                $result['MsgUpload'] = $this->upload->display_errors();
                $result['Status']    = false;
            }
        }

        echo json_encode($result);
    }

    public function saveEditData()
    {

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('Nama-Keg', 'Nama-Keg', 'required');
        $this->form_validation->set_rules('Tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('Prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('Tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('Tgl-Start', 'Tgl-Start', 'required');
        $this->form_validation->set_rules('Tgl-End', 'Tgl-End', 'required');

        $Kode = explode('.', $this->input->post('Prodi'));

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                'Tingkat_Forum' => htmlspecialchars($this->input->post('Tingkat')),
                'Nama_Keg'      => htmlspecialchars($this->input->post('Nama-Keg')),
                'Kd_Fakultas'   => htmlspecialchars($Kode[0]),
                'Kd_Prodi'      => htmlspecialchars($Kode[1]),
                'Mitra'         => htmlspecialchars($this->input->post('Mitra')),
                'Tempat'        => htmlspecialchars($this->input->post('Tempat')),
                'Tgl_Start'     => $this->input->post('Tgl-Start'),
                'Tgl_End'       => $this->input->post('Tgl-End'),
                'Narasumber'    => htmlspecialchars($this->input->post('Narasumber')),
                'Tgl_Update'    => date('Y-m-d H:i:s'),
                'User_Update'   => $this->session->userdata['logged_in']['id_user']
            ];

            $where = [
                'Id' => $this->input->post('id')
            ];

            $hasil = $this->kegiatan_m->saveEditData($where, $data);

            if ($hasil == true) {
                $result['Msg']       = 'Data Berhasil Disimpan . . .';
                $result['MsgUpload'] = $this->upload->display_errors();
                $result['Status']    = true;
            } else {
                $result['Msg']       = $this->db->error()['message'];
                $result['MsgUpload'] = $this->upload->display_errors();
                $result['Status']    = false;
            }
        }

        echo json_encode($result);
    }

    public function deleteData($id)
    {
        $query  = $this->kegiatan_m->deleteId($id);

        if ($query == true) {
            $result['Msg']      = 'Data Berhasil Di Hapus . . .';
            $result['Status']   = true;
        } else {
            $result['Msg']      = $this->db->error()['message'];
            $result['Status']   = false;
        }

        echo json_encode($result);
    }
}
