<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<a class="btn btn-primary" href="<?= base_url('/admin/kategori/create') ?>">Tambah Data</a>
<h1><?= $judul ?></h1>
<?php if (session()->getFlashdata('berhasil')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('berhasil') ?>
    </div>

<?php endif; ?>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Keterangan</th>
        <th colspan="2">aksi</th>
    </tr>
    <?php $no = 1 + (3 * ($currentPage - 1)); ?>
    <?php foreach ($kategori as $cat => $value) : ?>
        <td><?= $no++; ?></td>
        <td><?= $value['kategori']; ?></td>
        <td><?= $value['keterangan']; ?></td>
        <td><a class="btn btn-danger" href="<?= base_url() ?>/admin/kategori/delete/<?= $value['idkategori'] ?>" onclick="return confirm('apakah anda yakin ?');">Hapus</a></td>
        <td><a class="btn btn-warning" href="<?= base_url() ?>/admin/kategori/find/<?= $value['idkategori'] ?>">Ubah</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $pager->links('group1', 'bootstrap'); ?>
<?= $this->endSection(); ?>