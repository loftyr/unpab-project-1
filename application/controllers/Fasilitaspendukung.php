<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitaspendukung extends CI_Controller
{

    public function index()
    {
        $dataheader['judul']    = 'Sumber Daya Staf Pendukung LPPM';
        $dataheader['css']      = 'fasilitas-style.css'; // 
        $datafooter['js']       = 'fasilitas-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/fasilitas_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getData($tahun)
    {
        $data   = $this->fasilitaspendukung_m->getData($tahun);
        echo json_encode($data);
    }

    public function save()
    {
        $this->form_validation->set_rules('No', 'No', 'required');
        $this->form_validation->set_rules('Fasilitas', 'Fasilitas', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');

        $config['upload_path']      = '././file/upload/documents/document fasilitas pendukung/';
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
                        'No_Surat'      => $this->input->post('No'),
                        'Nama_Unit'     => htmlspecialchars($this->input->post('Unit')),
                        'Fasilitas'     => htmlspecialchars($this->input->post('Fasilitas')),
                        'Status'        => htmlspecialchars($this->input->post('Status')),
                        'Keterangan'    => htmlspecialchars($this->input->post('Ket')),
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
                    'No_Surat'      => $this->input->post('No'),
                    'Nama_Unit'     => htmlspecialchars($this->input->post('Unit')),
                    'Fasilitas'     => htmlspecialchars($this->input->post('Fasilitas')),
                    'Status'        => htmlspecialchars($this->input->post('Status')),
                    'Keterangan'    => htmlspecialchars($this->input->post('Ket')),
                    'Dokumen'       => NULL
                ];

                // var_dump("Tidak Ada Data yang di upload");
            }

            $hasil = $this->fasilitaspendukung_m->saveData($data);

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

        $this->db->where('Id', $id);
        $linkImage  = $this->db->get('ta_fasilitas_pendukung')->row('Dokumen');

        $query  = $this->fasilitaspendukung_m->deleteId($id);

        if ($query == true) {
            @unlink('././file/upload/documents/document fasilitas pendukung/' . $linkImage);
            $result['Msg']      = 'Data Berhasil Di Hapus . . .';
            $result['Status']   = true;
        } else {
            $result['Msg']      = $this->db->error()['message'];
            $result['Status']   = false;
        }

        echo json_encode($result);
    }
}
