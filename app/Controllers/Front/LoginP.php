<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;

class LoginP extends BaseController
{
    protected $pelangganModel, $pager;
    public function __construct()
    {
        $this->pelangganModel = new Pelanggan_M();
    }

    public function index()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $user = $this->pelangganModel->where(['email' => $email, 'aktif' => 1])->first();
            if (empty($user)) {
                $data['info'] = "Undifined:user";
            } else {
                $this->setSession($user);
                return redirect()->to(base_url('/'));
                if (password_verify($password, $user['password'])) {
                    $this->setSession($user);
                    return redirect()->to(base_url('/'));
                } else {
                    $data['info'] = "password salah";
                }
            }
        }
        return view('frontend/layout/login', $data);
    }
    public function setSession($user)
    {
        $data = [
            'idpelanggan' => $user['idpelanggan'],
            'pelanggan' => $user['pelanggan'],
            'email' => $user['email'],
            'password' => $user['password'],
            'loggedIn' => true
        ];
        session()->set($data);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
