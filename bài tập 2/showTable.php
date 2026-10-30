<?php
header('Content-Type: text/html; charset=UTF-8');

$tableName = $_GET['chon'] ?? '';
$allowedTables = ['sinhvien' => 'sinhvien'];

if (!isset($allowedTables[$tableName])) {
    http_response_code(400);
    echo '<p class="error">Danh mục không hợp lệ.</p>';
    exit;
}

require_once __DIR__ . '/database.class.php';

try {
    $dao = new Dao('root', '', 'udn.');
    $table = $allowedTables[$tableName];
    $result = $dao->query('SELECT * FROM `' . $table . '` ORDER BY `masv`');
    echo $dao->table($result, 'DANH SÁCH ' . $table);
} catch (mysqli_sql_exception $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    echo '<p class="error">Không thể kết nối hoặc đọc dữ liệu từ CSDL udn.</p>';
}
