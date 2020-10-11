<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
    public function index()
    {
        echo "<h2> ini controller (adminKategori) method index</h2>";
    }
    public function select()
    {
        $model = new Kategori_M();
        $kategori = $model->findAll();
        $data = [
            'title' => 'Aplikasi|Select',
            'judul' => 'select data dari controller',
            'kategori' => $kategori
        ];
        return view('kategori/select', $data);
    }
    public function selectWhere($id = null)
    {
        echo "<h2> ini controller (adminKategori) method selectWhere : $id</h2>";
    }
    public function formInsert()
    {
        $data = [
            'title' => 'Aplikasi|forminsert',
        ];

        return view('kategori/forminsert', $data);
    }
    public function formUpdate($id = null)
    {
        $data = [
            'title' => 'Aplikasi|formupdate',
        ];
        return view('kategori/update', $data);
    }
    public function update($id = null)
    {
        echo "<h2> ini controller (adminKategori) method updatecuy: $id</h2>";
    }
    public function delete($id = null)
    {
        echo "<h2> ini controller (adminKategori) method delete</h2>";
    }
}
