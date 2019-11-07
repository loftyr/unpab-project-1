<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hki_m extends CI_Model
{
    var $table      = 'ta_hki'; /*Tabel Ta */
    var $table2     = 'ta_hak_hki';

    public function getData($tahun)
    { //get all Data
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        return $this->db->get()->result();
    }

    public function getDataEdit($id)
    { //get Data
        $this->db->from($this->table);
        $this->db->where('Id_Hki', $id);
        return $this->db->get()->result();
    }

    public function getPencipta($Id_Hki)
    { //get Data
        $this->db->from($this->table2);
        $this->db->where('Id_Hki', $Id_Hki);
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
        $this->db->where('Id_Hki', $id);
        $query = $this->db->delete($this->table);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function deleteId2($id)
    {
        $this->db->where('Id', $id);
        $query = $this->db->delete($this->table2);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}
