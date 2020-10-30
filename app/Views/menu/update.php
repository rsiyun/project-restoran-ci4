<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col">
    <h1><?= $judul ?></h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-danger" role="alert">
            <?php
            $error = session()->getFlashdata('pesan');
            foreach ($error as $key) {
                echo $key;
                echo "</br>";
            }
            ?>
        </div>
    <?php endif; ?>
</div>
<div class="col-6">
    <form action="<?= base_url() ?>/admin/menu/update" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="opsi">Kategori:</label>
            <select id="opsi" class="custom-select" name="idkategori" id="idkategori" autofocus>
                <?php foreach ($kategoris as $kategori => $value) : ?>
                    <option value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="menu">Menu:</label>
            <input type="text" name="menu" value="<?= $menu['menu']; ?>" autocomplete="off" required class="form-control" id="menu">
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="text" min="500" value="<?= $menu['harga']; ?>" name="harga" autocomplete="off" required class="form-control" id="harga">
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input name="gambar" type="file" class="custom-file-input" id="gambar">
                <label class="custom-file-label" for="gambar">Pilih Gambar Menu</label>
            </div>
        </div>
        <input type="hidden" name="gambar" required class="form-control" value="<?= $menu['gambar']; ?>">
        <input type="hidden" name="idmenu" required class="form-control" value="<?= $menu['idmenu']; ?>">
        <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
</div>
<?= $this->endSection(); ?>