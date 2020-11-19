<?= $this->extend('frontend/layout/template'); ?>
<?= $this->section('content2'); ?>
<link rel="stylesheet" href="<?= base_url('css/order.css') ?>">
<div class="jumbotron jumbotron-fluid forlogin">
    <div class="container">
        <h1 class="display-4"><span><?= $judul ?></span></h1>
        <h3 class="text-white ">Temukan Semua makanan disini</h3>
    </div>
</div>
<section class="cart-area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($menus as $menu => $v) : ?>
                            <?php foreach ($v as $men => $value) : ?>

                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img style="width: 100px;" src="<?= base_url() ?>/upload/<?= $value['gambar'] ?>" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p><?= $value['menu'] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5><?= $value['harga'] ?></h5>
                                    </td>
                                    <td>
                                        <div class="product_count d-flex">
                                            <a class="mr-2" href=" <?= base_url('cart/tambah/' . $value['idmenu']) ?> ">[+]</a>
                                            <h5 class="mt-1">
                                                <?= $jumlah[$menu] ?>
                                            </h5> <a class="ml-2" href="<?= base_url('cart/kurang/' . $value['idmenu']) ?>">[-]</a>
                                        </div>
                                    </td>
                                    <td>
                                        <h5><?= $jumlah[$menu] * $value['harga'] ?></h5>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('cart/delete/' . $value['idmenu']) ?>">hapus</a>
                                    </td>
                                </tr>

                                <?php $total = $total + ($value['harga'] * $jumlah[$menu]); ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>

                        <tr class="table">
                            <td colspan=4>
                                <h3>Jumlah Total</h3>
                            </td>
                            <td>

                                <h3>Rp.
                                    <?php if (empty($total)) {
                                        echo "";
                                    } else {
                                        echo $total;
                                    } ?>
                                </h3>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <?php if (!empty($total)) : ?>
                    <form action="<?= base_url('front/checkout') ?>" method="POST">
                        <input type="hidden" name="total" value="<?= $total ?>">
                        <button class="btn btn-primary mb-0" type="submit"> checkout <i class="fas fa-check-square"></i></button>
                    </form>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>