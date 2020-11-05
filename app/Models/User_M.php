<?php

namespace App\Models;

use CodeIgniter\Model;

class User_M extends Model
{
    protected $table = 'tbluser';
    protected $allowedFields = ['user', 'email', 'password', 'level', 'aktif'];
    protected $primaryKey = 'iduser';
    protected $validationRules  = [
        'user' => 'min_length[3]|is_unique[tbluser.user]',
        'email' => 'valid_email|is_unique[tbluser.user]'
    ];
    protected $validationMessages = [
        'user' => [
            'min_length' => '-sorry minimum user 3 letter numbers',
            'is_unique' => '-sorry user has been taken please choose another'
        ],
        'email' => [
            'valid_email' => '-Sorry email should be alphabet and number',
            'is_unique' => '-sorry email has been taken please choose another'
        ],
    ];
}
