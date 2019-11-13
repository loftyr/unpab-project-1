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
}
