<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (isset($_GET['page'])) {
    $jumlah = 3;
    $page = $_GET['page'];
    $no = ($page * $jumlah) - $jumlah + 1;
} else {
    $no = 1;
}
?>
<div class="row">
    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/menu/create') ?>">Tambah Data</a>
    </div>
    <div class="col">
        <h3><?= $judul ?></h3>
    </div>
</div>
<div class="row mt-2">
    <div class="col-6">
        <form action="<?= base_url('/admin/menu/read') ?>" method="get">
            <?= view_cell('\App\Controllers\Admin\Menu::option') ?>
        </form>
    </div>
</div>
<div class="row">
    <div class="col mt-2">
        <?php if (session()->getFlashdata('berhasil')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('berhasil') ?>
            </div>

        <?php endif; ?>

        <table class="table table-bordered">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Menu</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Gambar</th>
                <th colspan="2" class="text-center">Aksi</th>
            </tr>
            <?php $no; ?>
            <?php foreach ($menu as $cat => $value) : ?>
                <td><?= $no++; ?></td>
                <td><?= $value['menu']; ?></td>
                <td><?= $value['harga']; ?></td>
                <td><img style="width: 100px;" src="<?= base_url() ?>/upload/<?= $value['gambar'] ?>" alt="gambar"></td>
                <td>
                    <form action="menu/<?= $value['idmenu'] ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button onclick="return confirm('apakah anda yakin ?');" type="submit" class="btn btn-danger"><img src="<?= base_url('/icon/trash.svg') ?>" alt="sampah"></button>
                        <!-- <td><a class="btn btn-danger" href="<?= base_url() ?>/admin/menu/delete/<?= $value['idmenu'] ?>" onclick="return confirm('apakah anda yakin ?');"></a></td> -->
                    </form>
                </td>
                <td><a class="btn btn-warning" href="<?= base_url() ?>/admin/menu/find/<?= $value['idmenu'] ?>"><img src="<?= base_url('/icon/pencil.svg') ?>" alt="sampah"></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?= $pager->makeLinks(1, $tampil, $total, 'bootstrap') ?>
    </div>
</div>
<?= $this->endSection(); ?>