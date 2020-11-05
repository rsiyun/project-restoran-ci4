<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User_M;

class User extends BaseController
{
    protected $userModel, $pager;
    public function __construct()
    {
        $this->userModel = new User_M();
        $this->pager = \Config\Services::pager();
    }

    public function index()
    {
        $data = [
            'title' => 'Aplikasi|User',
            'judul' => 'Data User',
            'users' => $this->userModel->paginate(3, 'group1'),
            'pager' => $this->userModel->pager,

        ];
        return view('user/select', $data);
    }
    public function find($id = null)
    {
        $user = $this->userModel->find($id);
        $data = [
            'title' => 'Aplikasi | Update',
            'judul' => 'UPDATE',
            'user' => $user,
            'level' => ['Admin', 'Koki', 'Kasir', 'Gudang']
        ];
        return view('user/update', $data);
    }
    public function ubah()
    {
        $id = $_POST['iduser'];
        $data = [
            'email' => $this->request->getPost('email'),
            'level' => $this->request->getPost('level'),
        ];
        $this->userModel->update($id, $data);
        return redirect()->to(base_url("/admin/user"));
    }
    public function create()
    {
        $data = [
            'title' => 'Aplikasi|User',
            'judul' => 'Tambah data User',
            'level' => ['Admin', 'Koki', 'Kasir', 'Gudang']
        ];
        return view('user/insert', $data);
    }
    public function insert()
    {
        if (isset($_POST['password'])) {
            $password = $this->request->getPost('password');
            $data = [
                'user' => $this->request->getPost('user'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'level' => $this->request->getPost('level'),
                'aktif' => 1
            ];
            if ($this->userModel->insert($data) === false) {
                $error = $this->userModel->errors();
                session()->setFlashdata('pesan', $error);
                return redirect()->to(base_url("/admin/user/create"));
            } else {
                session()->setFlashdata('berhasil', 'data berhasil di tambahkan');
                return redirect()->to(base_url("/admin/user"));
            }
        }
    }
    public function delete($id = null)
    {
        $this->userModel->delete($id);
        return redirect()->to(base_url("/admin/user"));
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
        $this->userModel->update($id, $data);
        return redirect()->to(base_url("/admin/user"));
    }
}
