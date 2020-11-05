<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;

class Pelanggan extends BaseController
{
    protected $modelPelanggan, $pager;
    public function __construct()
    {
        $this->modelPelanggan = new Pelanggan_M();
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        $modelPelanggan = new Pelanggan_M();
        $data = [
            'title' => 'Aplikasi|Pelanggan',
            'judul' => 'Daftar Pelanggan',
            'pelanggan' => $this->modelPelanggan->paginate(3, 'group1'),
            'pager' => $this->modelPelanggan->pager
        ];
        return view('pelanggan/select', $data);
    }
    public function delete($id = null)
    {
        $this->modelPelanggan->delete($id);
        return redirect()->to(base_url("/admin/pelanggan"));
    }
    public function update($id = null, $isi = 1)
    {
        if ($isi == 1) {
            $isi = 0;
        } else {
            $isi = 1;
        }
        $data = [
            'aktif' => $isi
        ];
        $this->modelPelanggan->update($id, $data);
        return redirect()->to(base_url("/admin/pelanggan"));
    }
}
