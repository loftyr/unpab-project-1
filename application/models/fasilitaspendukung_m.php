<?php
defined('BASEPATH') or exit('No direct script access allowed');

class fasilitaspendukung_m extends CI_Model
{
    var $table      = 'ta_fasilitas_pendukung'; /*Tabel Ta Penelitian*/
    var $table2     = 'ta_anggota_Penelitian';
    var $table3     = 'ta_tim_pendukung';

    public function getData($tahun)
    { //get all Data Staff
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
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

    public function deleteId($id)
    {
        $this->db->where('Id', $id);
        $query = $this->db->delete($this->table);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}
