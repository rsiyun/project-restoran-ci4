<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Order extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $conn = \Config\Database::connect();
        $sql = "SELECT * FROM vorder";
        $result = $conn->query($sql);
        $row = $result->getResult('array');
        $total = count($row);
        $tampil = 3;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $mulai = ($tampil * $page) - $tampil;
            $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai,$tampil";
            $result = $conn->query($sql);
            $row = $result->getResult('array');
        } else {
            $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT 0,$tampil";
            $result = $conn->query($sql);
            $row = $result->getResult('array');
        }
        $data = [
            'title' => 'Aplikasi|Order',
            'judul' => 'Data Order',
            'orders' => $row,
            'pager' => $pager,
            'tampil' => $tampil,
            'total' => $total
        ];
        return view('order/select', $data);
    }
    public function find($id = null)
    {
        $conn = \Config\Database::connect();
        $sql = "SELECT * FROM vorder WHERE idorder=$id";
        $result = $conn->query($sql);
        $order = $result->getResult('array');
        $sql = "SELECT * FROM vorderdetail WHERE idorder=$id";
        $result = $conn->query($sql);
        $detail = $result->getResult('array');
        $data = [
            'title' => 'Aplikasi|Pembayaran',
            'judul' => 'Pembayaran beli',
            'orders' => $order,
            'details' => $detail
        ];
        echo view('order/update', $data);
    }
    public function update()
    {
        $conn = \Config\Database::connect();
        $bayar = $_POST['bayar'];
        $total = $_POST['total'];
        $idorder = $_POST['idorder'];
        if ($bayar < $total) {
            session()->setFlashdata('pesan', 'Pembayaran Anda Kurang');
            $this->find($idorder);
        } else {
            $kembali = $bayar - $total;
            $sql = "UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder=$idorder";
            $conn->query($sql);
            return redirect()->to(base_url('/admin/order'));
        }
    }
}
