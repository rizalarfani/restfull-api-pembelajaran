<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Mahasiswa extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api', 'api');
    }

    public function index_get()
    {
        $nim = $this->uri->segment(3);
        if ($nim === null) {
            $getMahasiswa = $this->api->getMahasiswa();
            if ($getMahasiswa) {
                $this->response([
                    'status' => true,
                    'message' => 'Data ditemukan!!',
                    'data' => $getMahasiswa,
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 200);
            }
        } else {
            $getMahasiswaByNim = $this->api->getMahasiswaByNim($nim);
            if ($getMahasiswaByNim) {
                $this->response([
                    'status' => true,
                    'message' => 'Data ditemukan!!',
                    'data' => $getMahasiswaByNim,
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 200);
            }
        }
    }

    public function create_post()
    {
        $nim = $this->post('nim');
        $nama = $this->post('nama');
        $email = $this->post('email');
        $alamat = $this->post('alamat');
        $insert = $this->api->insertMahasiswa(
            [
                'nim' => $nim,
                'nama' => $nama,
                'email' => $email,
                'alamat' => $alamat,
            ]
        );
        if ($insert) {
            $this->response([
                'status' => true,
                'message' => 'Tambah data mahasiswa berhasil',
            ]);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Tambah data mahasiswa Gagal!!',
            ]);
        }
    }

    public function delete_delete()
    {
        $nim = $this->uri->segment(4);
        $delete = $this->api->delete($nim);
        if ($delete) {
            $this->response([
                'status' => true,
                'message' => 'Data berhasil dihapus!!'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data gagal dihapus!!'
            ], 200);
        }
    }
}
