<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;

class Menu extends BaseController
{
    protected $modelMenu, $pager, $modelKategori;
    public function __construct()
    {
        $this->modelMenu = new Menu_M();
        $this->modelKategori = new Kategori_M();
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        $data = [
            'title' => 'Aplikasi|Select',
            'judul' => 'Daftar Menu',
            'menu' => $this->modelMenu->paginate(3, 'group1'),
            'pager' => $this->modelMenu->pager
        ];
        return view('menu/select', $data);
    }
    public function option()
    {
        $kategori = $this->modelKategori->findAll();
        $data = [
            'kategoris' => $kategori
        ];
        return view('layout/option', $data);
    }
    public function read()
    {
        if (isset($_GET['idkategori'])) {
            $id = $_GET['idkategori'];
            $jumlah = $this->modelMenu->where('idkategori', $id)->findAll();
            $count = count($jumlah);
            $tampil = 3;
            $mulai = 0;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $mulai = ($tampil * $page) - $tampil;
            }
            $menu = $this->modelMenu->where('idkategori', $id)->findAll($tampil, $mulai);
            $data = [
                'title' => 'Aplikasi|Select',
                'judul' => 'Daftar Menu',
                'menu' => $menu,
                'pager' => $this->pager,
                'tampil' => $tampil,
                'total' => $count

            ];
            return view('menu/cari', $data);
        }
    }
    public function delete($id = null)
    {
        $this->modelMenu->delete($id);
        return redirect()->to(base_url("/admin/menu"));
    }
    public function find($id = null)
    {
        $kategori = $this->modelKategori->findAll();
        $menu = $this->modelMenu->find($id);
        $data = [
            'title' => 'Aplikasi|Update',
            'judul' => 'Update',
            'menu' => $menu,
            'kategoris' => $kategori,
            'validation' => \Config\Services::validation()
        ];
        return view('menu/update', $data);
    }
    public function update()
    {
        $modelMenu = $this->modelMenu;
        $id = $this->request->getPost('idmenu');
        $file = $this->request->getFile('gambar');
        if (empty($nama)) {
            $nama = $this->request->getPost('gambar');
        } else {
            $nama = $file->getName();
            $file->move('./upload');
        }
        $data = [
            'idkategori' => $this->request->getPost('idkategori'),
            'menu' => $this->request->getPost('menu'),
            'gambar' => $nama,
            'harga' => $this->request->getPost('harga')
        ];
        if ($modelMenu->update($id, $data) === false) {
            $error = $modelMenu->errors();
            session()->setFlashdata('pesan', $error);
            return redirect()->to(base_url("/admin/menu/find/$id"));
        } else {
            session()->setFlashdata('berhasil', 'data berhasil di tambahkan');
            return redirect()->to(base_url("/admin/menu"));
        }
    }
    public function create()
    {
        $kategori = $this->modelKategori->findAll();
        $data = [
            'title' => 'Aplikasi|forminsert',
            'judul' => "INSERT",
            'kategoris' => $kategori
        ];

        return view('menu/insert', $data);
    }
    public function insert()
    {
        $modelMenu = $this->modelMenu;
        $file = $this->request->getFile('gambar');
        $nama = $file->getName();
        $data = [
            'idkategori' => $this->request->getPost('idkategori'),
            'menu' => $this->request->getPost('menu'),
            'harga' => $this->request->getPost('harga'),
            'gambar' => $nama
        ];

        if ($modelMenu->insert($data) === false) {
            $error = $modelMenu->errors();
            session()->setFlashdata('pesan', $error['menu']);
            return redirect()->to(base_url("/admin/menu/create"));
        } else {
            $file->move('./upload');
            session()->setFlashdata('berhasil', 'data berhasil di tambahkan');
            return redirect()->to(base_url("/admin/menu"));
        }
    }
}
