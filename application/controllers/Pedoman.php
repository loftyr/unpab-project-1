<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedoman extends CI_Controller
{

    // Create 04-November-2019

    // Developer
    // public function index()
    // {
    //     $dataheader['judul']    = 'Sumber Daya Staf Pendukung LPPM';
    //     $dataheader['css']      = 'pedoman-style.css'; // 
    //     $datafooter['js']       = 'pedoman-script.js'; // 

    //     $data['Tahun']          = $this->base_m->getTahun();

    //     $this->load->view('templates/header', $dataheader);
    //     $this->load->view('page/pedoman_v', $data);
    //     $this->load->view('templates/footer', $datafooter);
    // }

    public function Penelitian()
    {
        $dataheader['judul']    = 'Pedoman Penelitian';
        $dataheader['css']      = 'pedoman-style.css'; // 
        $datafooter['js']       = 'pedoman-pene-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/pedoman_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function Pengabdian()
    {
        $dataheader['judul']    = 'Pedoman Penelitian';
        $dataheader['css']      = 'pedoman-style.css'; // 
        $datafooter['js']       = 'pedoman-peng-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/pedoman_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getDataPenelitian($tahun)
    {
        $data   = $this->pedoman_m->getDataPenelitian($tahun);
        echo json_encode($data);
    }

    public function getEditPenelitian()
    {
        $id     = $this->input->post('id');

        $data   = $this->pedoman_m->getEditPenelitian($id);
        echo json_encode($data);
    }

    public function getDataPengabdian($tahun)
    {
        $data   = $this->pedoman_m->getDataPengabdian($tahun);
        echo json_encode($data);
    }

    public function getEditPengabdian()
    {
        $id     = $this->input->post('id');

        $data   = $this->pedoman_m->getEditPengabdian($id);
        echo json_encode($data);
    }

    public function saveDataPenelitian()
    {
        $this->form_validation->set_rules('Nama-Pedoman', 'Nama-Pedoman', 'required');
        $this->form_validation->set_rules('No', 'No', 'required');


        $config['upload_path']      = '././file/upload/documents/document pedoman/';
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
                        'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                        'Nama_Pedoman'  => htmlspecialchars($this->input->post('Nama-Pedoman')),
                        'No_Surat'      => htmlspecialchars($this->input->post('No')),
                        'Dokumen'       => $filename,
                        'Source'        => '1',
                        'Tgl_Input'     => date('Y-m-d H:i:s'),
                        'User_Input'    => $this->session->userdata['logged_in']['id_user']
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
                    'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                    'Nama_Pedoman'  => htmlspecialchars($this->input->post('Nama-Pedoman')),
                    'No_Surat'      => htmlspecialchars($this->input->post('No')),
                    'Dokumen'       => null,
                    'Source'        => '1',
                    'Tgl_Input'     => date('Y-m-d H:i:s'),
                    'User_Input'    => $this->session->userdata['logged_in']['id_user']
                ];

                // var_dump("Tidak Ada Data yang di upload");
            }

            $hasil = $this->pedoman_m->saveData($data);

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

    public function saveDataPengabdian()
    {
        $this->form_validation->set_rules('Nama-Pedoman', 'Nama-Pedoman', 'required');
        $this->form_validation->set_rules('No', 'No', 'required');


        $config['upload_path']      = '././file/upload/documents/document pedoman/';
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
                        'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                        'Nama_Pedoman'  => htmlspecialchars($this->input->post('Nama-Pedoman')),
                        'No_Surat'      => htmlspecialchars($this->input->post('No')),
                        'Dokumen'       => $filename,
                        'Source'        => '2',
                        'Tgl_Input'     => date('Y-m-d H:i:s'),
                        'User_Input'    => $this->session->userdata['logged_in']['id_user']
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
                    'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                    'Nama_Pedoman'  => htmlspecialchars($this->input->post('Nama-Pedoman')),
                    'No_Surat'      => htmlspecialchars($this->input->post('No')),
                    'Dokumen'       => null,
                    'Source'        => '2',
                    'Tgl_Input'     => date('Y-m-d H:i:s'),
                    'User_Input'    => $this->session->userdata['logged_in']['id_user']
                ];

                // var_dump("Tidak Ada Data yang di upload");
            }

            $hasil = $this->pedoman_m->saveData($data);

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

        $this->db->where('Id', $id);
        $link    = $this->db->get('ta_pedoman')->row('Dokumen');

        $this->form_validation->set_rules('Nama-Pedoman', 'Nama-Pedoman', 'required');
        $this->form_validation->set_rules('No', 'No', 'required');

        $config['upload_path']      = '././file/upload/documents/document pedoman/';
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
                    @unlink('././file/upload/documents/document pedoman/' . $link);
                    $file       = array('upload_data' => $this->upload->data());
                    $filename   = $file['upload_data']['file_name'];

                    $data = [
                        'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                        'Nama_Pedoman'  => htmlspecialchars($this->input->post('Nama-Pedoman')),
                        'No_Surat'      => htmlspecialchars($this->input->post('No')),
                        'Dokumen'       => $filename,
                        'Tgl_Update'     => date('Y-m-d H:i:s'),
                        'User_Update'    => $this->session->userdata['logged_in']['id_user']
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
                    'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                    'Nama_Pedoman'  => htmlspecialchars($this->input->post('Nama-Pedoman')),
                    'No_Surat'      => htmlspecialchars($this->input->post('No')),
                    'Tgl_Update'     => date('Y-m-d H:i:s'),
                    'User_Update'    => $this->session->userdata['logged_in']['id_user']
                ];
            }

            $where = [
                'Id'  => $id
            ];

            $hasil  = $this->pedoman_m->saveEdit($where, $data);

            if ($hasil == true) {
                $result['Msg']       = 'Data Berhasil Diubah . . .';
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

    public function deleteData($id)
    {

        $this->db->where('Id', $id);
        $link  = $this->db->get('ta_pedoman')->row('Dokumen');

        $query  = $this->pedoman_m->deleteId($id);

        if ($query == true) {
            @unlink('././file/upload/documents/document pedoman/' . $link);
            $result['Msg']      = 'Data Berhasil Di Hapus . . .';
            $result['Status']   = true;
        } else {
            $result['Msg']      = $this->db->error()['message'];
            $result['Status']   = false;
        }

        echo json_encode($result);
    }
}
