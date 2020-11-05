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
        <div class="row ">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a href="<?= base_url('/admin') ?>" class=" navbar-brand">Admin page</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item mt-2 ml-5">User:</li>
                            <li class="nav-item mr-4">
                                <a class="nav-link" href="#">
                                    <?php if (!empty(session()->get('user'))) {
                                        echo session()->get('user');
                                    } ?>
                                </a>
                            </li>
                            <li class="nav-item mt-2 ml-5">Email:</li>
                            <li class="nav-item mt-2 ml-2">
                                <?php if (!empty(session()->get('email'))) {
                                    echo session()->get('email');
                                } ?>
                            </li>
                            <li class="nav-item mt-2 ml-5">Level:</li>
                            <li class="nav-item mt-2 ml-2">
                                <?php if (!empty(session()->get('level'))) {
                                    echo session()->get('level');
                                    $level = session()->get('level');
                                } ?>
                            </li>
                            <li class="nav-item mt-2 ml-4">
                                <?php if (!empty(session()->get('level'))) : ?>
                                    <a href="<?= base_url('admin/login/logout') ?>">Logout</a>
                                <?php endif ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class=" mt-4">
            <div class="row">
                <div class="col-4">
                    <div class="card" style="width: 18rem;">


                        <ul class="list-group list-group-flush">
                            <?php switch ($level) {
                                case 'Admin': ?>
                                    <li class="list-group-item"><a href="<?= base_url('/admin/kategori/') ?>">Kategori</a></li>
                                    <li class="list-group-item"><a href="<?= base_url('/admin/menu') ?>">Menu</a></li>
                                    <li class="list-group-item"><a href="<?= base_url('/admin/pelanggan') ?>">Pelanggan</a></li>
                                    <li class="list-group-item"><a href="<?= base_url('/admin/order') ?>">Order</a></li>
                                    <li class="list-group-item"><a href="<?= base_url('/admin/orderdetail') ?>">Order Detail</a></li>
                                    <li class="list-group-item"><a href="<?= base_url('/admin/user') ?>">User</a></li>
                                <?php break;
                                case 'Koki': ?>
                                    <li class="list-group-item"><a href="<?= base_url('/admin/orderdetail') ?>">Order Detail</a></li>
                                <?php break;
                                case 'Kasir': ?>
                                    <li class="list-group-item"><a href="<?= base_url('/admin/order') ?>">Order</a></li>
                                    <li class="list-group-item"><a href="<?= base_url('/admin/orderdetail') ?>">Order Detail</a></li>
                                <?php break;
                                default: ?>
                                    <h1>tidak ada menu</h1>
                                    <?php break; ?>
                            <?php } ?>
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