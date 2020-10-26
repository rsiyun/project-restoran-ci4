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
    public function read()
    {
        $currentPage = $this->request->getVar('page_group1') ? $this->request->getVar('page_group1') : 1;
        $pager = \Config\Services::pager();
        $model = new Kategori_M();
        $data = [
            'title' => 'Aplikasi|Select',
            'judul' => 'select data',
            'kategori' => $model->paginate(3, 'group1'),
            'pager' => $model->pager,
            'currentPage' => $currentPage
        ];
        return view('kategori/select', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Aplikasi|forminsert',
        ];

        return view('kategori/insert', $data);
    }
    public function insert()
    {
        $model = new Kategori_M();
        if ($model->insert($_POST) === false) {
            $error = $model->errors();
            session()->setFlashdata('pesan', $error['kategori']);
            return redirect()->to(base_url("/admin/kategori/create"));
        } else {
            session()->setFlashdata('berhasil', 'data berhasil di tambahkan');
            return redirect()->to(base_url("/admin/kategori"));
        }
    }
    public function find($id = null)
    {
        $model = new Kategori_M();
        $kategori = $model->find($id);
        $data = [
            'title' => 'Aplikasi | find',
            'judul' => 'update data',
            'kategori' => $kategori
        ];
        return view('kategori/update', $data);
    }
    public function update()
    {
        $model = new Kategori_M();
        $model->save($_POST);
        return redirect()->to(base_url("/admin/kategori"));
    }
    public function delete($id = null)
    {
        $model = new Kategori_M();
        $model->delete($id);
        return redirect()->to(base_url("/admin/kategori"));
    }
}
