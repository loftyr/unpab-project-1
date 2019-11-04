<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    // Create 04-November-2019

    public function index()
    {
        $dataheader['judul']    = 'Sumber Daya Staf Pendukung LPPM';
        $dataheader['css']      = 'kegiatan-style.css'; // 
        $datafooter['js']       = 'kegiatan-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/kegiatan_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getData($tahun)
    {
        $data   = $this->kegiatan_m->getData($tahun);
        echo json_encode($data);
    }

    public function save()
    {
        $this->form_validation->set_rules('Nama-Keg', 'Nama-Keg', 'required');
        $this->form_validation->set_rules('Tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('Unit', 'Unit', 'required');
        $this->form_validation->set_rules('Tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('Tgl-Start', 'Tgl-Start', 'required');
        $this->form_validation->set_rules('Tgl-End', 'Tgl-End', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Please Fill All Field !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'         => htmlspecialchars($this->input->post('Tahun')),
                'Tingkat_Forum' => htmlspecialchars($this->input->post('Tingkat')),
                'Nama_Keg'      => htmlspecialchars($this->input->post('Nama-Keg')),
                'Nama_Unit'     => htmlspecialchars($this->input->post('Unit')),
                'Mitra'         => htmlspecialchars($this->input->post('Mitra')),
                'Tempat'        => htmlspecialchars($this->input->post('Tempat')),
                'Tgl_Start'     => $this->input->post('Tgl-Start'),
                'Tgl_End'       => $this->input->post('Tgl-End'),
                'Narasumber'    => htmlspecialchars($this->input->post('Narasumber'))
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
