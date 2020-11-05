<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col">
    <h3><?= $judul ?></h3>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php endif; ?>
</div>
<div class="col-6">
    <form action="<?= base_url('/admin/kategori/insert') ?>" method="post">
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" name="kategori" autocomplete="off" required class="form-control" id="kategori">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <input type="text" name="keterangan" autocomplete="off" required class="form-control" id="keterangan">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>
<?= $this->endSection(); ?>