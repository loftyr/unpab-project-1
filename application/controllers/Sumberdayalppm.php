<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sumberdayalppm extends CI_Controller
{

    // Create 25-Oktober-2019

    public function index()
    {
        $dataheader['judul']    = 'Sumber Daya Staf Pendukung LPPM';
        $dataheader['css']      = 'sumberdaya-style.css'; // 
        $datafooter['js']       = 'sumberdaya-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/sumberdaya_v', $data);
        $this->load->view('templates/footer', $datafooter);
    }

    public function getData($tahun)
    {
        $data   = $this->sumberdayalppm_m->getData($tahun);
        $no     = 1;
        foreach ($data as $value) {
            echo '
                <tr>
                  <td>' . $no++ . '</td>
                  <td>' . $value->Nidn . '</td>
                  <td>' . $value->Nama . '</td>
                  <td>' . $value->JenisKelamin . '</td>
                  <td>' . $value->Jabatan . '</td>
                  <td>' . $value->UnitKerja . '</td>
                  <td>' . $value->JenjangPendidikan . '</td>
                </tr>
            ';
        }
    }

    public function save()
    {
        $this->form_validation->set_rules('Nidn', 'Nidn', 'required');
        $this->form_validation->set_rules('Nama', 'Nama', 'required');
        $this->form_validation->set_rules('Jk', 'Jk', 'required');
        $this->form_validation->set_rules('Jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('JenjangPendidikan', 'JenjangPendidikan', 'required');

        if ($this->form_validation->run() == false) {
            $result['Msg']          = 'Data Belum Lengkap !!!';
            $result['Status']       = false;
        } else {
            $data = [
                'Tahun'             => htmlspecialchars($this->input->post('Tahun')),
                'Nidn'              => htmlspecialchars($this->input->post('Nidn')),
                'Nama'              => $this->input->post('Nama'),
                'JenisKelamin'      => htmlspecialchars($this->input->post('Jk')),
                'Jabatan'           => htmlspecialchars($this->input->post('Jabatan')),
                'UnitKerja'         => htmlspecialchars($this->input->post('UnitKerja')),
                'JenjangPendidikan' => htmlspecialchars($this->input->post('JenjangPendidikan'))
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
}
