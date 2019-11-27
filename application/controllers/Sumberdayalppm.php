<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sumberdayalppm extends CI_Controller
{

    // develop
    public function index()
    {
        $dataheader['judul']    = 'Sumber Daya Staf Pendukung LPPM';
        $dataheader['css']      = 'sumberdaya-style.css'; // 
        $datafooter['js']       = 'sumberdaya-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();
        $data['Ref_Prodi']      = $this->penelitian_m->getProgramStudi();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/sumberdaya_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }
    // ======>>>><<<<<=======

    // Create 25-Oktober-2019

    // Page Staff
    public function Staff()
    {
        $dataheader['judul']    = 'Sumber Daya Staf Pendukung LPPM';
        $dataheader['css']      = 'staff-style.css'; // 
        $datafooter['js']       = 'staff-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();


        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/staff_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    // Page Dosen
    public function Dosen()
    {
        $dataheader['judul']    = 'Dosen Tetap Perguruan Tinggi';
        $dataheader['css']      = 'dosen-style.css'; // 
        $datafooter['js']       = 'dosen-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();
        $data['Ref_Prodi']      = $this->penelitian_m->getProgramStudi();


        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/dosen_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getDataPegawai($tahun)
    {
        $data   = $this->sumberdayalppm_m->getDataPegawai($tahun);
        echo json_encode($data);
    }

    public function getDataDosen($tahun)
    {
        $data   = $this->sumberdayalppm_m->getDataDosen($tahun);
        echo json_encode($data);
    }

    public function save()
    {
        $this->form_validation->set_rules('Nip', 'Nip', 'required');
        $this->form_validation->set_rules('Nama_Pegawai', 'Nama_Pegawai', 'required');
        $this->form_validation->set_rules('Jk', 'Jk', 'required');
        $this->form_validation->set_rules('Jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('Pendidikan', 'Pendidikan', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Data Belum Lengkap !!!';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                'Nip'           => htmlspecialchars($this->input->post('Nip')),
                'Nama'          => $this->input->post('Nama_Pegawai'),
                'Jk'            => htmlspecialchars($this->input->post('Jk')),
                'Jabatan'       => htmlspecialchars($this->input->post('Jabatan')),
                'Unit'          => htmlspecialchars($this->input->post('Unit')),
                'Jenjang'  => htmlspecialchars($this->input->post('Pendidikan')),
                'Role'          => 1,
                'Tgl_Input'     => date('Y-m-d H:i:s'),
                'User_Input'    => $this->session->userdata['logged_in']['id_user']
            ];

            $hasil = $this->sumberdayalppm_m->saveData($data);

            if ($hasil == true) {
                $result['Msg']       = 'Data Berhasil Disimpan . . .';
                $result['Status']    = true;
            } else {
                $result['Msg']       = $this->db->error()['message'];
                $result['Status']    = false;
            }
        }

        echo json_encode($result);
    }

    public function saveEdit()
    {
        $this->form_validation->set_rules('Nip', 'Nip', 'required');
        $this->form_validation->set_rules('Nama_Pegawai', 'Nama_Pegawai', 'required');
        $this->form_validation->set_rules('Jk', 'Jk', 'required');
        $this->form_validation->set_rules('Jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('Pendidikan', 'Pendidikan', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Data Belum Lengkap !!!';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                'Nip'           => htmlspecialchars($this->input->post('Nip')),
                'Nama'          => $this->input->post('Nama_Pegawai'),
                'Jk'            => htmlspecialchars($this->input->post('Jk')),
                'Jabatan'       => htmlspecialchars($this->input->post('Jabatan')),
                'Unit'          => htmlspecialchars($this->input->post('Unit')),
                'Jenjang'       => htmlspecialchars($this->input->post('Pendidikan')),
                'Tgl_Update'    => date('Y-m-d H:i:s'),
                'User_Update'   => $this->session->userdata['logged_in']['id_user']
            ];

            $where = [
                'id'  => $this->input->post('id')
            ];

            $hasil = $this->sumberdayalppm_m->saveEdit($where, $data);

            if ($hasil == true) {
                $result['Msg']       = 'Data Berhasil Diubah . . .';
                $result['Status']    = true;
            } else {
                $result['Msg']       = $this->db->error()['message'];
                $result['Status']    = false;
            }
        }

        echo json_encode($result);
    }

    public function save2()
    {
        $Kode = explode('.', $this->input->post('Prodi'));

        $this->form_validation->set_rules('Nidn', 'Nidn', 'required');
        $this->form_validation->set_rules('Nama_Dosen', 'Nama_Dosen', 'required');
        $this->form_validation->set_rules('Jk', 'Jk', 'required');
        $this->form_validation->set_rules('Prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('Pendidikan', 'Pendidikan', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Data Belum Lengkap !!!';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                'Nidn'          => htmlspecialchars($this->input->post('Nidn')),
                'Nama'          => $this->input->post('Nama_Dosen'),
                'Jk'            => htmlspecialchars($this->input->post('Jk')),
                'Kd_Fakultas'   => htmlspecialchars($Kode[0]),
                'Kd_Prodi'      => htmlspecialchars($Kode[1]),
                'Jenjang'       => htmlspecialchars($this->input->post('Pendidikan')),
                'Role'          => '2',
                'Tgl_Input'     => date('Y-m-d H:i:s'),
                'User_Input'    => $this->session->userdata['logged_in']['id_user']
            ];

            $hasil = $this->sumberdayalppm_m->saveData($data);

            if ($hasil == true) {
                $result['Msg']       = 'Data Berhasil Disimpan . . .';
                $result['Status']    = true;
            } else {
                $result['Msg']       = $this->db->error()['message'];
                $result['Status']    = false;
            }
        }

        echo json_encode($result);
    }

    public function saveEdit2()
    {
        $Kode   = explode('.', $this->input->post('Prodi'));

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('Nidn', 'Nidn', 'required');
        $this->form_validation->set_rules('Nama_Dosen', 'Nama_Dosen', 'required');
        $this->form_validation->set_rules('Jk', 'Jk', 'required');
        $this->form_validation->set_rules('Prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('Pendidikan', 'Pendidikan', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Data Belum Lengkap !!!';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'         => htmlspecialchars($this->input->post('Tahun-1')),
                'Nidn'          => htmlspecialchars($this->input->post('Nidn')),
                'Nama'          => $this->input->post('Nama_Dosen'),
                'Jk'            => htmlspecialchars($this->input->post('Jk')),
                'Kd_Fakultas'   => htmlspecialchars($Kode[0]),
                'Kd_Prodi'      => htmlspecialchars($Kode[1]),
                'Jenjang'       => htmlspecialchars($this->input->post('Pendidikan')),
                'Tgl_Update'    => date('Y-m-d H:i:s'),
                'User_Update'   => $this->session->userdata['logged_in']['id_user']
            ];

            $where = [
                'id'  => $this->input->post('id')
            ];

            $hasil = $this->sumberdayalppm_m->saveEdit($where, $data);

            if ($hasil == true) {
                $result['Msg']       = 'Data Berhasil Diubah . . .';
                $result['Status']    = true;
            } else {
                $result['Msg']       = $this->db->error()['message'];
                $result['Status']    = false;
            }
        }

        echo json_encode($result);
    }

    public function deleteData($id)
    {
        $query  = $this->sumberdayalppm_m->deleteId($id);

        if ($query == true) {
            $result['Msg']      = 'Data Berhasil Di Hapus . . .';
            $result['Status']   = true;
        } else {
            $result['Msg']      = $this->db->error()['message'];
            $result['Status']   = false;
        }

        echo json_encode($result);
    }

    public function getEditDosen()
    {
        $id     = $this->input->post('id');
        $data   = $this->sumberdayalppm_m->getEditDosen($id);

        echo json_encode($data);
    }

    public function getEditPegawai()
    {
        $id     = $this->input->post('id');
        $data   = $this->sumberdayalppm_m->getEditPegawai($id);

        echo json_encode($data);
    }
}
