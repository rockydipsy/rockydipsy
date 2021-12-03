<?php

$conn = mysqli_connect("localhost", "root", "", "wad_modul4", 3308);

if (!$conn) {
    echo "<script> alert('Failed to Connect into Database') </script>";

    die(mysqli_connect_error());
}

function login($request)
{
    global $conn;

    $email = $request['email'];
    $password = $request['password'];

    //cek email
    $emailcek = "SELECT * FROM users WHERE email= '$email'";
    $select = mysqli_query($conn, $emailcek);

    //
    if (mysqli_num_rows($select) == 1) {
        $result = mysqli_fetch_assoc($select);

        //cek pass
        if (password_verify($password, $result['password'])) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['nama'] = $result['nama'];
            $_SESSION['no_hp'] = $result['no_hp'];
            $_SESSION['message'] = 'Berhasil Login';

            //
            header("Location:index.php");
            exit();
        } else {
            $_SESSION['message-error'] = 'Password Salah';
            header("Location:login.php");
            exit();
        }
        $_SESSION['message-error'] = 'Gagal Login';
        header('Location:login.php');
        exit();
    }
}

function register($request)
{
    //Untuk Koneksi ke database
    global $conn;

    //menampung value dari form login ke variabel baru
    $nama = $request['nama'];
    $email = $request['email'];
    $no_hp = $request['no_hp'];
    $password = mysqli_real_escape_string($conn, $request['password']);
    $cpassword = mysqli_real_escape_string($conn, $request['passwordConfirm']);

    //cek email
    $emailcek = "SELECT email FROM users WHERE email = '$email'";
    $select = mysqli_query($conn, $emailcek);

    if (!mysqli_fetch_assoc($select)) {
        //mengecek password
        if ($password == $cpassword) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            //memasukkan data register ke database
            $query = "INSERT INTO users VALUES (' ', '$nama', '$email', '$password', '$no_hp')";
            mysqli_query($conn, $query);

            $_SESSION['registered'] = 'Berhasil Registrasi, silahkan login';
            header('Location:login.php');
            exit();
        }
    }
    $_SESSION['message'] = 'Email anda sudah pernah terdaftar';
    header('Location:register.php');
    exit();
}

function logout($request)
{
    session_start();
    $_SESSION['message'] = 'Berhasil Logout';
    header('Location: login.php');
    exit();
    session_destroy();
}

function update($request)
{
    global $conn;
    $id = $_SESSION['id'];
    $email = $request['email'];
    $nama = $request['nama'];
    $no_hp = $request['no_hp'];
    $password = mysqli_real_escape_string($conn, $request['password']);
    $cpassword = mysqli_real_escape_string($conn, $request['cpassword']);

    //$warna_navbar = $request['warna_navbar'];

    if ($password == $cpassword) {
        if ($password == null) {
            $update = "UPDATE users SET nama= '$nama', email='$email', no_hp='$no_hp' WHERE id='$id' ";
            mysqli_query($conn, $update);
            setcookie('navColor', $_POST['navbar'], strtotime('+1 days'), '/');
            $_SESSION['message'] = 'Update Berhasil';
            header('Location:profil.php');
            exit();
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $update = "UPDATE users SET nama= '$nama', email='$email', password='$password' , no_hp='$no_hp' WHERE id='$id' ";
        mysqli_query($conn, $update);
        setcookie('navColor', $_POST['navbar'], strtotime('+1 days'), '/');
        $_SESSION['message'] = 'Update Berhasil';
        header('Location:profil.php');
        exit();
    }
    $update = "UPDATE users SET nama= '$nama', email='$email', no_hp='$no_hp' WHERE id='$id' ";
    mysqli_query($conn, $update);
    setcookie('navColor', $_POST['navbar'], strtotime('+1 days'), '/');
    $_SESSION['message'] = 'Update Berhasil';
    header('Location:profil.php');
    exit();
}

function tambah($request)
{
    global $conn;
    $id = $_SESSION['id'];
    $nama_tempat = $request['nama_tempat'];
    $lokasi = $request['lokasi'];
    $tanggal_perjalanan = $request['date'];
    $harga = $request['harga'];

    mysqli_query($conn, "INSERT INTO bookings(user_id, nama_tempat, lokasi, harga, tanggal) VALUES ('$id', '$nama_tempat', '$lokasi', '$harga', '$tanggal_perjalanan')");
    $_SESSION['message'] = 'Berhasil Ditambah ';
    header('Location:index.php');
    exit();
}