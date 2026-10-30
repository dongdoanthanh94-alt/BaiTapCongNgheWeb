<?php
session_start();
include 'connect.php';

if (isset($_POST['login'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$name' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $_SESSION['username'] = $name;
        $_SESSION['password'] = $pass;

        if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
            setcookie('username', $name, time() + 60);
            setcookie('password', $pass, time() + 60);
        }

        echo "<script>alert('Login successful.'); location.href='trangquantriadmin.php';</script>";
        echo 'Chào bạn: ' . $row['fullname'] . '<br>';
        echo 'Pass của bạn là: ' . $row['password'];
    } else {
        echo "<script>alert('Login failed.'); location.href='dangnhap.php';</script>";
    }
}

if (isset($_POST['cancel'])) {
    echo "<script>location.href='dangnhap.php';</script>";
}
?>
