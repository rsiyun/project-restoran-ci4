<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('bootstrap-4.4.1-dist/css/bootstrap.min.css') ?> ">
    <title>Aplikasi | Login</title>
    <style>
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .alert {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .email {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .form-signin .pass {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="text-center mt-5">
    <img src="<?= base_url('upload/logo.jpg') ?>" alt="Logo" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Login Admin</h1>
    <?php if (!empty($info)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $info ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('/admin/login') ?>" method="post" class="form-signin">
        <label for="email" class="sr-only">email:</label>
        <input type="email" id="email" name="email" class="form-control email" placeholder="email" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control mb-3 pass" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="tombol" type="submit">Login</button>
    </form>
    <script src=<?= base_url("bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js") ?>></script>
    <script src=<?= base_url("bootstrap-4.4.1-dist/jqpop/jquery-3.5.1.slim.min.js") ?>></script>
    <script src=<?= base_url("bootstrap-4.4.1-dist/jqpop/popper.min.js") ?>></script>
    <script src=<?= base_url("bootstrap-4.4.1-dist/js/bootstrap.min.js") ?>></script>
</body>

</html>