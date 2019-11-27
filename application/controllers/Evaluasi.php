<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi extends CI_Controller
{

    public function Prodi()
    {
        $dataheader['judul']    = 'Evaluasi';
        $dataheader['css']      = 'prodi-style.css'; // 
        $datafooter['js']       = 'prodi-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/prodi_v', $data);
        $this->load->view('templates/footerEvaluasi', $datafooter);
    }

    public function Diri()
    {
        $dataheader['judul']    = 'Evaluasi';
        $dataheader['css']      = 'prodi-style.css'; // 
        $datafooter['js']       = 'diri-script.js'; // 

        $data['Tahun']          = $this->base_m->getTahun();

        $this->load->view('templates/header', $dataheader);
        $this->load->view('page/diri_v', $data);
        $this->load->view('templates/footerEvaluasi', $datafooter);
    }

    public function getDiri($Tahun)
    {
        $data   = $this->evaluasi_m->getDosen($Tahun);
        foreach ($data as $value) {
            $Nidn    = $value->Nidn;

            $peneDikti      = $this->evaluasi_m->getDiriPeneDikti($Nidn);
            $peneInternal   = $this->evaluasi_m->getDiriPeneInter($Nidn);
            $peneMandiri    = $this->evaluasi_m->getDiriPeneMandiri($Nidn);
            $pengDikti      = $this->evaluasi_m->getDiriPengDikti($Nidn);
            $pengInternal   = $this->evaluasi_m->getDiriPengInter($Nidn);
            $pengMandiri    = $this->evaluasi_m->getDiriPengMandiri($Nidn);
            $Buku           = $this->evaluasi_m->getDiriBuku($Nidn);
            $Hki            = $this->evaluasi_m->getDiriHki($Nidn);
            $JunalInter     = $this->evaluasi_m->getDiriJurnal($Nidn, 'Jurnal Internasional');
            $JunalNasional  = $this->evaluasi_m->getDiriJurnal($Nidn, 'Jurnal Nasional');
            $JurnalTakTerakreditasi  = $this->evaluasi_m->getDiriJurnal($Nidn, 'Jurnal Nasional Terakreditasi');
            $KaryaIntern    = $this->evaluasi_m->getDiriKarya($Nidn, 'Tingkat Internasional');
            $KaryaNasional  = $this->evaluasi_m->getDiriKarya($Nidn, 'Tingkat Nasional');
            $KaryaRegional  = $this->evaluasi_m->getDiriKarya($Nidn, 'Tingkat Regional');
            $Kegiatan       = '0';

            echo '
            <tr>
                <td>' . $value->Nama . '</td>
                <td>' . $peneDikti . '</td>
                <td>' . $pengDikti . '</td>
                <td>' . $peneInternal . '</td>
                <td>' . $pengInternal . '</td>
                <td>' . $peneMandiri . '</td>
                <td>' . $pengMandiri . '</td>
                <td>' . $Buku . '</td>
                <td>' . $Hki . '</td>
                <td>' . $JunalInter . '</td>
                <td>' . $JunalNasional . '</td>
                <td>' . $JurnalTakTerakreditasi . '</td>
                <td>' . $KaryaIntern . '</td>
                <td>' . $KaryaNasional . '</td>
                <td>' . $KaryaRegional . '</td>
                <td>' . $Kegiatan . '</td>
            </tr>
            ';
        }
    }

    public function GetData($Tahun)
    {
        $data   = $this->evaluasi_m->getProdi($Tahun);
        foreach ($data as $value) {
            $Kd_Fakultas    = $value->Kd_Fakultas;
            $Kd_Prodi       = $value->Kd_Prodi;

            $peneDikti      = $this->evaluasi_m->getPeneDikti($Kd_Fakultas, $Kd_Prodi);
            $peneInternal   = $this->evaluasi_m->getPeneInternal($Kd_Fakultas, $Kd_Prodi);
            $peneMandiri    = $this->evaluasi_m->getPeneMandiri($Kd_Fakultas, $Kd_Prodi);
            $pengDikti      = $this->evaluasi_m->getPengDikti($Kd_Fakultas, $Kd_Prodi);
            $pengInternal   = $this->evaluasi_m->getPengInternal($Kd_Fakultas, $Kd_Prodi);
            $pengMandiri    = $this->evaluasi_m->getPengMandiri($Kd_Fakultas, $Kd_Prodi);
            $Buku           = $this->evaluasi_m->getBuku($Kd_Fakultas, $Kd_Prodi);
            $Hki            = $this->evaluasi_m->getHki($Kd_Fakultas, $Kd_Prodi);
            $JunalInter     = $this->evaluasi_m->getJurnalInter($Kd_Fakultas, $Kd_Prodi);
            $JunalNasional  = $this->evaluasi_m->getJurnalNasional($Kd_Fakultas, $Kd_Prodi);
            $JurnalTakTerakreditasi  = $this->evaluasi_m->getJurnalTakTerakreditasi($Kd_Fakultas, $Kd_Prodi);
            $KaryaIntern    = $this->evaluasi_m->getKaryaInter($Kd_Fakultas, $Kd_Prodi);
            $KaryaNasional  = $this->evaluasi_m->getKaryaNasional($Kd_Fakultas, $Kd_Prodi);
            $KaryaRegional  = $this->evaluasi_m->getKaryaRegional($Kd_Fakultas, $Kd_Prodi);
            $Kegiatan       = $this->evaluasi_m->getKegiatan($Kd_Fakultas, $Kd_Prodi);

            echo '
            <tr>
                <td>' . $value->Nama_Prodi . '</td>
                <td>' . $peneDikti . '</td>
                <td>' . $pengDikti . '</td>
                <td>' . $peneInternal . '</td>
                <td>' . $pengInternal . '</td>
                <td>' . $peneMandiri . '</td>
                <td>' . $pengMandiri . '</td>
                <td>' . $Buku . '</td>
                <td>' . $Hki . '</td>
                <td>' . $JunalInter . '</td>
                <td>' . $JunalNasional . '</td>
                <td>' . $JurnalTakTerakreditasi . '</td>
                <td>' . $KaryaIntern . '</td>
                <td>' . $KaryaNasional . '</td>
                <td>' . $KaryaRegional . '</td>
                <td>' . $Kegiatan . '</td>
            </tr>
            ';
        }
    }
}
