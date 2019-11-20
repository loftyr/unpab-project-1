<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KaryaIlmiah extends CI_Controller
{

    // Create 04-November-2019
    // Develop
    // public function index()
    // {
    //     $dataheader['judul']    = 'Karya Ilmiah';
    //     $dataheader['css']      = 'karyailmiah-style.css'; // 
    //     $datafooter['js']       = 'karyailmiah-script.js'; // 

    //     $data['Tahun']          = $this->base_m->getTahun();

    //     $this->load->view('templates/header', $dataheader);
    //     $this->load->view('page/karyailmiah_v', $data);
    //     $this->load->view('templates/footer', $datafooter);
    // }

    public function penelitian()
    {
        $dataheader['judul']    = 'Karya Ilmiah';
        $dataheader['css']      = 'karyailmiah-style.css'; // 
        $datafooter['js']       = 'karyailmiah-pene-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/karyailmiah_pene_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function pengabdian()
    {
        $dataheader['judul']    = 'Karya Ilmiah';
        $dataheader['css']      = 'karyailmiah-style.css'; // 
        $datafooter['js']       = 'karyailmiah-peng-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/karyailmiah_peng_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    // public function getData($tahun)
    // {
    //     $data   = $this->karyailmiah_m->getData($tahun);
    //     echo json_encode($data);
    // }

    public function getDataPenelitian($tahun)
    {
        $data   = $this->karyailmiah_m->getDataPenelitian($tahun);
        echo json_encode($data);
    }

    public function getEditPenelitian($tahun)
    {
        $Id     = $this->input->post('id');
        $data   = $this->karyailmiah_m->getEditPenelitian($Id);
        echo json_encode($data);
    }

    public function getDataPengabdian($tahun)
    {
        $data   = $this->karyailmiah_m->getDataPengabdian($tahun);
        echo json_encode($data);
    }

    public function getEditPengabdian($tahun)
    {
        $Id     = $this->input->post('id');
        $data   = $this->karyailmiah_m->getEditPengabdian($Id);
        echo json_encode($data);
    }

    public function getPenulis()
    {
        $Id_Karya = $this->input->post('Id_Karya');

        $data   = $this->karyailmiah_m->getPenulis($Id_Karya);
        echo json_encode($data);
    }

    public function getEditPenulis()
    {
        $Id = $this->input->post('id');

        $data   = $this->karyailmiah_m->getEditPenulis($Id);
        echo json_encode($data);
    }

    public function savePenelitian()
    {
        $this->form_validation->set_rules('Nidn', 'Nidn', 'required');
        $this->form_validation->set_rules('Nama', 'Nama', 'required');
        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Institusi', 'Institusi', 'required');

        $config['upload_path']      = '././file/upload/documents/document karya ilmiah/';
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
                        'Tahun'     => htmlspecialchars($this->input->post('Tahun')),
                        'Nidn'      => htmlspecialchars($this->input->post('Nidn')),
                        'Nama'      => htmlspecialchars($this->input->post('Nama')),
                        'Judul'     => htmlspecialchars($this->input->post('Judul')),
                        'Institusi' => htmlspecialchars($this->input->post('Institusi')),
                        'Halaman'   => htmlspecialchars($this->input->post('Halaman')),
                        'Tempat'    => htmlspecialchars($this->input->post('Tempat')),
                        'Forum'     => htmlspecialchars($this->input->post('Forum')),
                        'Status'    => htmlspecialchars($this->input->post('Status')),
                        'Dokumen'   => $filename,
                        'Source'    => '1', // Penelitian
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
                    'Tahun'     => htmlspecialchars($this->input->post('Tahun')),
                    'Nidn'      => htmlspecialchars($this->input->post('Nidn')),
                    'Nama'      => htmlspecialchars($this->input->post('Nama')),
                    'Judul'     => htmlspecialchars($this->input->post('Judul')),
                    'Institusi' => htmlspecialchars($this->input->post('Institusi')),
                    'Halaman'   => htmlspecialchars($this->input->post('Halaman')),
                    'Tempat'    => htmlspecialchars($this->input->post('Tempat')),
                    'Forum'     => htmlspecialchars($this->input->post('Forum')),
                    'Status'    => htmlspecialchars($this->input->post('Status')),
                    'Dokumen'   => null,
                    'Source'    => '1', // Penelitian
                    'Tgl_Update'    => date('Y-m-d H:i:s'),
                    'User_Update'   => $this->session->userdata['logged_in']['id_user']

                ];
            }

            $hasil = $this->karyailmiah_m->saveData($data);

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
        $this->form_validation->set_rules('Nidn', 'Nidn', 'required');
        $this->form_validation->set_rules('Nama', 'Nama', 'required');
        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Institusi', 'Institusi', 'required');

        $config['upload_path']      = '././file/upload/documents/document karya ilmiah/';
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
                        'Tahun'     => htmlspecialchars($this->input->post('Tahun')),
                        'Nidn'      => htmlspecialchars($this->input->post('Nidn')),
                        'Nama'      => htmlspecialchars($this->input->post('Nama')),
                        'Judul'     => htmlspecialchars($this->input->post('Judul')),
                        'Institusi' => htmlspecialchars($this->input->post('Institusi')),
                        'Halaman'   => htmlspecialchars($this->input->post('Halaman')),
                        'Tempat'    => htmlspecialchars($this->input->post('Tempat')),
                        'Forum'     => htmlspecialchars($this->input->post('Forum')),
                        'Status'    => htmlspecialchars($this->input->post('Status')),
                        'Dokumen'   => $filename,
                        'Source'    => '1', // Penelitian
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
                    'Tahun'     => htmlspecialchars($this->input->post('Tahun')),
                    'Nidn'      => htmlspecialchars($this->input->post('Nidn')),
                    'Nama'      => htmlspecialchars($this->input->post('Nama')),
                    'Judul'     => htmlspecialchars($this->input->post('Judul')),
                    'Institusi' => htmlspecialchars($this->input->post('Institusi')),
                    'Halaman'   => htmlspecialchars($this->input->post('Halaman')),
                    'Tempat'    => htmlspecialchars($this->input->post('Tempat')),
                    'Forum'     => htmlspecialchars($this->input->post('Forum')),
                    'Status'    => htmlspecialchars($this->input->post('Status')),
                    'Dokumen'   => null,
                    'Source'    => '1', // Penelitian
                    'Tgl_Update'    => date('Y-m-d H:i:s'),
                    'User_Update'   => $this->session->userdata['logged_in']['id_user']

                ];
            }

            $hasil = $this->karyailmiah_m->saveData($data);

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

    public function save2()
    {
        $this->form_validation->set_rules('Nama_Penulis', 'Nama_Penulis', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Id_Karya'   => htmlspecialchars($this->input->post('Id_Karya')),
                'Tahun'     => htmlspecialchars($this->input->post('Tahun-2')),
                'Nama_Penulis' => htmlspecialchars($this->input->post('Nama_Penulis')),
                'Urut'      => htmlspecialchars($this->input->post('Urut'))
            ];

            $hasil = $this->karyailmiah_m->saveData2($data);

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
        $this->db->where('Id_Karya', $id);
        $link  = $this->db->get('ta_karyailmiah')->row('Dokumen');

        $query  = $this->karyailmiah_m->deleteId($id);

        if ($query == true) {
            @unlink('././file/upload/documents/document karya ilmiah/' . $link);
            $result['Msg']      = 'Data Berhasil Di Hapus . . .';
            $result['Status']   = true;
        } else {
            $result['Msg']      = $this->db->error()['message'];
            $result['Status']   = false;
        }

        echo json_encode($result);
    }
}
