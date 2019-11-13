<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penelitian extends CI_Controller
{

    // Develop
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

    public function asing()
    {
        $dataheader['judul']    = 'Penelitian Asing';
        $dataheader['css']      = 'asing-style.css'; // 
        $datafooter['js']       = 'asing-script.js'; // 

        $data['Tahun']       = $this->base_m->getTahun();
        $data['Ref_Prodi']   = $this->penelitian_m->getProgramStudi();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/asing_v', $data);
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
            $result['ket']      = "";
            $result['data']     = $data[0]->Nama;
        }

        echo json_encode($result);
    }

    public function getDataAsing($tahun)
    {
        $data   = $this->penelitian_m->getDataAsing($tahun);
        echo json_encode($data);
    }

    public function getEditAsing()
    {
        $Kd_Penelitian = $this->input->post('id');
        $data   = $this->penelitian_m->getEditAsing($Kd_Penelitian);
        echo json_encode($data);
    }

    public function getAnggota()
    {
        $Kd_Penelitian  = $this->input->post('Kd_Penelitian');
        $data   = $this->penelitian_m->getAnggota($Kd_Penelitian);
        echo json_encode($data);
    }

    public function getEditAnggota()
    {
        $No_Id  = $this->input->post('id');
        $data   = $this->penelitian_m->getEditAnggota($No_Id);
        echo json_encode($data);
    }

    public function getPendukung()
    {
        $Kd_Penelitian  = $this->input->post('Kd_Penelitian');
        $data   = $this->penelitian_m->getPendukung($Kd_Penelitian);
        echo json_encode($data);
    }

    public function getEditPendukung()
    {
        $No_Id  = $this->input->post('id');
        $data   = $this->penelitian_m->getEditPendukung($No_Id);
        echo json_encode($data);
    }

    public function saveDataAsing()
    {
        $maxid  = $this->penelitian_m->getMaxid(); //Tahun
        $tahun  = date('Y');
        $id     = $tahun . ($maxid[0]->No_Urut + 1); //Kode Penelitian
        $nourut = $maxid[0]->No_Urut + 1; //No Urut
        $Dana   = str_replace('.', '', $this->input->post('JumlahDana'));
        $Kode   = explode('.', $this->input->post('Prodi'));

        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Skema', 'Skema', 'required');
        $this->form_validation->set_rules('Prodi', 'Prodi', 'required');

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
                        'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                        'Judul'         => htmlspecialchars($this->input->post('Judul')),
                        'Skema'         => htmlspecialchars($this->input->post('Skema')),
                        'Kd_Fakultas'   => $Kode[0],
                        'Kd_Prodi'      => $Kode[1],
                        'Sumber_Dana'   => htmlspecialchars($this->input->post('Sumber')),
                        'Dana'          => $Dana,
                        'Dokumen'       => $filename,
                        'Date_Create'   => date("Y-m-d H:i:s"),
                        'Source'        => '3',
                        'Tgl_Input'     => date('Y-m-d H:i:s'),
                        'User_Input'    => $this->session->userdata['logged_in']['id_user'],
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
                    'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                    'Judul'         => htmlspecialchars($this->input->post('Judul')),
                    'Skema'         => htmlspecialchars($this->input->post('Skema')),
                    'Kd_Fakultas'   => $Kode[0],
                    'Kd_Prodi'      => $Kode[1],
                    'Sumber_Dana'   => htmlspecialchars($this->input->post('Sumber')),
                    'Dana'          => $Dana,
                    'Dokumen'       => NULL,
                    'Date_Create'   => date("Y-m-d H:i:s"),
                    'Source'        => '3',
                    'Tgl_Input'     => date('Y-m-d H:i:s'),
                    'User_Input'    => $this->session->userdata['logged_in']['id_user'],
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

    public function saveEditData()
    {
        $Kd_Penelitian = $this->input->post('id');
        $Dana   = str_replace('.', '', $this->input->post('JumlahDana'));
        $Kode   = explode('.', $this->input->post('Prodi'));

        $this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Skema', 'Skema', 'required');
        $this->form_validation->set_rules('Prodi', 'Prodi', 'required');

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
                        'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                        'Judul'         => htmlspecialchars($this->input->post('Judul')),
                        'Skema'         => htmlspecialchars($this->input->post('Skema')),
                        'Kd_Fakultas'   => $Kode[0],
                        'Kd_Prodi'      => $Kode[1],
                        'Sumber_Dana'   => htmlspecialchars($this->input->post('Sumber')),
                        'Dana'          => $Dana,
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
                    'Skema'         => htmlspecialchars($this->input->post('Skema')),
                    'Kd_Fakultas'   => $Kode[0],
                    'Kd_Prodi'      => $Kode[1],
                    'Sumber_Dana'   => htmlspecialchars($this->input->post('Sumber')),
                    'Dana'          => $Dana,
                    'Tgl_Update'    => date('Y-m-d H:i:s'),
                    'User_Update'   => $this->session->userdata['logged_in']['id_user']
                ];

                // var_dump("Tidak Ada Data yang di upload");
            }

            $where = [
                'Kd_Penelitian'  => $this->input->post('id')
            ];

            $hasil = $this->penelitian_m->saveEditData($where, $data);

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

    public function deleteData($Kd_Penelitian)
    {

        $this->db->where('Kd_Penelitian', $Kd_Penelitian);
        $link  = $this->db->get('ta_penelitian')->row('Dokumen');

        $query  = $this->penelitian_m->deleteId($Kd_Penelitian);

        if ($query == true) {
            @unlink('././file/upload/documents/document penelitian/' . $link);
            $result['Msg']      = 'Data Berhasil Di Hapus . . .';
            $result['Status']   = true;
        } else {
            $result['Msg']      = $this->db->error()['message'];
            $result['Status']   = false;
        }

        echo json_encode($result);
    }


    public function saveAnggota()
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
                'Nidn'          => htmlspecialchars($this->input->post('Nidn')),
                'Nama'          => htmlspecialchars($this->input->post('Nama-1')),
                'Jabatan'       => htmlspecialchars($this->input->post('Jabatan-1')),
                'Tgl_Input'     => date('Y-m-d H:i:s'),
                'User_Input'    => $this->session->userdata['logged_in']['id_user']
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

    public function saveEditAnggota()
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
                'Nidn'          => htmlspecialchars($this->input->post('Nidn')),
                'Nama'          => htmlspecialchars($this->input->post('Nama-1')),
                'Jabatan'       => htmlspecialchars($this->input->post('Jabatan-1')),
                'Tgl_Update'    => date('Y-m-d H:i:s'),
                'User_Update'   => $this->session->userdata['logged_in']['id_user']
            ];

            $where = [
                'No_Id' => $this->input->post("id-2"),
                'Kd_Penelitian' => $this->input->post('Kd-Penelitian-1')
            ];

            $hasil = $this->penelitian_m->saveEditAnggota($where, $data);

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

    public function deleteAnggota($No_Id)
    {
        $query  = $this->penelitian_m->deleteAnggota($No_Id);

        if ($query == true) {
            $result['Msg']      = 'Data Berhasil Di Hapus . . .';
            $result['Status']   = true;
        } else {
            $result['Msg']      = $this->db->error()['message'];
            $result['Status']   = false;
        }

        echo json_encode($result);
    }

    public function savePendukung()
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
                'Nama'          => htmlspecialchars($this->input->post('Nama-2')),
                'Jabatan'       => htmlspecialchars($this->input->post('Jabatan-2')),
                'Tgl_Input'     => date('Y-m-d H:i:s'),
                'User_Input'    => $this->session->userdata['logged_in']['id_user']
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

    public function saveEditPendukung()
    {
        $this->form_validation->set_rules('Kd-Penelitian-2', 'Kd-Penelitian-2', 'required');
        $this->form_validation->set_rules('Nama-2', 'Nama-2', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Please Fill All Field !!!';
            $result['MsgUpload']    = '';
            $result['Status']       = false;
        } else {
            $data = [
                'Nama'          => htmlspecialchars($this->input->post('Nama-2')),
                'Jabatan'       => htmlspecialchars($this->input->post('Jabatan-2')),
                'Tgl_Update'     => date('Y-m-d H:i:s'),
                'User_Update'    => $this->session->userdata['logged_in']['id_user']
            ];

            $where = [
                'No_Id' => $this->input->post("id-3"),
                'Kd_Penelitian' => $this->input->post('Kd-Penelitian-2')
            ];

            $hasil = $this->penelitian_m->saveEditPendukung($where, $data);

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

    public function deletePendukung($No_Id)
    {
        $query  = $this->penelitian_m->deletePendukung($No_Id);

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
