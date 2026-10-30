<?php
// Bước 5 & 6: Sử dụng hàm filter_input để lấy dữ liệu an toàn từ form POST
$product_description = filter_input(INPUT_POST, 'product_description');
$list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
$discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_FLOAT);

// Bước 7: Tính toán số tiền giảm giá và giá sau khi giảm
$discount = $list_price * ($discount_percent / 100);
$discount_price = $list_price - $discount;

// Bước 8: Định dạng các biến số học theo chuẩn tiền tệ (2 chữ số thập phân) và phần trăm
$list_price_formatted = '$' . number_format($list_price, 2);
$discount_percent_formatted = $discount_percent . '%';
$discount_formatted = '$' . number_format($discount, 2);
$discount_price_formatted = '$' . number_format($discount_price, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bước 11: Tiêu đề trang web -->
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <!-- Bước 11: Tiêu đề hiển thị trên giao diện -->
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <!-- Bước 10: Sử dụng htmlspecialchars để hiển thị an toàn, tránh thực thi mã HTML độc hại (phục vụ cho Bước 9 & 10) -->
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php echo $list_price_formatted; ?></span><br>

        <label>Standard Discount Percent:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span><br>
    </main>
</body>
</html>