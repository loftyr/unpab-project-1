<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penelitian extends CI_Controller
{

    public function index()
    {
        $dataheader['judul']    = 'Sumber Daya Staf Pendukung LPPM';
        $dataheader['css']      = 'penelitian-style.css'; // 
        $datafooter['js']       = 'penelitian-script.js'; // 

        $data['Tahun']              = $this->base_m->getTahun();
        $data['Ref_ProgramStudi']   = $this->penelitian_m->getProgramStudi();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/penelitian_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function ceknidn()
    {
        $nidn   = $this->input->post('nidn');

        $data   = $this->penelitian_m->ceknidn($nidn);

        if ($data == NULL) {
            $result['status']   = FALSE;
            $result['ket']      = "Data Tidak Ditemukan !!!";
            $result['data']     = '';
        } else {
            $result['status']   = TRUE;
            $result['ket']      = "Data Ditemukan !!!";
            $result['data']     = $data[0]->Nama;
        }

        echo json_encode($result);
    }

    public function getData($tahun)
    {
        $data   = $this->penelitian_m->getData($tahun);
        echo json_encode($data);
        // foreach ($data as $value) {         
        //     echo '
        //         <tr>
        //           <td>'.$no++.'</td>
        //           <td>'.$value->Judul.'</td>
        //           <td>'.$value->Bidang_Keilmuan.'</td>
        //           <td>Rp. '.number_format($value->Dana, 2, ",", ".").'</td>
        //           <td><a href="'.base_url("/file/upload/documents/".$value->Dokumen."").'" target="_blank">PDF</a></td>
        //           <td class="text-center">
        // <button dataID="'.$value->Kd_Penelitian.'" class="btn btn-sm" id="view-anggota" data-toggle="tooltip" data-placement="top" title="Lihat Anggota"><i class="fas fa-book"></i></button>
        // <button dataID="'.$value->Kd_Penelitian.'" class="btn btn-sm btn-info" id="view-tim-pendukung" data-toggle="tooltip" data-placement="bottom" title="Lihat Tim Pendukung"><i class="fas fa-book"></i></button>
        //           </td>
        //         </tr>
        //     ';

        // }
    }

    public function getAnggota()
    {
        $Kd_Penelitian  = $this->input->post('Kd_Penelitian');
        $data   = $this->penelitian_m->getAnggota($Kd_Penelitian);
        echo json_encode($data);
    }

    public function getPendukung()
    {
        $Kd_Penelitian  = $this->input->post('Kd_Penelitian');
        $data   = $this->penelitian_m->getPendukung($Kd_Penelitian);
        echo json_encode($data);
    }

    public function save1()
    {
        $maxid  = $this->penelitian_m->getMaxid(); //Tahun
        $tahun  = date('Y');
        $id     = $tahun . ($maxid[0]->No_Urut + 1); //Kode Penelitian
        $nourut = $maxid[0]->No_Urut + 1; //No Urut
        $Dana   = str_replace('.', '', $this->input->post('JumlahDana'));

        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Skema', 'Skema', 'required');

        $config['upload_path']      = '././file/upload/documents/document penelitian/';
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
                        'Kd_Penelitian' => $id,
                        'Tahun'         => htmlspecialchars($this->input->post('Tahun')),
                        'Judul'         => htmlspecialchars($this->input->post('Judul')),
                        'Bidang_Keilmuan'   => htmlspecialchars($this->input->post('Bidang')),
                        'Sumber_Dana'   => htmlspecialchars($this->input->post('Sumber')),
                        'Dana'          => $Dana,
                        'Dokumen'       => $filename,
                        'Date_Create'   => date("Y-m-d H:i:s"),
                        'No_Urut'       => $nourut
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
                    'Kd_Penelitian' => $id,
                    'Tahun'         => htmlspecialchars($this->input->post('Tahun')),
                    'Judul'         => htmlspecialchars($this->input->post('Judul')),
                    'Bidang_Keilmuan'   => htmlspecialchars($this->input->post('Bidang')),
                    'Sumber_Dana'   => htmlspecialchars($this->input->post('Sumber')),
                    'Dana'          => $Dana,
                    'Dokumen'       => NULL,
                    'Date_Create'   => date("Y-m-d H:i:s"),
                    'No_Urut'       => $nourut
                ];

                // var_dump("Tidak Ada Data yang di upload");
            }

            $hasil = $this->penelitian_m->savePenelitian($data);

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
        $this->form_validation->set_rules('Kd-Penelitian-1', 'Kd-Penelitian-1', 'required');
        $this->form_validation->set_rules('Nidn', 'Nidn', 'required');
        $this->form_validation->set_rules('Nama-1', 'Nama-1', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Please Fill All Field !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Kd_Penelitian' => htmlspecialchars($this->input->post('Kd-Penelitian-1')),
                'Nidn'         => htmlspecialchars($this->input->post('Nidn')),
                'Nama'         => htmlspecialchars($this->input->post('Nama-1')),
                'Jabatan'      => htmlspecialchars($this->input->post('Jabatan-1'))
            ];

            $hasil = $this->penelitian_m->saveAnggota($data);

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

    public function save3()
    {
        $this->form_validation->set_rules('Kd-Penelitian-2', 'Kd-Penelitian-2', 'required');
        $this->form_validation->set_rules('Nama-2', 'Nama-2', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Please Fill All Field !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Kd_Penelitian' => htmlspecialchars($this->input->post('Kd-Penelitian-2')),
                'Nama'         => htmlspecialchars($this->input->post('Nama-2')),
                'Jabatan'      => htmlspecialchars($this->input->post('Jabatan-2'))
            ];

            $hasil = $this->penelitian_m->savePendukung($data);

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
