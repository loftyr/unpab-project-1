<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sumberdayalppm_m extends CI_Model
{
    var $table      = 'Ta_Staff'; /*Tabel Ta Staff*/

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
}
