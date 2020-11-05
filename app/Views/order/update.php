<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col">
        <h1><?= $judul ?></h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <p>Pembeli: <?= $orders[0]['pelanggan'] ?></p>
    </div>
    <div class="col">
        <p>Tanggal: <?= date("d-m-y", strtotime($orders[0]['tglorder']))  ?></p>
    </div>
    <div class="col">
        <p>Total: <b> <?= number_format($orders[0]['total'])  ?></b></p>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <form action="<?= base_url('/admin/order/update') ?>" method="post">
            <div class="form-group">
                <label for="bayar">Bayar:</label>
                <input type="number" name="bayar" autocomplete="off" autofocus required class="form-control" id="bayar">
            </div>
            <div>
                <input type="hidden" name="total" value="<?= $orders[0]['total'] ?>" autocomplete="off" required class="form-control">
                <input type="hidden" name="idorder" value="<?= $orders[0]['idorder'] ?>" autocomplete="off" required class="form-control">
            </div>
            <button type="submit" href="awddw" class="btn btn-primary">Bayar</button>
        </form>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <h2>Rincian Order</h2>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php $no = 1 ?>
            <?php foreach ($details as $detail => $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['menu'] ?></td>
                    <td><?= $value['harga'] ?></td>
                    <td><?= $value['jumlah'] ?></td>
                    <td><?= $value['jumlah'] * $value['hargajual'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>