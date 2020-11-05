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
                <th class="text-center">pelanggan</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">email</th>
                <th class="text-center">Aksi</th>
                <th class="text-center">Status</th>
            </tr>
            <tr>
                <?php $no; ?>
                <?php foreach ($pelanggan as $cat => $value) : ?>
                    <td><?= $no++; ?></td>
                    <td><?= $value['pelanggan']; ?></td>
                    <td><?= $value['alamat']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td>
                        <form class="text-center" action="pelanggan/<?= $value['idpelanggan'] ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button onclick="return confirm('apakah anda yakin ?');" type="submit" class="btn btn-danger"><img src="<?= base_url('/icon/trash.svg') ?>" alt="sampah"></button>
                            <!-- <td><a class="btn btn-danger" href="<?= base_url() ?>/admin/pelanggan/delete/<?= $value['idpelanggan'] ?>" onclick="return confirm('apakah anda yakin ?');"></a></td> -->
                        </form>
                    </td>
                    <?php
                    if ($value['aktif'] == 1) {
                        $aktif = 'Aktif';
                    } else {
                        $aktif = 'Non Aktif';
                    }
                    ?>
                    <td class="text-center"><a class="btn btn-primary" href="<?= base_url() ?>/admin/pelanggan/update/<?= $value['idpelanggan'] ?>/<?= $value['aktif'] ?>"><?= $aktif ?></a></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <?= $pager->links('group1', 'bootstrap'); ?>
    </div>
</div>
<?= $this->endSection(); ?>