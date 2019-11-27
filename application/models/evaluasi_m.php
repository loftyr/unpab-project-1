<?php
defined('BASEPATH') or exit('No direct script access allowed');

class evaluasi_m extends CI_Model
{

    public function getProdi($Tahun)
    {
        $this->db->select('*');
        $this->db->from('ref_programstudi');
        $this->db->where('Tahun', $Tahun);
        $this->db->order_by('Kd_Fakultas', 'DESC');
        return $this->db->get()->result();
    }

    // Penelitian
    public function getPeneDikti($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_penelitian');
        $this->db->where('Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('Kd_Prodi', $Kd_Prodi);
        $this->db->where('Skema', 'Hibah Dikti');
        return $this->db->count_all_results();
    }

    public function getPeneInternal($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_penelitian');
        $this->db->where('Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('Kd_Prodi', $Kd_Prodi);
        $this->db->where('Skema', 'Hibah Internal');
        return $this->db->count_all_results();
    }

    public function getPeneMandiri($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_penelitian');
        $this->db->where('Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('Kd_Prodi', $Kd_Prodi);
        $this->db->where('Skema', 'Mandiri');
        return $this->db->count_all_results();
    }


    // Pengabdian
    public function getPengDikti($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_pengabdian');
        $this->db->where('Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('Kd_Prodi', $Kd_Prodi);
        $this->db->where('Skema', 'Hibah Dikti');
        return $this->db->count_all_results();
    }

    public function getPengInternal($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_pengabdian');
        $this->db->where('Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('Kd_Prodi', $Kd_Prodi);
        $this->db->where('Skema', 'Hibah Internal');
        return $this->db->count_all_results();
    }

    public function getPengMandiri($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_pengabdian');
        $this->db->where('Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('Kd_Prodi', $Kd_Prodi);
        $this->db->where('Skema', 'Mandiri');
        return $this->db->count_all_results();
    }

    public function getBuku($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_buku A');
        $this->db->join('ta_staff B', 'A.Nidn = B.Nidn AND A.Tahun = B.Tahun', 'INNER');
        $this->db->where('B.Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('B.Kd_Prodi', $Kd_Prodi);
        return $this->db->count_all_results();
    }

    public function getHki($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_hak_hki A');
        $this->db->join('ta_staff B', 'A.Nidn = B.Nidn AND A.Tahun = B.Tahun', 'INNER');
        $this->db->where('B.Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('B.Kd_Prodi', $Kd_Prodi);
        return $this->db->count_all_results();
    }

    public function getJurnalInter($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_jurnal A');
        $this->db->join('ta_penulis_jurnal B', 'A.Kd_Jurnal = B.Kd_Jurnal', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('A.Publikasi', 'Jurnal Internasional');
        $this->db->where('C.Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('C.Kd_Prodi', $Kd_Prodi);
        return $this->db->count_all_results();
    }

    public function getJurnalNasional($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_jurnal A');
        $this->db->join('ta_penulis_jurnal B', 'A.Kd_Jurnal = B.Kd_Jurnal', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('A.Publikasi', 'Jurnal Nasional Terakreditasi');
        $this->db->where('C.Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('C.Kd_Prodi', $Kd_Prodi);
        return $this->db->count_all_results();
    }

    public function getJurnalTakTerakreditasi($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_jurnal A');
        $this->db->join('ta_penulis_jurnal B', 'A.Kd_Jurnal = B.Kd_Jurnal', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('A.Publikasi', 'Jurnal Nasional Tidak Terakreditasi');
        $this->db->where('C.Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('C.Kd_Prodi', $Kd_Prodi);
        return $this->db->count_all_results();
    }

    public function getKaryaInter($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_karyailmiah A');
        $this->db->join('ta_staff B', 'A.Nidn = B.Nidn AND A.Tahun = B.Tahun', 'INNER');
        $this->db->where('A.Publikasi', 'Tingkat Internasional');
        $this->db->where('B.Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('B.Kd_Prodi', $Kd_Prodi);
        return $this->db->count_all_results();
    }

    public function getKaryaNasional($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_karyailmiah A');
        $this->db->join('ta_staff B', 'A.Nidn = B.Nidn AND A.Tahun = B.Tahun', 'INNER');
        $this->db->where('A.Publikasi', 'Tingkat Nasional');
        $this->db->where('B.Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('B.Kd_Prodi', $Kd_Prodi);
        return $this->db->count_all_results();
    }

    public function getKaryaRegional($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->select('*');
        $this->db->from('ta_karyailmiah A');
        $this->db->join('ta_staff B', 'A.Nidn = B.Nidn AND A.Tahun = B.Tahun', 'INNER');
        $this->db->where('A.Publikasi', 'Tingkat Regional');
        $this->db->where('B.Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('B.Kd_Prodi', $Kd_Prodi);
        return $this->db->count_all_results();
    }

    public function getKegiatan($Kd_Fakultas, $Kd_Prodi)
    {
        $this->db->from('ta_kegiatan');
        $this->db->where('Kd_Fakultas', $Kd_Fakultas);
        $this->db->where('Kd_Prodi', $Kd_Prodi);
        return $this->db->count_all_results();
    }


    // ====================================== //

    public function getDosen($Tahun)
    {
        $this->db->from('ta_staff');
        $this->db->where('Tahun', $Tahun);
        $this->db->where('Role', '2');
        return $this->db->get()->result();
    }

    public function getDiriPeneDikti($Nidn)
    {
        $this->db->from('ta_penelitian A');
        $this->db->join('ta_anggota_penelitian B', 'A.Kd_Penelitian = B.Kd_Penelitian', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('B.Nidn', $Nidn);
        $this->db->where('B.Jabatan', 'Ketua');
        $this->db->where('A.Skema', 'Hibah Dikti');
        return $this->db->count_all_results();
    }

    public function getDiriPengDikti($Nidn)
    {
        $this->db->from('ta_pengabdian A');
        $this->db->join('ta_anggota_pengabdian B', 'A.Kd_Pengabdian = B.Kd_Pengabdian', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('B.Nidn', $Nidn);
        $this->db->where('B.Jabatan', 'Ketua');
        $this->db->where('A.Skema', 'Hibah Dikti');
        return $this->db->count_all_results();
    }

    public function getDiriPeneInter($Nidn)
    {
        $this->db->from('ta_penelitian A');
        $this->db->join('ta_anggota_penelitian B', 'A.Kd_Penelitian = B.Kd_Penelitian', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('B.Nidn', $Nidn);
        $this->db->where('B.Jabatan', 'Ketua');
        $this->db->where('A.Skema', 'Hibah Internal');
        return $this->db->count_all_results();
    }

    public function getDiriPengInter($Nidn)
    {
        $this->db->from('ta_pengabdian A');
        $this->db->join('ta_anggota_pengabdian B', 'A.Kd_Pengabdian = B.Kd_Pengabdian', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('B.Nidn', $Nidn);
        $this->db->where('B.Jabatan', 'Ketua');
        $this->db->where('A.Skema', 'Hibah Internal');
        return $this->db->count_all_results();
    }

    public function getDiriPeneMandiri($Nidn)
    {
        $this->db->from('ta_penelitian A');
        $this->db->join('ta_anggota_penelitian B', 'A.Kd_Penelitian = B.Kd_Penelitian', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('B.Nidn', $Nidn);
        $this->db->where('B.Jabatan', 'Ketua');
        $this->db->where('A.Skema', 'Mandiri');
        return $this->db->count_all_results();
    }

    public function getDiriPengMandiri($Nidn)
    {
        $this->db->from('ta_pengabdian A');
        $this->db->join('ta_anggota_pengabdian B', 'A.Kd_Pengabdian = B.Kd_Pengabdian', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('B.Nidn', $Nidn);
        $this->db->where('B.Jabatan', 'Ketua');
        $this->db->where('A.Skema', 'Mandiri');
        return $this->db->count_all_results();
    }

    public function getDiriBuku($Nidn)
    {
        $this->db->from('ta_buku A');
        $this->db->join('ta_staff B', 'A.Nidn = B.Nidn AND A.Tahun = B.Tahun', 'INNER');
        $this->db->where('B.Nidn', $Nidn);
        return $this->db->count_all_results();
    }

    public function getDiriHki($Nidn)
    {
        $this->db->from('ta_hki A');
        $this->db->join('ta_hak_hki B', 'A.Id_Hki = B.Id_Hki', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('B.Nidn', $Nidn);
        return $this->db->count_all_results();
    }

    public function getDiriJurnal($Nidn, $value)
    {
        $this->db->from('ta_jurnal A');
        $this->db->join('ta_penulis_jurnal B', 'A.Kd_Jurnal = B.Kd_Jurnal', 'INNER');
        $this->db->join('ta_staff C', 'B.Nidn = C.Nidn', 'INNER');
        $this->db->where('A.Publikasi', $value);
        $this->db->where('B.Nidn', $Nidn);
        return $this->db->count_all_results();
    }

    public function getDiriKarya($Nidn, $value)
    {
        $this->db->select('*');
        $this->db->from('ta_karyailmiah A');
        $this->db->join('ta_staff B', 'A.Nidn = B.Nidn AND A.Tahun = B.Tahun', 'INNER');
        $this->db->where('A.Publikasi', $value);
        $this->db->where('B.Nidn', $Nidn);
        return $this->db->count_all_results();
    }
}
