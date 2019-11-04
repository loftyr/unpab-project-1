<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penelitian_m extends CI_Model
{
    var $program    = 'ref_programstudi';
    var $staff      = 'ta_staff';
    var $table      = 'ta_penelitian'; /*Tabel Ta Penelitian*/
    var $table2     = 'ta_anggota_Penelitian';
    var $table3     = 'ta_tim_pendukung';

    public function getData($tahun)
    { //get all Data Staff
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        return $this->db->get()->result();
    }

    public function ceknidn($nidn)
    {
        $this->db->from($this->staff);
        $this->db->where('Nidn', $nidn);
        return $this->db->get()->result();
    }

    public function getMaxid()
    {
        $this->db->select_max('No_Urut');
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    public function getProgramStudi()
    {
        $this->db->from($this->program);
        return $this->db->get()->result();
    }

    public function getAnggota($Kd_Penelitian)
    {
        $this->db->from($this->table2);
        $this->db->where('Kd_Penelitian', $Kd_Penelitian);
        return $this->db->get()->result();
    }

    public function getPendukung($Kd_Penelitian)
    {
        $this->db->from($this->table3);
        $this->db->where('Kd_Penelitian', $Kd_Penelitian);
        return $this->db->get()->result();
    }

    public function savePenelitian($data)
    {
        $query  = $this->db->insert($this->table, $data);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function saveAnggota($data)
    {
        $query  = $this->db->insert($this->table2, $data);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function savePendukung($data)
    {
        $query  = $this->db->insert($this->table3, $data);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}
