<?php
defined('BASEPATH') or exit('No direct script access allowed');

class fasilitaspendukung_m extends CI_Model
{
    var $program    = 'ref_programstudi';
    var $staff      = 'ta_fasilitas_pendukung';
    var $table      = 'ta_penelitian'; /*Tabel Ta Penelitian*/
    var $table2     = 'ta_anggota_Penelitian';
    var $table3     = 'ta_tim_pendukung';

    public function getData($tahun)
    { //get all Data Staff
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        return $this->db->get()->result();
    }
}
