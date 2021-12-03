<?php

session_start();
include_once('config.php');

if (isset($_POST['login'])) {
    login($_POST);
}
if (isset($_COOKIE['navColor'])) {
    $color = $_COOKIE['navColor'];
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-primary p-1 fw-bolder">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">ERD Travel</a>
            <div class="align-self-end">
                <div class="navbar-nav">
                    <a class="nav-link" href="register.php">Register</a>
                    <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_SESSION['registered'])) : ?>
    <div class="alert alert-success alert-dismissible fade show fade in" role="alert">
        <?= $_SESSION['registered']; ?>
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close">
        </button>
    </div>
    <?php unset($_SESSION['registered']);
    endif;
    ?>

    <!-- Alert -->
    <?php
    if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-success alert-dismissible fade show fade in" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close">
        </button>
    </div>
    <?php unset($_SESSION['message']);
    endif;
    ?>
    <?php
    if (isset($_SESSION['message-error'])) : ?>
    <div class="alert alert-danger alert-dismissible fade show fade in" role="alert">
        <?= $_SESSION['message-error']; ?>
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close">
        </button>
    </div>
    <?php unset($_SESSION['message-error']);
    endif;
    ?>

    <div class="container" style="margin-top: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="container">
                        <h4 class="card-title text-center fw-bolder mt-4 pb-2">Login</h4>
                        <hr>
                        <div class="card-body pt-1">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan Alamat E-mail">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Kata Sandi</label>
                                    <input required type="password" class="form-control" id="password" name="password"
                                        placeholder="Kata Sandi Anda">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                                <div class="text-center pt-2">
                                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                                    <p class="mt-3">Anda belum punya akun? <a href="register.php"
                                            class="text-secondary">Registrasi</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-5 py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">©2021 Copyright <a class="text-secondary" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">philip_1202190135</a></span>
        </div>
    </footer>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create by</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>Nama : Philip Rikardo Manarihon Simamora</ul>
                    <ul>NIM : 1202190135</ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>