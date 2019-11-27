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
    public function getData1()
    {
        $this->db->from('ta_staff');
        $this->db->where('Role', 2);
        return $this->db->get()->num_rows();
    }

    //Get Count Staff
    public function getData2()
    {
        $this->db->from('ta_staff');
        $this->db->where('Role', 1);
        return $this->db->get()->num_rows();
    }

    //Get Count Ristekdikti
    public function getData3()
    {
        $this->db->from('ta_penelitian');
        $this->db->where('Source', 1);
        return $this->db->get()->num_rows();
    }

    //Get Count Internal
    public function getData4()
    {
        $this->db->from('ta_penelitian');
        $this->db->where('Source', 2);
        return $this->db->get()->num_rows();
    }

    //Get Count Internal
    public function getData7()
    {
        $this->db->from('ta_penelitian');
        $this->db->where('Source', 3);
        return $this->db->get()->num_rows();
    }

    //Get Count Ristekdikti
    public function getData5()
    {
        $this->db->from('ta_pengabdian');
        $this->db->where('Source', 1);
        return $this->db->get()->num_rows();
    }

    //Get Count Internal
    public function getData6()
    {
        $this->db->from('ta_pengabdian');
        $this->db->where('Source', 2);
        return $this->db->get()->num_rows();
    }

    //Get Count Fasilita PPM
    public function getData8()
    {
        $this->db->from('ta_fasilitas_pendukung');
        return $this->db->get()->num_rows();
    }

    //Get Count Karya Ilmiah
    public function getData9()
    {
        $this->db->from('ta_karyailmiah');
        return $this->db->get()->num_rows();
    }

    //Get Count Publikasi Jurnal
    public function getData10()
    {
        $this->db->from('ta_jurnal');
        return $this->db->get()->num_rows();
    }

    //Get Count Buku
    public function getData11()
    {
        $this->db->from('ta_buku');
        return $this->db->get()->num_rows();
    }

    //Get Count HKI
    public function getData12()
    {
        $this->db->from('ta_hki');
        return $this->db->get()->num_rows();
    }

    //Get Count HKI
    public function getData13()
    {
        $this->db->from('ta_kerjasama');
        return $this->db->get()->num_rows();
    }
}
