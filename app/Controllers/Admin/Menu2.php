<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Menu2 extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Select|Menu'
        ];
        return view('menu/form', $data);
    }
    public function insert()
    {
        $file = $this->request->getFile('gambar');
        $nama = $file->getname();
        $file->move('./upload', $nama);
        echo $nama . " Sudah di upload";
    }
    public function option()
    {
        $model = new Kategori_M();
        $kategori = $model->findAll();
        $data = [
            'kategoris' => $kategori
        ];
        return view('layout/option', $data);
    }
}
