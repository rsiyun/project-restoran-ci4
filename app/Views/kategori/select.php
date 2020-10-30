<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
if (isset($_GET['page_group1'])) {
    $jumlah = 3;
    $page = $_GET['page_group1'];
    $no = ($page * $jumlah) - $jumlah + 1;
} else {
    $no = 1;
}
?>
<div class="row">
    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/kategori/create') ?>">Tambah Data</a>
    </div>
    <div class="col">
        <h3><?= $judul ?></h3>
    </div>
</div>

<div class="row">
    <div class="col">
        <?php if (session()->getFlashdata('berhasil')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('berhasil') ?>
            </div>

        <?php endif; ?>

        <table class="table table-bordered">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Keterangan</th>
                <th colspan="2" class="text-center">Aksi</th>
            </tr>
            <?php $no; ?>
            <?php foreach ($kategori as $cat => $value) : ?>
                <td><?= $no++; ?></td>
                <td><?= $value['kategori']; ?></td>
                <td><?= $value['keterangan']; ?></td>
                <td><a class="btn btn-danger" href="<?= base_url() ?>/admin/kategori/delete/<?= $value['idkategori'] ?>" onclick="return confirm('apakah anda yakin ?');"><img src="<?= base_url('/icon/trash.svg') ?>" alt="sampah"></a></td>
                <td class="text-center"><a class="btn btn-warning" href="<?= base_url() ?>/admin/kategori/find/<?= $value['idkategori'] ?>"><img src="<?= base_url('/icon/pencil.svg') ?>" alt="pencil"></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?= $pager->links('group1', 'bootstrap'); ?>
    </div>
</div>
<?= $this->endSection(); ?>