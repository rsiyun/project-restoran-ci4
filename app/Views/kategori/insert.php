<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h1>INSERT</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('pesan') ?>
    </div>
<?php endif; ?>
<form action="<?= base_url() ?>/admin/kategori/insert" method="post">
    kategori: <input type="text" name="kategori" autocomplete="off" required>
    <br>
    keterangan: <input type="text" name="keterangan" autocomplete="off" required>
    <br>
    <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
<?= $this->endSection(); ?>