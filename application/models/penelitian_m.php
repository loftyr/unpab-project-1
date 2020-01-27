<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penelitian_m extends CI_Model
{
    var $program    = 'ref_programstudi';
    var $staff      = 'ta_staff';
    var $table      = 'ta_penelitian'; /*Tabel Ta Penelitian*/
    var $table2     = 'ta_anggota_penelitian';
    var $table3     = 'ta_tim_pendukung';

    public function getDataRistekdikti($tahun)
    { //get all Data 
        $this->db->select('A.Kd_Penelitian, A.Tahun, A.Judul, A.Sumber_Dana, A.Dana, A.Dokumen, B.Nama_Prodi');
        $this->db->from($this->table . ' A');
        $this->db->join($this->program . ' B', ' A.Kd_Fakultas = B.Kd_Fakultas AND A.Kd_Prodi = B.Kd_Prodi', 'INNER');
        $this->db->where('A.Tahun', $tahun);
        $this->db->where('A.Source', '1'); // Penelitian Ristekdikti
        return $this->db->get()->result();
    }

    public function getDataInternal($tahun)
    { //get all Data 
        $this->db->select('A.Kd_Penelitian, A.Tahun, A.Judul, A.Sumber_Dana, A.Dana, A.Dokumen, B.Nama_Prodi');
        $this->db->from($this->table . ' A');
        $this->db->join($this->program . ' B', ' A.Kd_Fakultas = B.Kd_Fakultas AND A.Kd_Prodi = B.Kd_Prodi', 'INNER');
        $this->db->where('A.Tahun', $tahun);
        $this->db->where('A.Source', '2'); // Penelitian Internal
        return $this->db->get()->result();
    }

    public function getDataAsing($tahun)
    { //get all Data 
        $this->db->select('A.Kd_Penelitian, A.Tahun, A.Judul, A.Sumber_Dana, A.Dana, A.Dokumen, B.Nama_Prodi');
        $this->db->from($this->table . ' A');
        $this->db->join($this->program . ' B', ' A.Kd_Fakultas = B.Kd_Fakultas AND A.Kd_Prodi = B.Kd_Prodi', 'INNER');
        $this->db->where('A.Tahun', $tahun);
        $this->db->where('A.Source', '3'); // Penelitian Asing
        return $this->db->get()->result();
    }

    public function getEditRistekdikti($Kd_Penelitian)
    { //get all Data 
        $this->db->from($this->table);
        $this->db->where('Kd_Penelitian', $Kd_Penelitian);
        $this->db->where('Source', '1'); // Penelitian Ristekdikti
        return $this->db->get()->result();
    }

    public function getEditInternal($Kd_Penelitian)
    { //get all Data 
        $this->db->from($this->table);
        $this->db->where('Kd_Penelitian', $Kd_Penelitian);
        $this->db->where('Source', '2'); // Penelitian Internal
        return $this->db->get()->result();
    }

    public function getEditAsing($Kd_Penelitian)
    { //get all Data 
        $this->db->from($this->table);
        $this->db->where('Kd_Penelitian', $Kd_Penelitian);
        $this->db->where('Source', '3'); // Penelitian Asing
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

    public function deleteId($Kd_Penelitian)
    {
        $this->db->where('Kd_Penelitian', $Kd_Penelitian);
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

    public function cekjabatan($id)
    {
        $this->db->from('ta_anggota_penelitian');
        $this->db->where('Kd_Penelitian', $id);
        $this->db->where('Jabatan', 'Ketua'); //Dosen
        return $this->db->get()->result();
    }

    public function ceknik($nik)
    {
        $this->db->from($this->staff);
        $this->db->where('Nip', $nik);
        $this->db->where('Role', '1'); //Pegawai
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

    public function getAnggota($Kd_Penelitian)
    {
        $this->db->from($this->table2);
        $this->db->where('Kd_Penelitian', $Kd_Penelitian);
        return $this->db->get()->result();
    }

    public function getPendukung($Kd_Penelitian)
    {
        $this->db->from($this->table3);
        $this->db->where('Kd_Penelitian', $Kd_Penelitian);
        return $this->db->get()->result();
    }

    public function savePenelitian($data)
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
