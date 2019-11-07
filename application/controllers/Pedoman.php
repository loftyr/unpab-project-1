<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedoman extends CI_Controller
{

    // Create 04-November-2019

    public function index()
    {
        $dataheader['judul']    = 'Sumber Daya Staf Pendukung LPPM';
        $dataheader['css']      = 'pedoman-style.css'; // 
        $datafooter['js']       = 'pedoman-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/pedoman_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getData($tahun)
    {
        $data   = $this->pedoman_m->getData($tahun);
        echo json_encode($data);
    }

    public function save()
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
                // var_dump("Proses Upload Sukses");
            } else {
                $data = [
                    'Tahun'         => htmlspecialchars($this->input->post('Tahun')),
                    'Nama_Pedoman'  => htmlspecialchars($this->input->post('Nama-Pedoman')),
                    'No_Surat'      => htmlspecialchars($this->input->post('No')),
                    'Dokumen'       => null
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

    public function getDataEdit()
    {
        $id     = $this->input->post('id');

        $data   = $this->pedoman_m->getDataEdit($id);
        echo json_encode($data);
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

    public function saveEdit()
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
