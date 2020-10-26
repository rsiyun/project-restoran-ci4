<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h1><?= $judul ?></h1>
<form action="<?= base_url() ?>/admin/kategori/update" method="post">
    kategori: <input type="text" name="kategori" value="<?= $kategori['kategori']; ?>" autocomplete="off" required>
    <br>
    keterangan: <input type="text" name="keterangan" value="<?= $kategori['keterangan']; ?>" autocomplete="off" required>
    <br>
    <input type="hidden" name="idkategori" value="<?= $kategori['idkategori']; ?>">
    <button type="submit" class="btn btn-primary">Ubah Data</button>
</form>
<?= $this->endSection(); ?>