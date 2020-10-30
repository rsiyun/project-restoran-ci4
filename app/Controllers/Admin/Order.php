<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Order extends BaseController
{
    public function index()
    {
        $conn = \Config\Database::connect();
        $builder = $conn->table('tblorder');
        $builder->orderBy('idorder', 'ASC');
        $sql = $builder->getCompiledSelect();
        $result = $conn->query($sql);
        $row = $result->getResult('array');
        foreach ($row as $key) {
            echo $key['tglorder'];
            echo '</br>';
        }
    }
}
