<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class base_m extends CI_Model {
    var $table      = 'Ref_Tahun'; /*Tabel Ref Tahun*/

    public function getTahun(){
        $this->db->from($this->table);
        $this->db->order_by('Tahun', 'DESC');
        return $this->db->get()->result();
    }

}
