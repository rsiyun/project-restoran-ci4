<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('bootstrap-4.4.1-dist/css/bootstrap.min.css') ?> ">
    <title><?= $title ?></title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="<?= base_url('/admin') ?>">
                        <h3>Admin page</h3>
                    </a>
                </nav>
            </div>
        </div>
        <div class="mt-4">
            <div class="row">
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?= base_url('/admin/kategori/') ?>">Kategori</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/menu') ?>">Menu</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/pelanggan') ?>">Pelanggan</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/order') ?>">Order</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/orderdetail') ?>">Order Detail</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/user') ?>">User</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-8 px-2"><?= $this->renderSection('content'); ?></div>
            </div>
        </div>
    </div>
    <script src=<?= base_url("bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js") ?>></script>
    <script src=<?= base_url("bootstrap-4.4.1-dist/jqpop/jquery-3.5.1.slim.min.js") ?>></script>
    <script src=<?= base_url("bootstrap-4.4.1-dist/jqpop/popper.min.js") ?>></script>
    <script src=<?= base_url("bootstrap-4.4.1-dist/js/bootstrap.min.js") ?>></script>
</body>

</html>