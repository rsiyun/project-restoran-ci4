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
                            <th scope="col">Menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($detail)) { ?>
                            <?php foreach ($detail as $key) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $key['tglorder'] ?></td>
                                    <td><?= $key['menu'] ?></td>
                                    <td><?= $key['harga'] ?></td>
                                    <td><?= $key['jumlah'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } ?>
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