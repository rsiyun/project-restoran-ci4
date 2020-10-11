<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Menu extends BaseController
{
    public function index()
    {
        //return view('welcome_message');
        echo "belajar ci4";
    }
    public function select()
    {
        echo "<h2>untuk menampilkan data</h2>";
    }
    public function update($id = null)
    {
        echo "<h2>Untuk mengupdate data: $id</h2>";
    }
}
