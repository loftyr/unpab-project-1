<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hki_m extends CI_Model
{
    var $table      = 'ta_hki'; /*Tabel Ta */
    var $table2     = 'ta_hak_hki';

    //Develop
    // public function getData($tahun)
    // {
    //     $this->db->from($this->table);
    //     $this->db->where('Tahun', $tahun);
    //     return $this->db->get()->result();
    // }

    public function getDataPenelitian($tahun)
    { //get all Data
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Source', '1'); // Penelitian
        return $this->db->get()->result();
    }

    public function getDataPengabdian($tahun)
    { //get all Data
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Source', '2'); // Pengabdian
        return $this->db->get()->result();
    }

    //Develop
    // public function getDataEdit($id)
    // {
    //     $this->db->from($this->table);
    //     $this->db->where('Id_Hki', $id);
    //     return $this->db->get()->result();
    // }

    public function getEditPenelitian($id)
    { //get Data
        $this->db->from($this->table);
        $this->db->where('Id_Hki', $id);
        $this->db->where('Source', '1'); //Penelitian
        return $this->db->get()->result();
    }

    public function getEditPengabdian($id)
    { //get Data
        $this->db->from($this->table);
        $this->db->where('Id_Hki', $id);
        $this->db->where('Source', '2'); //Pengabdian
        return $this->db->get()->result();
    }

    public function getPencipta($Id_Hki)
    { //get Data
        $this->db->from($this->table2);
        $this->db->where('Id_Hki', $Id_Hki);
        return $this->db->get()->result();
    }

    public function getEditPencipta($Id)
    { //get Data
        $this->db->from($this->table2);
        $this->db->where('Id', $Id);
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


    public function saveEditData($where, $data)
    {
        $query = $this->db->update($this->table, $data, $where);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function saveEdit2($where, $data)
    {
        $query = $this->db->update($this->table2, $data, $where);

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
