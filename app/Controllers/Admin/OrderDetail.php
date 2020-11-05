<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderDetail_M;

class OrderDetail extends BaseController
{
    protected $model, $pager;
    public function __construct()
    {
        $this->pager = \Config\Services::pager();
        $this->model = new OrderDetail_M();
    }
    public function index()
    {
        $data = [
            'title' => 'Aplikasi|Select',
            'judul' => 'Daftar Rincian order',
            'orderdetail' => $this->model->paginate(3, 'group1'),
            'pager' => $this->model->pager
        ];
        return view('orderdetail/select', $data);
    }
    public function cari()
    {
        if (isset($_POST['awal'])) {
            $awal = $_POST['awal'];
            $akhir = $_POST['akhir'];
            $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$awal' AND '$akhir'";
            $conn = \Config\Database::connect();
            $result = $conn->query($sql);
            $detail = $result->getResult('array');
            $data = [
                'title' => 'cari',
                'judul' => 'search data',
                'orderdetail' => $detail
            ];
            return view('orderdetail/cari', $data);
        }
    }
}
