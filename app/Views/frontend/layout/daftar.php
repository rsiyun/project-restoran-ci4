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
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
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
                    <a class="nav-link" href="<?= base_url('front/daftar') ?>">Daftar</a>
                    <a class="nav-item nav-link active" href="<?= base_url('login') ?>">Login <span class="sr-only">(current)</span></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="jumbotron forlogin jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><span><?= $judul ?></span></h1>
        </div>
    </div>

    <section class="loginarea section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="login-form-in mt-4">
                        <h3>Create a account</h3>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="m-auto col-8 alert alert-danger" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <form class="login-form" action="<?= base_url('/front/daftar/create') ?>" method="post">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control <?= ($validation->hasError('pelanggan')) ? 'is-invalid' : ''; ?>" name="pelanggan" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required>
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('pelanggan'); ?>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="telp" placeholder="Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telephone'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control " name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
                            </div>
                            <div class="col-md-12 form-group mb-5">
                                <input type="password" class="form-control" name="kpassword" placeholder="Konfirmasi Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konfirmasi Password'" required>
                            </div>
                            <!-- <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Keep me logged in</label>
                                </div>
                            </div> -->
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn btn-primary">Log In</button>
                                <!-- <a href="#">Forgot Password?</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script src="<?= base_url() ?>/bootstrap-4.4.1-dist/jqpop/jquery-3.5.1.slim.min.js"></script>
    <script src="<?= base_url() ?>/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/bootstrap-4.4.1-dist/js/fontawesome.js"></script>
</body>

</html>