<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Presensi extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_presensi', 'presensi');
    }

    public function checkIn_post()
    {
        $nim = $this->post('nama');
        $status = $this->post('status');
        $tanggal_presensi = $this->post('tgl_presensi');
        $chek_in = $this->presensi->absen(
            [
                'nama' => $nim,
                'status' => $status,
                'tanggal_presensi' => $tanggal_presensi,
            ]
        );
        if ($chek_in) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil presensi'
            ]);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal absensi'
            ]);
        }
    }
}

/* End of file Controllername.php */
