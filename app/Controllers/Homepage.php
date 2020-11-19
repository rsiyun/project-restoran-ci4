<?php

namespace App\Controllers;

use App\Models\Kategori_M;
use App\Models\Menu_M;

class Homepage extends BaseController
{
	protected $modelMenu, $pager, $modelKategori;
	public function __construct()
	{
		$this->modelMenu = new Menu_M();
		$this->modelKategori = new Kategori_M();
		$this->pager = \Config\Services::pager();
	}
	public function index()
	{
		$menu = $this->modelMenu;
		$data = [
			'title' => 'FoodsApp',
			'judul' => 'Menu Page',
			'menus' => $menu->paginate(3, 'group1'),
			'pager' => $menu->pager
		];
		return view('frontend/menu/select', $data);
	}
	public function option()
	{
		$kategori = $this->modelKategori->findAll();
		$data = [
			'kategoris' => $kategori
		];
		return view('frontend/layout/option', $data);
	}
	public function read()
	{
		if (isset($_GET['idkategori'])) {
			$id = $_GET['idkategori'];
			$jumlah = $this->modelMenu->where('idkategori', $id)->findAll();
			$count = count($jumlah);
			$tampil = 3;
			$mulai = 0;
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				$mulai = ($tampil * $page) - $tampil;
			}
			$menu = $this->modelMenu->where('idkategori', $id)->findAll($tampil, $mulai);
			$data = [
				'title' => 'FoodsApp',
				'judul' => 'Daftar Menu',
				'menus' => $menu,
				'pager' => $this->pager,
				'tampil' => $tampil,
				'total' => $count

			];
			return view('frontend/menu/cari', $data);
		}
	}
}
