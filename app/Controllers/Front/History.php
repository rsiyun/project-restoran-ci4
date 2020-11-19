<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Order_M;
use App\Models\OrderDetail_M;

class History extends BaseController
{
    protected $modelOrder, $pager, $modelDetail;
    public function __construct()
    {
        $this->modelOrder = new Order_M();
        $this->modelDetail = new OrderDetail_M();
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        if (empty(session()->get('pelanggan'))) {
            return redirect()->to(base_url('/login'));
        }
        $email = session()->get('email');
        $order = $this->modelOrder->where('email', $email)->findAll();
        $jumlah = count($order);
        $tampil = 4;
        $mulai = 0;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $mulai = ($tampil * $page) - $tampil;
        }
        $order = $this->modelOrder->where('email', $email)->findAll($tampil, $mulai);
        $data = [
            'title' => 'FoodsApp',
            'judul' => 'History',
            'order' => $order,
            'pager' => $this->pager,
            'tampil' => $tampil,
            'total' => $jumlah

        ];
        return view('frontend/menu/history', $data);
    }
    public function detail($id = null)
    {
        if (empty(session()->get('pelanggan'))) {
            return redirect()->to(base_url('/login'));
        }
        $order = $this->modelDetail->where('idorder', $id)->findAll();
        $jumlah = count($order);
        $tampil = 4;
        $mulai = 0;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $mulai = ($tampil * $page) - $tampil;
        }
        $detail = $this->modelDetail->where('idorder', $id)->findAll($tampil, $mulai);
        $data = [
            'title' => 'FoodsApp',
            'judul' => 'Detail',
            'detail' => $detail,
            'pager' => $this->pager,
            'tampil' => $tampil,
            'total' => $jumlah
        ];
        return view('frontend/menu/detail', $data);
    }
}
