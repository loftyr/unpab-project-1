<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hki extends CI_Controller
{

    // Create 06-November-2019

    //Develop
    // public function index()
    // {
    //     $dataheader['judul']    = 'Hak Kekayaan Intelektual (HKI)';
    //     $dataheader['css']      = 'hki-style.css'; // 
    //     $datafooter['js']       = 'hki-script.js'; // 

    //     $data['Tahun']          = $this->base_m->getTahun();

    //     $this->load->view('templates/header', $dataheader);
    //     $this->load->view('page/hki_v', $data);
    //     $this->load->view('templates/footer', $datafooter);
    // }

    public function penelitian()
    {
        $dataheader['judul']    = 'Hak Kekayaan Intelektual (HKI)';
        $dataheader['css']      = 'hki-pene-style.css'; // 
        $datafooter['js']       = 'hki-pene-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/hki_pene_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function pengabdian()
    {
        $dataheader['judul']    = 'Hak Kekayaan Intelektual (HKI)';
        $dataheader['css']      = 'hki-peng-style.css'; // 
        $datafooter['js']       = 'hki-peng-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/hki_peng_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    //Develop
    // public function getData($tahun)
    // {
    //     $data   = $this->hki_m->getData($tahun);
    //     echo json_encode($data);
    // }

    public function getDataPenelitian($tahun)
    {
        $data   = $this->hki_m->getDataPenelitian($tahun);
        echo json_encode($data);
    }

    public function getEditPenelitian()
    {
        $Id     = $this->input->post('id');
        $data   = $this->hki_m->getEditPenelitian($Id);
        echo json_encode($data);
    }

    public function getDataPengabdian($tahun)
    {
        $data   = $this->hki_m->getDataPengabdian($tahun);
        echo json_encode($data);
    }

    public function getEditPengabdian()
    {
        $Id     = $this->input->post('id');
        $data   = $this->hki_m->getEditPengabdian($Id);
        echo json_encode($data);
    }

    public function getPencipta()
    {
        $Id_Hki = $this->input->post('Id_Hki');

        $data   = $this->hki_m->getPencipta($Id_Hki);
        echo json_encode($data);
    }

    public function getEditPencipta()
    {
        $Id = $this->input->post('id');

        $data   = $this->hki_m->getEditPencipta($Id);
        echo json_encode($data);
    }

    public function savePenelitian()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');
        $this->form_validation->set_rules('No_Pendaftaran', 'No_Pendaftaran', 'required');
        $this->form_validation->set_rules('No_Sertifikat', 'No_Sertifikat', 'required');

        $config['upload_path']      = '././file/upload/documents/document hki/';
        $config['allowed_types']    = 'pdf';
        $config['max_size']         = 1000;
        $config['encrypt_name']     = false;

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            if (!empty($_FILES['File']['name'])) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload("File")) {
                    $datafile  = array('upload_data' => $this->upload->data());
                    $filename  = $datafile['upload_data']['file_name'];

                    $data = [
                        'Tahun'     => htmlspecialchars($this->input->post('Tahun-1')),
                        'Judul'     => htmlspecialchars($this->input->post('Judul')),
                        'Jenis'     => htmlspecialchars($this->input->post('Jenis')),
                        'No_Pendaftaran'    => htmlspecialchars($this->input->post('No_Pendaftaran')),
                        'No_Sertifikat'     => htmlspecialchars($this->input->post('No_Sertifikat')),
                        'Status'    => htmlspecialchars($this->input->post('Status')),
                        'Dokumen'   => $filename,
                        'Source'    => '1', // Penelitian
                        'Tgl_Input'    => date('Y-m-d H:i:s'),
                        'User_Input'   => $this->session->userdata['logged_in']['id_user']
                    ];
                } else {
                    $result['Msg']       = $this->upload->display_errors();
                    $result['MsgUpload'] = $this->upload->display_errors();
                    $result['Status']    = false;
                    echo json_encode($result);
                    die;
                }
                // var_dump("Proses Upload Sukses");
            } else {
                $data = [
                    'Tahun'     => htmlspecialchars($this->input->post('Tahun-1')),
                    'Judul'     => htmlspecialchars($this->input->post('Judul')),
                    'Jenis'     => htmlspecialchars($this->input->post('Jenis')),
                    'No_Pendaftaran'    => htmlspecialchars($this->input->post('No_Pendaftaran')),
                    'No_Sertifikat'     => htmlspecialchars($this->input->post('No_Sertifikat')),
                    'Status'    => htmlspecialchars($this->input->post('Status')),
                    'Dokumen'   => NULL,
                    'Source'    => '1', // Penelitian
                    'Tgl_Input'    => date('Y-m-d H:i:s'),
                    'User_Input'   => $this->session->userdata['logged_in']['id_user']
                ];
            }

            $hasil = $this->hki_m->saveData($data);

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
        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');
        $this->form_validation->set_rules('No_Pendaftaran', 'No_Pendaftaran', 'required');
        $this->form_validation->set_rules('No_Sertifikat', 'No_Sertifikat', 'required');

        $config['upload_path']      = '././file/upload/documents/document hki/';
        $config['allowed_types']    = 'pdf';
        $config['max_size']         = 1000;
        $config['encrypt_name']     = false;

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            if (!empty($_FILES['File']['name'])) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload("File")) {
                    $datafile  = array('upload_data' => $this->upload->data());
                    $filename  = $datafile['upload_data']['file_name'];

                    $data = [
                        'Tahun'     => htmlspecialchars($this->input->post('Tahun-1')),
                        'Judul'     => htmlspecialchars($this->input->post('Judul')),
                        'Jenis'     => htmlspecialchars($this->input->post('Jenis')),
                        'No_Pendaftaran'    => htmlspecialchars($this->input->post('No_Pendaftaran')),
                        'No_Sertifikat'     => htmlspecialchars($this->input->post('No_Sertifikat')),
                        'Status'    => htmlspecialchars($this->input->post('Status')),
                        'Dokumen'   => $filename,
                        'Source'    => '2', // Pengabdian
                        'Tgl_Input'    => date('Y-m-d H:i:s'),
                        'User_Input'   => $this->session->userdata['logged_in']['id_user']
                    ];
                } else {
                    $result['Msg']       = $this->upload->display_errors();
                    $result['MsgUpload'] = $this->upload->display_errors();
                    $result['Status']    = false;
                    echo json_encode($result);
                    die;
                }
                // var_dump("Proses Upload Sukses");
            } else {
                $data = [
                    'Tahun'     => htmlspecialchars($this->input->post('Tahun-1')),
                    'Judul'     => htmlspecialchars($this->input->post('Judul')),
                    'Jenis'     => htmlspecialchars($this->input->post('Jenis')),
                    'No_Pendaftaran'    => htmlspecialchars($this->input->post('No_Pendaftaran')),
                    'No_Sertifikat'     => htmlspecialchars($this->input->post('No_Sertifikat')),
                    'Status'    => htmlspecialchars($this->input->post('Status')),
                    'Dokumen'   => NULL,
                    'Source'    => '2', // Pengabdian
                    'Tgl_Input'    => date('Y-m-d H:i:s'),
                    'User_Input'   => $this->session->userdata['logged_in']['id_user']
                ];
            }

            $hasil = $this->hki_m->saveData($data);

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
        $id = $this->input->post('id');

        $this->db->where('Id_Hki', $id);
        $link    = $this->db->get('ta_hki')->row('Dokumen');

        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');
        $this->form_validation->set_rules('No_Pendaftaran', 'No_Pendaftaran', 'required');
        $this->form_validation->set_rules('No_Sertifikat', 'No_Sertifikat', 'required');

        $config['upload_path']      = '././file/upload/documents/document hki/';
        $config['allowed_types']    = 'pdf';
        $config['max_size']         = 1000;
        $config['encrypt_name']     = false;

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            if (!empty($_FILES['File']['name'])) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload("File")) {
                    @unlink('././file/upload/documents/document hki/' . $link);
                    $file       = array('upload_data' => $this->upload->data());
                    $filename   = $file['upload_data']['file_name'];

                    $data = [
                        'Tahun'     => htmlspecialchars($this->input->post('Tahun-1')),
                        'Judul'     => htmlspecialchars($this->input->post('Judul')),
                        'Jenis'     => htmlspecialchars($this->input->post('Jenis')),
                        'No_Pendaftaran'    => htmlspecialchars($this->input->post('No_Pendaftaran')),
                        'No_Sertifikat'     => htmlspecialchars($this->input->post('No_Sertifikat')),
                        'Status'    => htmlspecialchars($this->input->post('Status')),
                        'Dokumen'   => $filename,
                        'Tgl_Update'    => date('Y-m-d H:i:s'),
                        'User_Update'   => $this->session->userdata['logged_in']['id_user']
                    ];
                } else {
                    $result['Msg']       = $this->upload->display_errors();
                    $result['MsgUpload'] = $this->upload->display_errors();
                    $result['Status']    = false;
                    echo json_encode($result);
                    die;
                }
            } else {
                $data = [
                    'Tahun'     => htmlspecialchars($this->input->post('Tahun-1')),
                    'Judul'     => htmlspecialchars($this->input->post('Judul')),
                    'Jenis'     => htmlspecialchars($this->input->post('Jenis')),
                    'No_Pendaftaran'    => htmlspecialchars($this->input->post('No_Pendaftaran')),
                    'No_Sertifikat'     => htmlspecialchars($this->input->post('No_Sertifikat')),
                    'Status'    => htmlspecialchars($this->input->post('Status')),
                    'Tgl_Update'    => date('Y-m-d H:i:s'),
                    'User_Update'   => $this->session->userdata['logged_in']['id_user']
                ];
            }

            $where = [
                'Id_Hki'  => $id
            ];

            $hasil  = $this->hki_m->saveEditData($where, $data);

            if ($hasil == true) {
                $result['Msg']       = 'Perubahan Data Berhasil Disimpan . . .';
                $result['MsgUpload'] = '';
                $result['Status']    = true;
            } else {
                $result['Msg']       = $this->db->error()['message'];
                $result['MsgUpload'] = '';
                $result['Status']    = true;
            }
        }

        echo json_encode($result);
    }

    public function save2()
    {
        $this->form_validation->set_rules('Id_Hki', 'Id_Hki', 'required');
        $this->form_validation->set_rules('Nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Id_Hki'    => htmlspecialchars($this->input->post('Id_Hki')),
                'Tahun'     => htmlspecialchars($this->input->post('Tahun-2')),
                'Nidn'      => htmlspecialchars($this->input->post('Nidn')),
                'Nama'      => htmlspecialchars($this->input->post('Nama')),
                'Urut'      => htmlspecialchars($this->input->post('Urut')),
                'Tgl_Input'    => date('Y-m-d H:i:s'),
                'User_Input'   => $this->session->userdata['logged_in']['id_user']
            ];

            $hasil = $this->hki_m->saveData2($data);

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

    public function saveEdit2()
    {

        $this->form_validation->set_rules('id-2', 'id-2', 'required');
        $this->form_validation->set_rules('Id_Hki', 'Id_Hki', 'required');
        $this->form_validation->set_rules('Nama', 'Nama', 'required');
        $this->form_validation->set_rules('id-2', 'id-2', 'required');

        $Id     = $this->input->post('id-2');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'     => htmlspecialchars($this->input->post('Tahun-2')),
                'Nidn'      => htmlspecialchars($this->input->post('Nidn')),
                'Nama'      => htmlspecialchars($this->input->post('Nama')),
                'Urut'      => htmlspecialchars($this->input->post('Urut')),
                'Tgl_Update'    => date('Y-m-d H:i:s'),
                'User_Update'   => $this->session->userdata['logged_in']['id_user']
            ];

            $where = [
                'Id' => $Id
            ];

            $hasil = $this->hki_m->saveEdit2($where, $data);

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

        $this->db->where('Id_Hki', $id);
        $link  = $this->db->get('ta_hki')->row('Dokumen');

        $query  = $this->hki_m->deleteId($id);

        if ($query == true) {
            @unlink('././file/upload/documents/document hki/' . $link);
            $result['Msg']      = 'Data Berhasil Di Hapus . . .';
            $result['Status']   = true;
        } else {
            $result['Msg']      = $this->db->error()['message'];
            $result['Status']   = false;
        }

        echo json_encode($result);
    }

    public function deleteData2($id)
    {
        $query  = $this->hki_m->deleteId2($id);

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
