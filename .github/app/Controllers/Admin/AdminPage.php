<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminPage extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('kategori/home', $data);
    }
}
