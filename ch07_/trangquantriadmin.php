<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Trang quản trị</title>
</head>
<body>
    <h1>Trang Quản Trị</h1>
    <?php
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        echo 'Xin chào: ' . $_COOKIE['username'];
        echo '<br><a href="logout.php">Logout</a>';
    } else {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            echo 'Xin chào: ' . $_SESSION['username'];
            echo '<br><a href="logout.php">Logout</a>';
        } else {
            echo "<script>alert('Bạn chưa đăng nhập'); location.href='dangnhap.php';</script>";
        }
    }
    ?>
    <br>
    <a href="logout.php">Thoát ra</a>
</body>
</html>
