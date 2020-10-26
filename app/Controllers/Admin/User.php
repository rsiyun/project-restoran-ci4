<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    protected $session = null;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        echo "<h1>Hallo World</h1>";
    }
    public function create()
    {
        $tbluser = [
            'user'  => 'dimas',
            'email'     => 'johndoe@some-site.com',
            'level' => 'koki'

        ];

        $this->session->set($tbluser);
    }
    public function read()
    {

        echo $this->session->get('user');
        echo $this->session->get('email');
        echo $this->session->get('level');
    }
    public function destroy()
    {

        $this->session->destroy();
    }
    public function delete()
    {

        $this->session->remove('email');
    }
}
