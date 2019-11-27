<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kerjasama_m extends CI_Model
{
    var $table      = 'ta_kerjasama'; /*Tabel Ta */

    // public function getData($tahun)
    // { //get all Data
    //     $this->db->from($this->table);
    //     $this->db->where('Tahun', $tahun);
    //     return $this->db->get()->result();
    // }

    public function getDataMemo($tahun)
    { //get all Data
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Source', '1'); // MoU/MoA
        return $this->db->get()->result();
    }

    public function getEditMemo($Id)
    { //get all Data
        $this->db->from($this->table);
        $this->db->where('Id', $Id);
        $this->db->where('Source', '1'); // MoU/MoA
        return $this->db->get()->result();
    }

    public function getDataHasil($tahun)
    { //get all Data
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Source', '2'); // Hasil Riset
        return $this->db->get()->result();
    }

    public function getEditHasil($Id)
    { //get all Data
        $this->db->from($this->table);
        $this->db->where('Id', $Id);
        $this->db->where('Source', '2'); // Hasil Riset
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

    public function saveEditData($where, $data)
    {
        $query = $this->db->update($this->table, $data, $where);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function deleteId($Id)
    {
        $this->db->where('Id', $Id);
        $query = $this->db->delete($this->table);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}
