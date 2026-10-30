<?php
// Lấy dữ liệu từ form POST bằng filter_input
$investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
$interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
$years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

// Kiểm tra tính hợp lệ dữ liệu (Validation)
if ($investment === FALSE || $investment === NULL) {
    $error_message = 'Investment amount must be a valid number.';
} else if ($investment <= 0) {
    $error_message = 'Investment amount must be greater than zero.';
} else if ($interest_rate === FALSE || $interest_rate === NULL) {
    $error_message = 'Interest rate must be a valid number.';
} else if ($interest_rate <= 0) {
    $error_message = 'Interest rate must be greater than zero.';
} else if ($interest_rate > 15) { // Bước 5: Kiểm tra lãi suất <= 15
    $error_message = 'Interest rate must be less than or equal to 15.';
} else if ($years === FALSE || $years === NULL) {
    $error_message = 'Number of years must be a valid integer.';
} else if ($years <= 0) {
    $error_message = 'Number of years must be greater than zero.';
} else if ($years > 50) {
    $error_message = 'Number of years must be less than 51.';
} else {
    $error_message = '';
}

// Nếu có lỗi, quay lại trang index.php để hiển thị thông báo
if ($error_message != '') {
    include('index.php');
    exit();
}

// Tính toán giá trị tương lai (Future Value)
$future_value = $investment;
for ($i = 1; $i <= $years; $i++) {
    $future_value = $future_value + ($future_value * $interest_rate / 100);
}

// Định dạng dữ liệu hiển thị tiền tệ
$investment_formatted = '$' . number_format($investment, 2);
$interest_rate_formatted = $interest_rate . '%';
$future_value_formatted = '$' . number_format($future_value, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_formatted; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $interest_rate_formatted; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_formatted; ?></span><br>

        <!-- Bước 6: Hiển thị ngày thực hiện tính toán bằng hàm date() -->
        <p>This calculation was done on <?php echo date('n/j/Y'); ?>.</p>
    </main>
</body>
</html>