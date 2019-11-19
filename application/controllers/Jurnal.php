<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{

    // Create 05-November-2019
    // Develop
    public function index()
    {
        $dataheader['judul']    = 'Publikasi Jurnal';
        $dataheader['css']      = 'jurnal-style.css'; // 
        $datafooter['js']       = 'jurnal-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/jurnal_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function penelitian()
    {
        $dataheader['judul']    = 'Publikasi Jurnal Penelitian';
        $dataheader['css']      = 'pene-jurnal-style.css'; // 
        $datafooter['js']       = 'pene-jurnal-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/jurnal_pene_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function pengabdian()
    {
        $dataheader['judul']    = 'Publikasi Jurnal Pengabdian';
        $dataheader['css']      = 'peng-jurnal-style.css'; // 
        $datafooter['js']       = 'peng-jurnal-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/jurnal_peng_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getData($tahun)
    {
        $data   = $this->jurnal_m->getData($tahun);
        echo json_encode($data);
    }

    public function getDataPenelitian($tahun)
    {
        $data   = $this->jurnal_m->getDataPenelitian($tahun);
        echo json_encode($data);
    }

    public function getEditPenelitian()
    {
        $Kd_Jurnal = $this->input->post('id');
        $data   = $this->jurnal_m->getEditPenelitian($Kd_Jurnal);
        echo json_encode($data);
    }

    public function getEditPengabdian()
    {
        $Kd_Jurnal = $this->input->post('id');
        $data   = $this->jurnal_m->getEditPengabdian($Kd_Jurnal);
        echo json_encode($data);
    }

    public function getDataPengabdian($tahun)
    {
        $data   = $this->jurnal_m->getDataPengabdian($tahun);
        echo json_encode($data);
    }

    public function getPenulis()
    {
        $Kd_Jurnal = $this->input->post('Kd_Jurnal');

        $data   = $this->jurnal_m->getPenulis($Kd_Jurnal);
        echo json_encode($data);
    }

    public function savePenelitian()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Jurnal', 'Jurnal', 'required');
        $this->form_validation->set_rules('Url', 'Url', 'required');
        $this->form_validation->set_rules('Publikasi', 'Publikasi', 'required');

        $config['upload_path']      = '././file/upload/documents/document jurnal/';
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
                        'Judul'         => htmlspecialchars($this->input->post('Judul')),
                        'Jurnal'        => htmlspecialchars($this->input->post('Jurnal')),
                        'ISSN'          => htmlspecialchars($this->input->post('ISSN')),
                        'Volume'        => htmlspecialchars($this->input->post('Volume')),
                        'Nomor'         => htmlspecialchars($this->input->post('No')),
                        'Halaman'       => htmlspecialchars($this->input->post('Halaman')),
                        'Url'           => htmlspecialchars($this->input->post('Url')),
                        'Publikasi'     => htmlspecialchars($this->input->post('Publikasi')),
                        'Dokumen'       => $filename,
                        'Source'        => '1', //Penelitian
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
                    'Judul'         => htmlspecialchars($this->input->post('Judul')),
                    'Jurnal'        => htmlspecialchars($this->input->post('Jurnal')),
                    'ISSN'          => htmlspecialchars($this->input->post('ISSN')),
                    'Volume'        => htmlspecialchars($this->input->post('Volume')),
                    'Nomor'         => htmlspecialchars($this->input->post('No')),
                    'Halaman'       => htmlspecialchars($this->input->post('Halaman')),
                    'Url'           => htmlspecialchars($this->input->post('Url')),
                    'Publikasi'     => htmlspecialchars($this->input->post('Publikasi')),
                    'Dokumen'       => null,
                    'Source'        => '1', //Penelitian
                    'Tgl_Input'     => date('Y-m-d H:i:s'),
                    'User_Input'    => $this->session->userdata['logged_in']['id_user']
                ];

                // var_dump("Tidak Ada Data yang di upload");
            }

            $hasil = $this->jurnal_m->saveData($data);

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
        $this->form_validation->set_rules('Jurnal', 'Jurnal', 'required');
        $this->form_validation->set_rules('Publikasi', 'Publikasi', 'required');
        $this->form_validation->set_rules('Url', 'Url', 'required');

        $config['upload_path']      = '././file/upload/documents/document jurnal/';
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
                        'Judul'         => htmlspecialchars($this->input->post('Judul')),
                        'Jurnal'        => htmlspecialchars($this->input->post('Jurnal')),
                        'ISSN'          => htmlspecialchars($this->input->post('ISSN')),
                        'Volume'        => htmlspecialchars($this->input->post('Volume')),
                        'Nomor'         => htmlspecialchars($this->input->post('No')),
                        'Halaman'       => htmlspecialchars($this->input->post('Halaman')),
                        'Url'           => htmlspecialchars($this->input->post('Url')),
                        'Publikasi'     => htmlspecialchars($this->input->post('Publikasi')),
                        'Dokumen'       => $filename,
                        'Source'        => '2', //Pengabdian
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
                    'Judul'         => htmlspecialchars($this->input->post('Judul')),
                    'Jurnal'        => htmlspecialchars($this->input->post('Jurnal')),
                    'ISSN'          => htmlspecialchars($this->input->post('ISSN')),
                    'Volume'        => htmlspecialchars($this->input->post('Volume')),
                    'Nomor'         => htmlspecialchars($this->input->post('No')),
                    'Halaman'       => htmlspecialchars($this->input->post('Halaman')),
                    'Url'           => htmlspecialchars($this->input->post('Url')),
                    'Publikasi'     => htmlspecialchars($this->input->post('Publikasi')),
                    'Dokumen'       => null,
                    'Source'        => '2', //Pengabdian
                    'Tgl_Input'     => date('Y-m-d H:i:s'),
                    'User_Input'    => $this->session->userdata['logged_in']['id_user']
                ];

                // var_dump("Tidak Ada Data yang di upload");
            }

            $hasil = $this->jurnal_m->saveData($data);

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

    public function saveEdit()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Jurnal', 'Jurnal', 'required');
        $this->form_validation->set_rules('Publikasi', 'Publikasi', 'required');
        $this->form_validation->set_rules('Url', 'Url', 'required');

        $Kd_Jurnal = $this->input->post('id');
        $this->db->where('Kd_Jurnal', $Kd_Jurnal);
        $link  = $this->db->get('ta_jurnal')->row('Dokumen');

        $config['upload_path']      = '././file/upload/documents/document jurnal/';
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
                    @unlink('././file/upload/documents/document jurnal/' . $link);

                    $datafile  = array('upload_data' => $this->upload->data());
                    $filename  = $datafile['upload_data']['file_name'];

                    $data = [
                        'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                        'Judul'         => htmlspecialchars($this->input->post('Judul')),
                        'Jurnal'        => htmlspecialchars($this->input->post('Jurnal')),
                        'ISSN'          => htmlspecialchars($this->input->post('ISSN')),
                        'Volume'        => htmlspecialchars($this->input->post('Volume')),
                        'Nomor'         => htmlspecialchars($this->input->post('No')),
                        'Halaman'       => htmlspecialchars($this->input->post('Halaman')),
                        'Url'           => htmlspecialchars($this->input->post('Url')),
                        'Publikasi'     => htmlspecialchars($this->input->post('Publikasi')),
                        'Dokumen'       => $filename,
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
                // var_dump("Proses Upload Sukses");
            } else {
                $data = [
                    'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                    'Judul'         => htmlspecialchars($this->input->post('Judul')),
                    'Jurnal'        => htmlspecialchars($this->input->post('Jurnal')),
                    'ISSN'          => htmlspecialchars($this->input->post('ISSN')),
                    'Volume'        => htmlspecialchars($this->input->post('Volume')),
                    'Nomor'         => htmlspecialchars($this->input->post('No')),
                    'Halaman'       => htmlspecialchars($this->input->post('Halaman')),
                    'Url'           => htmlspecialchars($this->input->post('Url')),
                    'Publikasi'     => htmlspecialchars($this->input->post('Publikasi')),
                    'Tgl_Update'    => date('Y-m-d H:i:s'),
                    'User_Update'   => $this->session->userdata['logged_in']['id_user']
                ];

                // var_dump("Tidak Ada Data yang di upload");
            }

            $where = [
                'Kd_Jurnal' => $Kd_Jurnal
            ];

            $hasil = $this->jurnal_m->saveEditData($where, $data);

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

    public function savePenulis()
    {
        $this->form_validation->set_rules('Nama', 'Nama', 'required');
        $this->form_validation->set_rules('Kd_Jurnal', 'Kd_Jurnal', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Kd_Jurnal'     => htmlspecialchars($this->input->post('Kd_Jurnal')),
                'Nama'          => htmlspecialchars($this->input->post('Nama')),
                'Tgl_Input'     => date('Y-m-d H:i:s'),
                'User_Input'    => $this->session->userdata['logged_in']['id_user']
            ];

            $hasil = $this->jurnal_m->saveDataPenulis($data);

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

    public function saveEditPenulis()
    {
        $this->form_validation->set_rules('Nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Nama'          => htmlspecialchars($this->input->post('Nama')),
                'Tgl_Update'    => date('Y-m-d H:i:s'),
                'User_Update'   => $this->session->userdata['logged_in']['id_user']
            ];

            $hasil = $this->jurnal_m->saveDataPenulis($data);

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

        $this->db->where('Kd_Jurnal', $id);
        $link  = $this->db->get('ta_jurnal')->row('Dokumen');

        $query  = $this->jurnal_m->deleteId($id);

        if ($query == true) {
            @unlink('././file/upload/documents/document jurnal/' . $link);
            $result['Msg']      = 'Data Berhasil Di Hapus . . .';
            $result['Status']   = true;
        } else {
            $result['Msg']      = $this->db->error()['message'];
            $result['Status']   = false;
        }

        echo json_encode($result);
    }

    public function deletePenulis($id)
    {
        $query  = $this->jurnal_m->deletePenulis($id);

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
