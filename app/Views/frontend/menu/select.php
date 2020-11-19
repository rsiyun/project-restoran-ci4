<?= $this->extend('frontend/layout/template'); ?>
<?= $this->section('content2'); ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4"><span><?= $judul ?></span></h1>
        <h3 class="text-white ">Temukan Semua makanan disini</h3>
        <form class="form-control-sm mt-3" action="<?= base_url('homepage/read') ?>" method="get">
            <?= view_cell('\App\Controllers\homepage::option') ?>
        </form>
    </div>
</div>
<div class="container d-flex justify-content-center flex-wrap mb-5">
    <?php foreach ($menus as $menu) : ?>
        <div class="card " style="width: 15rem; margin:10px">
            <img style="height:220px; " src="upload/<?= $menu['gambar'] ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $menu['menu'] ?></h5>
                <p class="card-text">Rp.<?= $menu['harga'] ?></p>
                <a class="btn btn-primary" href="<?= base_url('cart/keranjang/' . $menu["idmenu"]) ?>" role="button">Add to cart</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="container mr-5 mb-4">
    <?= $pager->links('group1', 'bootstrap'); ?>
</div>

<?= $this->endSection(); ?>