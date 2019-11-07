<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyailmiah_m extends CI_Model
{
    var $table      = 'ta_karyailmiah'; /*Tabel Ta */
    var $table2     = 'ta_penulis_ilmiah'; /*Tabel Ta */

    public function getData($tahun)
    { //get all Data 
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        return $this->db->get()->result();
    }

    public function getPenulis($Id_Karya)
    { //get all Data 
        $this->db->from($this->table2);
        $this->db->where('Id_Karya', $Id_Karya);
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

    public function deleteId($id)
    {
        $this->db->where('Id_Karya', $id);
        $query = $this->db->delete($this->table);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}
