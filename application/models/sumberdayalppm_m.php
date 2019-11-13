<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sumberdayalppm_m extends CI_Model
{
    var $table      = 'ta_staff'; /*Tabel Ta Staff*/
    var $table2     = 'ref_programstudi';

    public function getDataPegawai($tahun)
    { //get all Data Staff
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Role', '1'); // Role 1 => Pegawai
        return $this->db->get()->result();
    }

    public function getDataDosen($tahun)
    { //get all Data
        $this->db->select('A.id, A.Tahun, A.Nidn, A.Nama, A.Jk, A.Jenjang, A.Kd_Fakultas, A.Kd_Prodi, B.Nama_Prodi');
        $this->db->from($this->table . ' A');
        $this->db->join($this->table2 . ' B', ' A.Kd_Fakultas = B.Kd_Fakultas AND A.Kd_Prodi = B.Kd_Prodi', 'INNER');
        $this->db->where('A.Tahun', $tahun);
        $this->db->where('A.Role', '2'); //Role 2 => Dosen
        $this->db->group_by('A.id, A.Tahun, A.Nidn, A.Nama, A.Jk, A.Jenjang, A.Kd_Fakultas, A.Kd_Prodi, B.Nama_Prodi');
        return $this->db->get()->result();
    }

    public function getEditDosen($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $this->db->where('Role', '2'); // Role 2 => Dosen
        return $this->db->get()->result();
    }

    public function getEditPegawai($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $this->db->where('Role', '1'); // Role 2 => Dosen
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
        $this->db->where('id', $id);
        $query = $this->db->delete($this->table);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}
