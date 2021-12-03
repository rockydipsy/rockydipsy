<?php
session_start();
include_once('config.php');

if (isset($_COOKIE['navColor'])) {
    $color = $_COOKIE['navColor'];
}

if (isset($_POST['logout'])) {
    logout($_POST);
}

$id = $_SESSION['id'];
$select = mysqli_query($conn, "SELECT * FROM bookings WHERE user_id='$id' ");

if (isset($_GET['id'])) {
    $id_booking = $_GET['id'];
    mysqli_query($conn, "DELETE FROM bookings WHERE id='$id_booking'");
    $_SESSION['message'] = 'Berhasil Dihapus!';
    header('Location: booking.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home</title>
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

    <div>
        <table class="table">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Tanggal Perjalanan</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $row = mysqli_num_rows($select);
                $total_harga = 0;
                if ($row != 0) {
                    while ($selects = mysqli_fetch_assoc($select)) {
                        $total_harga = $total_harga + (int)$selects['harga']; ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $selects['nama_tempat'] ?></td>
                    <td><?= $selects['lokasi'] ?></td>
                    <td><?= $selects['tanggal'] ?></td>
                    <td><?= "Rp. ", $selects['harga'] ?></td>
                    <td>
                        <a href="booking.php?id=<?= $selects['id'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php }
                } ?>
                <tr>
                    <td colspan="4">Total</td>
                    <td colspan="2"><?= "Rp. ", $total_harga; ?></td>
                </tr>
            </tbody>
        </table>
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