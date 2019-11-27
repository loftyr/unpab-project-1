<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard_m extends CI_Model
{
    var $table      = 'ap_user';

    public function getUser()
    {
        $this->db->from($this->table);
        $this->db->where('Level !=', 'sa');
        return $this->db->get()->result();
    }

    public function getEditUser($Id)
    {
        $this->db->from($this->table);
        $this->db->where('id_user', $Id);
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
