<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;

class Daftar extends BaseController
{
    protected $modelPelanggan;
    public function __construct()
    {
        $this->modelPelanggan = new Pelanggan_M();
    }
    public function index()
    {
        $data = [
            'title' => 'Register Page',
            'judul' => 'Register Page',
            'validation' => \Config\Services::validation()
        ];
        return view('frontend/layout/daftar', $data);
    }
    public function create()
    {
        if (!$this->validate([
            'pelanggan' => [
                'rules' => 'required|is_unique[tblpelanggan.pelanggan]',
                'errors' => [
                    'is_unique' => 'Username Sudah terdaftar'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[tblpelanggan.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'is_unique' => 'Email Sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/front/daftar')->withInput()->with('validation', $validation);
        }
        $password = $this->request->getVar('password');
        $confirm = $this->request->getvar('kpassword');
        if ($password == $confirm) {
            $this->modelPelanggan->save([
                'pelanggan' => $this->request->getVar('pelanggan'),
                'alamat' => $this->request->getVar('alamat'),
                'penulis' => $this->request->getVar('penulis'),
                'telp' => $this->request->getVar('telp'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to('/login');
        } else {
            session()->setFlashdata('pesan', 'Password dan Konfirmasi Harus Sama');
            return redirect()->to('/front/daftar');
        }
    }
}
