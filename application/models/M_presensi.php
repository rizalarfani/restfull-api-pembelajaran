<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_presensi extends CI_Model
{
    public function absen($data)
    {
        $insert = $this->db->insert('presensi', $data);
        return $insert;
    }
}
/* End of file M_presensi.php */
