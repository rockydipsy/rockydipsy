<?php
session_start();
include_once('config.php');

if (isset($_POST['logout'])) {
    logout($_POST);
}

if (isset($_POST['tambahkan'])) {
    tambah($_POST);
}

if (isset($_COOKIE['navColor'])) {
    $color = $_COOKIE['navColor'];
}
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
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close">
        </button>
    </div>
    <?php unset($_SESSION['message']);
    endif;
    ?>

    <diV class="container-sm">
        <div class="d-flex align-items-center justify-content-center mt-3 rounded-3 mb-3"
            style="background-color: rgb(88, 208, 126); height: 150px;">
            <div>
                <h1 class=" display-2 fw-bolder text-center">EAD Travel</h1>
            </div>
        </div>
        <div class="card-group">
            <div class="card">
                <img src="gambar/raja_ampat.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Raja Ampat, Papua</h5>
                    <p class="card-text">Kepulauan Raja Ampat merupakan tempat yang sangat berpotensi untuk dijadikan
                        sebagai objek wisata, terutama wisata penyelaman. Perairan Kepulauan Raja Ampat menurut berbagai
                        sumber, merupakan salah satu dari 10 perairan terbaik untuk diving site di seluruh dunia.
                        Bahkan,
                        mungkin juga diakui sebagai nomor satu untuk kelengkapan flora dan fauna bawah air pada saat
                        ini.
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item fw-bolder">Rp. 7.000.000</li>
                </ul>
                <div class="card-footer text-center d-grid gap-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" name="pesan_tiket"
                        data-bs-target="#modal_pertama">Pesan Tiket</button>
                </div>
            </div>
            <div class="card">
                <img src="gambar/bromo.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Gunung Bromo, Malang</h5>
                    <p class="card-text">Gunung Bromo adalah salah satu gunung api yang masih aktif di Indonesia. Gunung
                        yang memiliki ketinggian 2.392 meter di atas permukaan laut ini merupakan destinasi andalan Jawa
                        Timur. Gunung Bromo berdiri gagah dikelilingi kaldera atau lautan pasir seluas 10 kilometer
                        persegi.
                        Wisatawan yang berkunjung ke Gunung Bromo akan disambut.
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item fw-bolder">Rp. 2.000.000</li>
                </ul>
                <div class="card-footer text-center d-grid gap-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" name="pesan_tiket"
                        data-bs-target="#modal_kedua">Pesan Tiket</button>
                </div>
            </div>

            <div class="card">
                <img src="gambar/tanah_lot.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Tanah Lot, Bali</h5>
                    <p class="card-text">anah Lot salah satu pura penting bagi umat Hindu Bali dan lokasi pura terletak
                        di
                        atas batu besar yang berada di lepas pantai. Pura Tanah Lot merupakan ikon pariwisata pulau
                        Bali.
                        Selain itu salah satu obyek wisata terkenal. Karena sakingterkenalnya tempat wisata di Bali ini,
                        maka hampir setiap hari, objek wisata ini selalu ramai dengankunjungan wisatawan.
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item fw-bolder">Rp. 5.000.000</li>
                </ul>
                <div class="card-footer text-center d-grid gap-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" name="pesan_tiket"
                        data-bs-target="#modal_ketiga">Pesan Tiket</button>
                </div>
            </div>
        </div>
    </diV>

    <form action="" method="POST">
        <div id="modal_pertama" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Silahkan Pilih Tanggal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="nama_tempat" value="Raja Empat">
                        <input type="hidden" name="lokasi" value="Papua">
                        <input type="hidden" name="harga" value="7000000">
                        <label class="d-block mb-2" for="tanggal_pembelian">Tanggal Perjalan</label>
                        <input type="date" name="date" style="width: 100%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="tambahkan" class="btn btn-primary">Tambahkan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="" method="POST">
        <div id="modal_kedua" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Silahkan Pilih Tanggal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="nama_tempat" value="Gunung Bromo">
                        <input type="hidden" name="lokasi" value="Malang">
                        <input type="hidden" name="harga" value="2000000">
                        <label class="d-block mb-2" for="tanggal_pembelian">Tanggal Perjalan</label>
                        <input type="date" name="date" style="width: 100%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="tambahkan" class="btn btn-primary">Tambahkan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="" method="POST">
        <div id="modal_ketiga" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Silahkan Pilih Tanggal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="nama_tempat" value="Tanah Lot">
                        <input type="hidden" name="lokasi" value="Bali">
                        <input type="hidden" name="harga" value="5000000">
                        <label class="d-block mb-2" for="tanggal_pembelian">Tanggal Perjalan</label>
                        <input type="date" name="date" style="width: 100%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="tambahkan" class="btn btn-primary">Tambahkan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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