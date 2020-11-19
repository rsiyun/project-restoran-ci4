<?= $this->extend('frontend/layout/template'); ?>
<?= $this->section('content2'); ?>
<?php
if (isset($_GET['page'])) {
    $jumlah = 4;
    $page = $_GET['page'];
    $no = ($page * $jumlah) - $jumlah + 1;
} else {
    $no = 1;
}
?>
<link rel="stylesheet" href="<?= base_url('css/order.css') ?>">
<div class="jumbotron jumbotron-fluid forlogin">
    <div class="container">
        <h1 class="display-4"><span><?= $judul ?></span></h1>
        <h3 class="text-white ">Pembelian</h3>
    </div>
</div>
<section class="cart-area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Total</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($order as $key) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key['tglorder'] ?></td>
                                <td>Rp.<?= $key['total'] ?></td>
                                <td><a href="<?= base_url('history/detail/' . $key['idorder']) ?>" class="btn btn-primary">Detail</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="container mr-5 mb-4">
                    <?= $pager->makeLinks(1, $tampil, $total, 'bootstrap') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>