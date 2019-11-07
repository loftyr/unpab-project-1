<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerjasama extends CI_Controller
{

    public function index()
    {
        $dataheader['judul']    = 'Perjanjian Kerjasama';
        $dataheader['css']      = 'kerjasama-style.css'; // 
        $datafooter['js']       = 'kerjasama-script.js'; // 

        $data['Tahun']              = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/kerjasama_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getData($tahun)
    {
        $data   = $this->kerjasama_m->getData($tahun);
        echo json_encode($data);
    }

    public function save()
    {
        $Nilai   = str_replace('.', '', $this->input->post('Nilai'));

        $this->form_validation->set_rules('Unit', 'Unit', 'required');
        $this->form_validation->set_rules('Nama_Keg', 'Nama_Keg', 'required');
        $this->form_validation->set_rules('No_Kontrak', 'No_Kontrak', 'required');
        $this->form_validation->set_rules('Nilai', 'Nilai', 'required');

        $config['upload_path']      = '././file/upload/documents/document kerjasama/';
        $config['allowed_types']    = 'pdf';
        $config['max_size']         = 1000;
        $config['encrypt_name']     = false;

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Please Fill All Field !!!';
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
                        'Unit'          => htmlspecialchars($this->input->post('Unit')),
                        'Nama_Keg'      => htmlspecialchars($this->input->post('Nama_Keg')),
                        'Institusi_Mitra' => htmlspecialchars($this->input->post('Institusi_Mitra')),
                        'No_Kontrak'    => htmlspecialchars($this->input->post('No_Kontrak')),
                        'Nilai_Kontrak' => $Nilai,
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
                    'Unit'          => htmlspecialchars($this->input->post('Unit')),
                    'Nama_Keg'      => htmlspecialchars($this->input->post('Nama_Keg')),
                    'Institusi_Mitra' => htmlspecialchars($this->input->post('Institusi_Mitra')),
                    'No_Kontrak'    => htmlspecialchars($this->input->post('No_Kontrak')),
                    'Nilai_Kontrak' => $Nilai
                ];

                // var_dump("Tidak Ada Data yang di upload");
            }

            $hasil = $this->kerjasama_m->saveData($data);

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
}
