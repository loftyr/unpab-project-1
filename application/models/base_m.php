<?php
defined('BASEPATH') or exit('No direct script access allowed');

class base_m extends CI_Model
{
    var $table      = 'Ref_Tahun'; /*Tabel Ref Tahun*/

    public function getTahun()
    {
        $this->db->from($this->table);
        $this->db->order_by('Tahun', 'DESC');
        return $this->db->get()->result();
    }

    //Get Count Dosen
    public function getData1($Tahun)
    {
        $this->db->from('ta_staff');
        $this->db->where('Role', 2);
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count Staff
    public function getData2($Tahun)
    {
        $this->db->from('ta_staff');
        $this->db->where('Role', 1);
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count Ristekdikti
    public function getData3($Tahun)
    {
        $this->db->from('ta_penelitian');
        $this->db->where('Source', 1);
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count Internal
    public function getData4($Tahun)
    {
        $this->db->from('ta_penelitian');
        $this->db->where('Source', 2);
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count Internal
    public function getData7($Tahun)
    {
        $this->db->from('ta_penelitian');
        $this->db->where('Source', 3);
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count Ristekdikti
    public function getData5($Tahun)
    {
        $this->db->from('ta_pengabdian');
        $this->db->where('Source', 1);
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count Internal
    public function getData6($Tahun)
    {
        $this->db->from('ta_pengabdian');
        $this->db->where('Source', 2);
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count Fasilita PPM
    public function getData8($Tahun)
    {
        $this->db->where('Tahun', $Tahun);
        $this->db->from('ta_fasilitas_pendukung');
        return $this->db->get()->num_rows();
    }

    //Get Count Karya Ilmiah
    public function getData9($Tahun)
    {
        $this->db->from('ta_karyailmiah');
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count Publikasi Jurnal
    public function getData10($Tahun)
    {
        $this->db->from('ta_jurnal');
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count Buku
    public function getData11($Tahun)
    {
        $this->db->from('ta_buku');
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count HKI
    public function getData12($Tahun)
    {
        $this->db->from('ta_hki');
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }

    //Get Count HKI
    public function getData13($Tahun)
    {
        $this->db->from('ta_kerjasama');
        $this->db->where('Tahun', $Tahun);
        return $this->db->get()->num_rows();
    }
}
