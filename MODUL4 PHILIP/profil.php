<?php

session_start();
include('config.php');

if (isset($_POST['logout'])) {
    logout($_POST);
}
if (isset($_POST['simpan'])) {
    update($_POST);
}
if (isset($_POST['navColor'])) {
    $color = $_COOKIE['NavColor'];
}

$id = $_SESSION['id'];
$getData = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$result = mysqli_fetch_array($getData);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ERD Travel | Home</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-primary p-1 fw-bolder">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">ERD Travel</a>
            <div class="align-self-end">
                <div class="navbar-nav">
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-cart3" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                    </svg>
                                    <?php
                                    echo $_SESSION['nama'];
                                    ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark"
                                    aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item text-center" href="booking.php">Booking</a></li>
                                    <li><a class="dropdown-item text-center" href="profil.php">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="" method="POST">
                                            <button class="dropdown-item text-center" name="logout">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-success alert-dismissible fade show fade in" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close"></button>
    </div>
    <?php unset($_SESSION['message']);
    endif;
    ?>

    <div class="container d-flex justify-content-center mt-5">
        <div class="card content col-11 p-1">
            <h2 class="fw-bold text-center mt-4">Profil</h2>
            <div class="card-body pt-1">
                <form action="" method="POST">
                    <div class="mb-3" hidden>
                        <label class="form-label fw-bold">Id</label>
                        <input type="text" class="form-control rounded" id="id" name="id" value="<?= $result['id']; ?>">
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label fw-bolder">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="email"
                                value="<?= $result['email'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label fw-bolder">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= $result['nama'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hp" class="col-2 col-form-label">No.Handphone</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="hp" name="no_hp"
                                value="<?= $result['no_hp'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                        <label for="password" class="col-2 col-form-label">Kata Sandi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Kata Sandi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-2 col-form-label">Konfirmasi Kata Sandi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="passwordConfirm"
                                placeholder="Konfirmasi Kata Sandi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-2 col-form-label">Warna Navbar</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="navbar" name="navbar" placeholder="Warna Navbar">
                                <option value="red">red</option>
                                <option value="blue">blue</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-block text-center mb-2 mt-5">
                        <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                        <a class="btn btn-warning" type="submit" href="index.php" name="cancel">Cancel</a>
                    </div>
                </form>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>