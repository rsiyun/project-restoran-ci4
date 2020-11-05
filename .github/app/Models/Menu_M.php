<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu_M extends Model
{
    protected $table = 'tblmenu';
    protected $allowedFields = ['idkategori', 'menu', 'gambar', 'harga'];
    protected $primaryKey = 'idmenu';
    protected $validationRules  = [
        'menu' => 'min_length[3]|is_unique[tblmenu.menu]',
        'harga' => 'numeric'
    ];
    protected $validationMessages = [
        'menu' => [
            'min_length' => '-sorry minimum menu 3 letter numbers',
            'is_unique' => '-sorry menu has been taken please choose another'
        ],
        'harga' => [
            'numeric' => '-Sorry harga should be number'
        ],
    ];
}
