<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jurnal_m extends CI_Model
{
    var $table      = 'ta_jurnal'; /*Tabel Ta */
    var $table2     = 'ta_penulis_jurnal';

    public function getData($tahun)
    { //get all Data
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        return $this->db->get()->result();
    }

    public function getDataEdit($id)
    { //get Data
        $this->db->from($this->table);
        $this->db->where('Id', $id);
        return $this->db->get()->result();
    }

    public function getPenulis($Kd_Jurnal)
    { //get Data
        $this->db->from($this->table2);
        $this->db->where('Kd_Jurnal', $Kd_Jurnal);
        return $this->db->get()->result();
    }

    public function saveData($data)
    {
        $query  = $this->db->insert($this->table, $data);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function saveData2($data)
    {
        $query  = $this->db->insert($this->table2, $data);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function saveEdit($where, $data)
    {
        $query = $this->db->update($this->table, $data, $where);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function deleteId($id)
    {
        $this->db->where('Kd_Jurnal', $id);
        $query = $this->db->delete($this->table);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}
