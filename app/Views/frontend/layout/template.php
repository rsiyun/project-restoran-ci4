<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url('bootstrap-4.4.1-dist/css/bootstrap.min.css') ?> ">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/fixed.css') ?>" />
    <!-- My Icon -->
    <link rel="icon" href="../upload/logo.jpg">
</head>

<body>
    <!-- Navbar -->
    <nav class=" navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand mb-0 h-1" href="<?= base_url('homepage') ?>"><img width="60" height="60" class="d-inline-block align-top" alt="" loading="lazy" src="<?= base_url('upload/logo.jpg') ?>" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <?php if (empty(session()->get('pelanggan'))) : ?>
                        <a class="nav-link" href="<?= base_url('front/daftar') ?>">Daftar</a>
                        <a class="nav-item nav-link active" href="<?= base_url('login') ?>">Login <span class="sr-only">(current)</span></a>
                    <?php endif; ?>
                    <?php if (!empty(session()->get('pelanggan'))) : ?>
                        <a class="nav-link" href="<?= base_url('front/history') ?>">History <i class="fa fa-history" aria-hidden="true"></i></a>
                    <?php endif ?>
                    <?php if (!empty(session()->get('pelanggan'))) : ?>
                        <a class="nav-link" href="<?= base_url('/cart/keranjang') ?>">Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    <?php endif ?>
                    <a class="nav-link">
                        <?php if (!empty(session()->get('pelanggan'))) {
                            echo session()->get('pelanggan');
                        } ?>
                        <i class="fa fa-user" aria-hidden="true"></i></a>
                    <?php if (!empty(session()->get('pelanggan'))) : ?>
                        <a class="nav-link" href="<?= base_url('front/loginp/logout') ?>">Logout <i class="fa fa-power-off" aria-hidden="true"></i></a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <?= $this->renderSection('content2'); ?>
    <!-- footer area -->
    <footer class="page-footer bg-dark">
        <div class="bg-primary">
            <div class="container">
                <div class="row py-4 d-flex align-items-center">
                    <div class="col-md-12 text-center">
                        <a href="#"><i class="fab fa-facebook-square text-white mr-4"></i></a>
                        <a href="#"><i class="fab fa-twitter text-white mr-4"></i></a>
                        <a href="#"><i class="fab fa-google-play text-white"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-white text-center text-md-left mt-5">
            <div class="row">
                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">About us</h6>
                    <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; height: 2px;">
                    <div>
                        <img mt width="60" height="60" class="d-inline-block mx-auto" alt="" loading="lazy" src="<?= base_url('upload/logo.jpg') ?>" alt="">
                        <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aspernatur libero explicabo veniam pariatur adipisci nemo a labore error, ducimus fugit ipsum obcaecati nam. Rem!</p>
                    </div>
                </div>
                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Products</h6>
                    <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto" style="width: 85px; height: 2px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><a class="text-white" href="#">Our apps</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Usefull Links</h6>
                    <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto" style="width: 115px; height: 2px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><a class="text-white" href="#">About Us</a></li>
                        <li class="my-2"><a class="text-white" href="#">Terms & Conditions</a></li>
                        <li class="my-2"><a class="text-white" href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Contacts</h6>
                    <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto" style="width: 115px; height: 2px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><i class="fas fa-home mr-3"></i> Sidoarjo Sukodono</li>
                        <li class="my-2"><i class="fas fa-envelope mr-3"></i>FoodsApp@gmail.com</li>
                        <li class="my-2"><i class="fas fa-phone mr-3"></i> 0009919297421496</li>
                    </ul>
                </div>
            </div>

    </footer>
    <div class="footer-copyright text-center py-3">
        <p>&copy; Copyright
            <a href="">FoodsApp</a></p>
        <p>Desigend By Rsiyun</p>
    </div>
    <!-- End Footer area -->
    <!-- My javascript -->
    <script src="<?= base_url('bootstrap-4.4.1-dist/jqpop/jquery-3.5.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-4.4.1-dist/js/fontawesome.js') ?>"></script>
</body>

</html>