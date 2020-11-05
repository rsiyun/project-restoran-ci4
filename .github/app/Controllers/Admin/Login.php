<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User_M;

class Login extends BaseController
{
    protected $userModel, $pager;
    public function __construct()
    {
        $this->userModel = new User_M();
    }

    public function index()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $user = $this->userModel->where(['email' => $email, 'aktif' => 1])->first();
            if (empty($user)) {
                $data['info'] = "Undifined:user";
            } else {
                $this->setSession($user);
                return redirect()->to(base_url('/admin'));
                if (password_verify($password, $user['password'])) {
                    $this->setSession($user);
                    return redirect()->to(base_url('/admin'));
                } else {
                    $data['info'] = "password salah";
                }
            }
        }
        return view('layout/login', $data);
    }
    public function setSession($user)
    {
        $data = [
            'user' => $user['user'],
            'email' => $user['email'],
            'password' => $user['password'],
            'level' => $user['level'],
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
