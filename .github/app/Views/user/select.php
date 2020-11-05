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
    <div class="col-3">
        <a class="btn btn-primary" href="<?= base_url('/admin/user/create') ?>">Tambah Data</a>
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
                <th class="text-center">User</th>
                <th class="text-center">Email</th>
                <th class="text-center">Level</th>
                <th class="text-center">Status</th>
                <th colspan="2" class="text-center">Aksi</th>
            </tr>
            <?php $no; ?>
            <?php foreach ($users as $cat => $value) : ?>
                <td><?= $no++; ?></td>
                <td><?= $value['user']; ?></td>
                <td><?= $value['email']; ?></td>
                <td><?= $value['level']; ?></td>
                <?php
                if ($value['aktif'] == 1) {
                    $aktif = 'Aktif';
                } else {
                    $aktif = 'Banned';
                }

                ?>
                <td class="text-center">
                    <a class="btn btn-primary" href="<?= base_url() ?>/admin/user/update/<?= $value['iduser'] ?>/<?= $value['aktif'] ?>"><?= $aktif ?></a>
                </td>
                <td>
                    <form class="text-center" action="user/<?= $value['iduser'] ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button onclick="return confirm('apakah anda yakin ?');" type="submit" class="btn btn-danger"><img src="<?= base_url('/icon/trash.svg') ?>" alt="sampah"></button>
                    </form>
                </td>
                <td class="text-center"><a class="btn btn-warning" href="<?= base_url() ?>/admin/user/find/<?= $value['iduser'] ?>"><img src="<?= base_url('/icon/pencil.svg') ?>" alt="pencil"></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?= $pager->links('group1', 'bootstrap') ?>
    </div>
</div>
<?= $this->endSection(); ?>