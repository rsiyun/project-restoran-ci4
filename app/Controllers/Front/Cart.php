<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Menu_M;

class Cart extends BaseController
{
    protected $modelOrder, $modelPelanggan;
    public function __construct()
    {
        $this->modelMenu = new Menu_M();
    }
    public function index($id = null)
    {
        $this->isi($id);
        if (empty(session()->get('pelanggan'))) {
            return redirect()->to(base_url('/login'));
        } else {
            foreach (session()->get() as $key => $value) {

                if ($key <> 'pelanggan' && $key <> 'email' && $key <> 'user' && $key <> 'level' && $key <> 'password' && $key <> 'loggedIn' && $key <> '_ci_previous_url' && $key <> '__ci_last_regenerate') {
                    $id = substr($key, 1);
                    $menu[] = $this->modelMenu->where('idmenu', $id)->findAll();
                    $jumlah[] = $value;
                }
            }
            if (!isset($menu)) {
                $menu = [];
                $jumlah = [];
            }
        }
        $data = [
            'title' => 'FoodsApp|Order',
            'judul' => 'Order Page',
            'menus' => $menu,
            'jumlah' => $jumlah
        ];
        echo view('frontend/menu/cart', $data);
    }
    public function isi($id)
    {
        if (session()->has('_' . $id)) {
            session()->set('_' . $id, session()->get('_' . $id));
        } else {
            session()->set('_' . $id, 1);
        }
    }
    public function tambah($id = null)
    {
        session()->set('_' . $id, session()->get('_' . $id) + 1);
        return redirect()->to(base_url('cart/keranjang'));
    }
    public function kurang($id = null)
    {
        $idgb = '_' . $id;
        session()->set('_' . $id, session()->get('_' . $id) - 1);
        if (session()->get('_' . $id) == 0) {
            session()->remove($idgb);
        }
        return redirect()->to(base_url('cart/keranjang'));
    }
    public function delete($id = null)
    {
        $idgb = '_' . $id;
        session()->remove($idgb);
        return redirect()->to(base_url('cart/keranjang'));
    }
}
