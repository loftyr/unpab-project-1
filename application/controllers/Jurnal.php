<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{

    // Create 05-November-2019

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

    public function getData($tahun)
    {
        $data   = $this->jurnal_m->getData($tahun);
        echo json_encode($data);
    }

    public function getPenulis()
    {
        $Kd_Jurnal = $this->input->post('Kd_Jurnal');

        $data   = $this->jurnal_m->getPenulis($Kd_Jurnal);
        echo json_encode($data);
    }

    public function save()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Jurnal', 'Jurnal', 'required');
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
                        'Tahun'         => htmlspecialchars($this->input->post('Tahun')),
                        'Judul'  => htmlspecialchars($this->input->post('Judul')),
                        'Jurnal'      => htmlspecialchars($this->input->post('Jurnal')),
                        'Issn'      => htmlspecialchars($this->input->post('ISSN')),
                        'Volume'      => htmlspecialchars($this->input->post('Volume')),
                        'Nomor'      => htmlspecialchars($this->input->post('No')),
                        'Halaman'      => htmlspecialchars($this->input->post('Halaman')),
                        'Url'      => htmlspecialchars($this->input->post('Url')),
                        'Dokumen'       => $filename
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
                    'Tahun'         => htmlspecialchars($this->input->post('Tahun')),
                    'Judul'  => htmlspecialchars($this->input->post('Judul')),
                    'Jurnal'      => htmlspecialchars($this->input->post('Jurnal')),
                    'Issn'      => htmlspecialchars($this->input->post('ISSN')),
                    'Volume'      => htmlspecialchars($this->input->post('Vol')),
                    'Nomor'      => htmlspecialchars($this->input->post('No')),
                    'Halaman'      => htmlspecialchars($this->input->post('Halaman')),
                    'Url'      => htmlspecialchars($this->input->post('URL')),
                    'Dokumen'       => null
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

    public function save2()
    {
        $this->form_validation->set_rules('Nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Mohon Lengkapi Data !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Kd_Jurnal' => htmlspecialchars($this->input->post('Kd_Jurnal')),
                'Tahun' => htmlspecialchars($this->input->post('Tahun')),
                'Nama'         => htmlspecialchars($this->input->post('Nama'))
            ];

            $hasil = $this->jurnal_m->saveData2($data);

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

    public function saveEdit()
    {
        $id = $this->input->post('Kd_Jurnal');

        $this->db->where('Kd_Jurnal', $id);
        $link    = $this->db->get('ta_jurnal')->row('Dokumen');

        $this->form_validation->set_rules('Nama-Pedoman', 'Nama-Pedoman', 'required');
        $this->form_validation->set_rules('No', 'No', 'required');

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
                    $file       = array('upload_data' => $this->upload->data());
                    $filename   = $file['upload_data']['file_name'];

                    $data = [
                        'Tahun'         => htmlspecialchars($this->input->post('Tahun')),
                        'Nama_Pedoman'  => htmlspecialchars($this->input->post('Nama-Pedoman')),
                        'No_Surat'      => htmlspecialchars($this->input->post('No')),
                        'Dokumen'       => $filename
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
                    'Tahun'         => htmlspecialchars($this->input->post('Tahun')),
                    'Nama_Pedoman'  => htmlspecialchars($this->input->post('Nama-Pedoman')),
                    'No_Surat'      => htmlspecialchars($this->input->post('No')),
                    'Dokumen'       => null
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
}
