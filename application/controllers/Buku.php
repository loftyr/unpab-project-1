<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    // Create 06-November-2019

    public function index()
    {
        $dataheader['judul']    = 'Buku Ajar / Teks';
        $dataheader['css']      = 'buku-style.css'; // 
        $datafooter['js']       = 'buku-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/buku_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getData($tahun)
    {
        $data   = $this->buku_m->getData($tahun);
        echo json_encode($data);
    }

    public function getPenulis()
    {
        $Id_Buku = $this->input->post('Id_Buku');

        $data   = $this->buku_m->getPenulis($Id_Buku);
        echo json_encode($data);
    }

    public function save()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Isbn', 'Isbn', 'required');
        $this->form_validation->set_rules('Pencipta', 'Pencipta', 'required');
        $this->form_validation->set_rules('Nidn', 'Nidn', 'required');
        $this->form_validation->set_rules('Penerbit', 'Penerbit', 'required');

        $config['upload_path']      = '././file/upload/documents/document buku/';
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
                        'Pencipta'  => htmlspecialchars($this->input->post('Pencipta')),
                        'Judul'     => htmlspecialchars($this->input->post('Judul')),
                        'ISBN'      => htmlspecialchars($this->input->post('Isbn')),
                        'Jml_Hal'   => htmlspecialchars($this->input->post('Jml_Hal')),
                        'Penerbit'  => htmlspecialchars($this->input->post('Penerbit')),
                        'Dokumen'   => $filename
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
                $result['Msg']       = 'File Tidak Ada !!!';
                $result['MsgUpload'] = $this->upload->display_errors();
                $result['Status']    = false;
                echo json_encode($result);
                die;
            }

            $hasil = $this->buku_m->saveData($data);

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
                'Id_Buku'   => htmlspecialchars($this->input->post('Id_Buku')),
                'Tahun'     => htmlspecialchars($this->input->post('Tahun-2')),
                'Nama'      => htmlspecialchars($this->input->post('Nama')),
                'Urut'      => htmlspecialchars($this->input->post('Urut'))
            ];

            $hasil = $this->buku_m->saveData2($data);

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

        $this->db->where('Id_Buku', $id);
        $link  = $this->db->get('ta_buku')->row('Dokumen');

        $query  = $this->buku_m->deleteId($id);

        if ($query == true) {
            @unlink('././file/upload/documents/document buku/' . $link);
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
        $query  = $this->buku_m->deleteId2($id);

        if ($query == true) {
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
        $id = $this->input->post('Id_Buku');

        $this->db->where('Id_Buku', $id);
        $link    = $this->db->get('ta_buku')->row('Dokumen');

        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Isbn', 'Isbn', 'required');
        $this->form_validation->set_rules('Pencipta', 'Pencipta', 'required');
        $this->form_validation->set_rules('Nidn', 'Nidn', 'required');
        $this->form_validation->set_rules('Penerbit', 'Penerbit', 'required');

        $config['upload_path']      = '././file/upload/documents/document buku/';
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
                    @unlink('././file/upload/documents/document buku/' . $link);
                    $file       = array('upload_data' => $this->upload->data());
                    $filename   = $file['upload_data']['file_name'];

                    $data = [
                        'Tahun'     => htmlspecialchars($this->input->post('Tahun')),
                        'Nidn'      => htmlspecialchars($this->input->post('Nidn')),
                        'Pencipta'  => htmlspecialchars($this->input->post('Pencipta')),
                        'Judul'     => htmlspecialchars($this->input->post('Judul')),
                        'ISBN'      => htmlspecialchars($this->input->post('Isbn')),
                        'Jml_Hal'   => htmlspecialchars($this->input->post('Jml_Hal')),
                        'Penerbit'  => htmlspecialchars($this->input->post('Penerbit')),
                        'Dokumen'   => $filename
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
                    'Tahun'     => htmlspecialchars($this->input->post('Tahun')),
                    'Nidn'      => htmlspecialchars($this->input->post('Nidn')),
                    'Pencipta'  => htmlspecialchars($this->input->post('Pencipta')),
                    'Judul'     => htmlspecialchars($this->input->post('ISSN')),
                    'ISBN'      => htmlspecialchars($this->input->post('Isbn')),
                    'Jml_Hal'   => htmlspecialchars($this->input->post('Jml_Hal')),
                    'Penerbit'  => htmlspecialchars($this->input->post('Penerbit'))
                ];
            }

            $where = [
                'Id_Buku'  => $id
            ];

            $hasil  = $this->buku_m->saveEdit($where, $data);

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
