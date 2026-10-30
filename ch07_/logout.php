<?php
session_start();

if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600);
}
if (isset($_COOKIE['password'])) {
    setcookie('password', '', time() - 3600);
}

unset($_SESSION['username']);
unset($_SESSION['password']);
session_destroy();

header('Location: dangnhap.php');
exit();
