<?php

session_start();
include_once('config.php');

if (isset($_POST['daftar'])) {
    register($_POST);
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

    <title>Register</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-primary p-1 fw-bolder">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">ERD Travel</a>
            <div class="align-self-end">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                    <a class="nav-link" href="login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-sucess alert-dismissible fade show fade in" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close">
        </button>
    </div>
    <?php unset($_SESSION['message']);
    endif;
    ?>

    <div class="container" style="margin-top: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="container">
                        <h4 class="card-title text-center fw-bolder mt-4 pb-2">Registrasi</h4>
                        <hr>
                        <div class="card-body pt-1">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input required type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan Nama Lengkap">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan Alamat E-mail">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                                    <input required type="number" class="form-control" id="no_hp" name="no_hp"
                                        placeholder="Masukkan Nomor">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Kata Sandi</label>
                                    <input required type="password" class="form-control" id="password" name="password"
                                        placeholder="Kata Sandi Anda">
                                </div>
                                <div class="mb-3">
                                    <label for="passwordConfirm" class="form-label">Konfirmasi Kata Sandi</label>
                                    <input required type="password" class="form-control" id="passwordConfirm"
                                        name="passwordConfirm" placeholder="Konfirmasi Kata Sandi Anda">
                                </div>
                                <div class="text-center pt-2">
                                    <button type="submit" class="btn btn-primary" name="register">Daftar</button>
                                    <p class="mt-3">Anda sudah punya akun ? <a href="login.php"
                                            class="text-secondary">Login</a></p>
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