<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kegiatan_m extends CI_Model
{
    var $table      = 'ta_kegiatan'; /*Tabel Ta */

    public function getData($tahun)
    { //get all Data Staff
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        return $this->db->get()->result();
    }

    public function getDataPenelitian($tahun)
    { //get all Data Staff
        $this->db->select('A.Id, A.Tahun, A.Tingkat_Forum, A.Nama_Keg, A.Kd_Fakultas, A.Kd_Prodi, B.Nama_Prodi, A.Mitra, A.Tempat, A.Tgl_Start, A.Tgl_End, A.Narasumber');
        $this->db->from($this->table . ' A');
        $this->db->join('ref_programstudi B', 'A.Kd_Fakultas = B.Kd_Fakultas AND A.Kd_Prodi = B.Kd_Prodi', 'INNER');
        $this->db->where('A.Tahun', $tahun);
        $this->db->where('A.Source', '1');
        $this->db->group_by('A.Id, A.Tahun, A.Tingkat_Forum, A.Nama_Keg, A.Kd_Fakultas, A.Kd_Prodi, B.Nama_Prodi, A.Mitra, A.Tempat, A.Tgl_Start, A.Tgl_End, A.Narasumber');
        return $this->db->get()->result();
    }

    public function getEditPenelitian($Id)
    { //get all Data Staff
        $this->db->from($this->table);
        $this->db->where('Id', $Id);
        $this->db->where('Source', '1');
        return $this->db->get()->result();
    }

    public function getDataPengabdian($tahun)
    { //get all Data Staff
        $this->db->from($this->table);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Source', '2');
        return $this->db->get()->result();
    }

    public function getEditPengabdian($Id)
    { //get all Data Staff
        $this->db->from($this->table);
        $this->db->where('Id', $Id);
        $this->db->where('Source', '2');
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
