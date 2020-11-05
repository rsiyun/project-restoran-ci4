<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h1>Upload Image</h1>
<?= view_cell('\App\Controllers\Admin\Menu::option') ?>
<form action="<?= base_url('/admin/menu/insert') ?>" method="post" enctype="multipart/form-data">
    Gambar: <input type="file" name="gambar" required>
    <br>
    <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
<?= $this->endSection(); ?>