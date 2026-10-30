<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'tintuc';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Không thể kết nối đến database: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');
?>
