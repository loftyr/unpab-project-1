<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengabdian_m extends CI_Model
{
    var $program    = 'ref_programstudi';
    var $staff      = 'ta_staff';
    var $table      = 'ta_pengabdian'; /*Tabel Ta Pengabdian*/
    var $table2     = 'ta_anggota_pengabdian';
    var $table3     = 'ta_pendukung_pengabdian';

    public function getDataRistekdikti($tahun)
    { //get all Data 
        $this->db->select('A.Kd_Pengabdian, A.Tahun, A.Judul, A.Sumber_Dana, A.Dana, A.Dokumen, B.Nama_Prodi');
        $this->db->from($this->table . ' A');
        $this->db->join($this->program . ' B', ' A.Kd_Fakultas = B.Kd_Fakultas AND A.Kd_Prodi = B.Kd_Prodi', 'INNER');
        $this->db->where('A.Tahun', $tahun);
        $this->db->where('A.Source', '1'); // Pengabdian Ristekdikti
        return $this->db->get()->result();
    }

    public function getDataInternal($tahun)
    { //get all Data 
        $this->db->select('A.Kd_Pengabdian, A.Tahun, A.Judul, A.Sumber_Dana, A.Dana, A.Dokumen, B.Nama_Prodi');
        $this->db->from($this->table . ' A');
        $this->db->join($this->program . ' B', ' A.Kd_Fakultas = B.Kd_Fakultas AND A.Kd_Prodi = B.Kd_Prodi', 'INNER');
        $this->db->where('A.Tahun', $tahun);
        $this->db->where('A.Source', '2'); // Pengabdian Internal
        return $this->db->get()->result();
    }

    public function getEditRistekdikti($Kd_Pengabdian)
    { //get all Data 
        $this->db->from($this->table);
        $this->db->where('Kd_Pengabdian', $Kd_Pengabdian);
        $this->db->where('Source', '1'); // Pengabdian Ristekdikti
        return $this->db->get()->result();
    }

    public function getEditInternal($Kd_Pengabdian)
    { //get all Data 
        $this->db->from($this->table);
        $this->db->where('Kd_Pengabdian', $Kd_Pengabdian);
        $this->db->where('Source', '2'); // Pengabdian Internal
        return $this->db->get()->result();
    }

    public function getEditAnggota($No_Id)
    { //get all Data 
        $this->db->from($this->table2);
        $this->db->where('No_Id', $No_Id);
        return $this->db->get()->result();
    }

    public function getEditPendukung($No_Id)
    { //get all Data 
        $this->db->from($this->table3);
        $this->db->where('No_Id', $No_Id);
        return $this->db->get()->result();
    }

    public function deleteId($Kd_Pengabdian)
    {
        $this->db->where('Kd_Pengabdian', $Kd_Pengabdian);
        $query = $this->db->delete($this->table);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function deleteAnggota($No_Id)
    {
        $this->db->where('No_Id', $No_Id);
        $query = $this->db->delete($this->table2);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function deletePendukung($No_Id)
    {
        $this->db->where('No_Id', $No_Id);
        $query = $this->db->delete($this->table3);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function ceknidn($nidn)
    {
        $this->db->from($this->staff);
        $this->db->where('Nidn', $nidn);
        $this->db->where('Role', '2'); //Dosen
        return $this->db->get()->result();
    }

    public function getMaxid()
    {
        $this->db->select_max('No_Urut');
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    public function getProgramStudi()
    {
        $this->db->from($this->program);
        return $this->db->get()->result();
    }

    public function getAnggota($Kd_Pengabdian)
    {
        $this->db->from($this->table2);
        $this->db->where('Kd_Pengabdian', $Kd_Pengabdian);
        return $this->db->get()->result();
    }

    public function getPendukung($Kd_Pengabdian)
    {
        $this->db->from($this->table3);
        $this->db->where('Kd_Pengabdian', $Kd_Pengabdian);
        return $this->db->get()->result();
    }

    public function savePengabdian($data)
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

    public function saveAnggota($data)
    {
        $query  = $this->db->insert($this->table2, $data);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function saveEditAnggota($where, $data)
    {
        $query = $this->db->update($this->table2, $data, $where);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function savePendukung($data)
    {
        $query  = $this->db->insert($this->table3, $data);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function saveEditPendukung($where, $data)
    {
        $query = $this->db->update($this->table3, $data, $where);

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}
