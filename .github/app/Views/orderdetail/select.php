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
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('/admin/orderdetail/cari') ?>" method="post">
                    <div class="form-group col-6 float-left">
                        <label for="awal">Awal:</label>
                        <input type="date" name="awal" id="awal" required class="form-control">
                    </div>
                    <div class="form-group col-6 float-left">
                        <label for="akhir">Akhir:</label>
                        <input type="date" name="akhir" id="akhir" required class="form-control">
                    </div>
                    <div class="form-group ml-3">
                        <button class="btn btn-primary" name="cari" type="Submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>


        <table class="table table-bordered">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tanggal Order</th>
                <th class="text-center">Menu</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Total</th>
            </tr>
            <?php $no; ?>
            <?php foreach ($orderdetail as $cat => $value) : ?>
                <td><?= $no++; ?></td>
                <td><?= $value['tglorder'] ?></td>
                <td><?= $value['menu']; ?></td>
                <td><?= $value['harga']; ?></td>
                <td><?= $value['jumlah']; ?></td>
                <td><?= $value['jumlah'] * $value['harga']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?= $pager->links('group1', 'bootstrap'); ?>
    </div>
</div>
<?= $this->endSection(); ?>