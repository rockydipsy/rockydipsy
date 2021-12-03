<?php
function logout($request)
{
    session_start();
    $_SESSION['message'] = 'Berhasil Logout';
    header('Location: login.php');
    exit();
    session_destroy();
}