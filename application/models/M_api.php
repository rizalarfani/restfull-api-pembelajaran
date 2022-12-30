<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Api extends CI_Model
{
    public function getMahasiswa()
    {
        $this->db->select(
            'id,
            nama,
            email,
            alamat,
            date_created'
        );
        $results = $this->db->get('mahasiswa')->result();
        return $results;
    }
    public function getMahasiswaByNim($nim)
    {
        $this->db->select(
            '*'
        );
        $this->db->where('nim', $nim);
        $results = $this->db->get('mahasiswa')->row();
        return $results;
    }
    public function delete($nim)
    {
        $this->db->where('nim', $nim);
        $results = $this->db->delete('mahasiswa');
        return $results;
    }
    public function insertMahasiswa($data)
    {
        $inset = $this->db->insert('mahasiswa', $data);
        return $inset;
    }
}

/* End of file ModelName.php */
