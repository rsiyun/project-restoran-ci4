<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php
if (isset($_GET['page'])) {
    $jumlah = 3;
    $page = $_GET['page'];
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
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>ID Order</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
                <th>Status</th>
            </tr>
            <tr>
                <?php $no; ?>
                <?php foreach ($orders as $order => $value) : ?>
                    <td><?= $no++; ?></td>
                    <td><?= $value['idorder']; ?></td>
                    <td><?= $value['pelanggan']; ?></td>
                    <td><?= $value['tglorder']; ?></td>
                    <td><?= $value['total']; ?></td>
                    <td><?= $value['bayar']; ?></td>
                    <td><?= $value['kembali']; ?></td>
                    <?php
                    if ($value['status'] == 1) {
                        $status = 'Lunas';
                    } else {
                        $link = base_url('/admin/order/find/') . '/' . $value['idorder'];
                        $status = '<a href="' . $link . '" class="btn btn-primary">Bayar</a>';
                    }
                    ?>
                    <td><?= $status ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <?= $pager->makeLinks(1, $tampil, $total, 'bootstrap') ?>
    </div>
</div>
<?php $this->endSection() ?>