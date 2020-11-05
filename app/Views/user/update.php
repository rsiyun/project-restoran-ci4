<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col">
    <h1><?= $judul ?></h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-danger" role="alert">
            <?php
            $errors = session()->getFlashdata('pesan'); ?>
            <?php foreach ($errors as $error) : ?>
                <?= $error ?>
                <br>
            <?php endforeach; ?>

        </div>
    <?php endif; ?>
</div>
<div class="col-6">
    <form action="<?= base_url() ?>/admin/user/ubah" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?= $user['email'] ?>" autocomplete="off" required class="form-control" id="email">
        </div>
        <!-- <div class="form-group">
            <label for="confirm">Konfirmasi Password:</label>
            <input type="password" name="confirm" autocomplete="off" required class="form-control" id="confirm">
        </div> -->
</div>
<div class="col-3">
    <div class="form-group">
        <label for="opsi">Level:</label>
        <select id="opsi" class="custom-select" name="level" id="level" autofocus>
            <?php foreach ($level as $kategori => $value) : ?>
                <option <?= ($user['level'] == $value) ? "selected" : "" ?> value="<?= $value ?>"><?= $value ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="iduser" value="<?= $user['iduser']; ?>" id="menu">
    <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
</div>
<?= $this->endSection(); ?>