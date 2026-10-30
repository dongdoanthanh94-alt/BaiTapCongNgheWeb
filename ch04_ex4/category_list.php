<?php
require_once('database.php');
require_once('category_db.php');

// Lấy danh sách category
$categories = get_categories();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <header>
        <h1>Product Manager</h1>
    </header>
    
    <main>
        <h1>Category List</h1>
        
        <!-- Bảng hiển thị danh sách danh mục -->
        <table>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo htmlspecialchars($category['category_name']); ?></td>
                <td>
                    <!-- Nút Update chuyển hướng sang form chỉnh sửa -->
                    <form action="edit_category_form.php" method="post" style="display:inline;">
                        <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
                        <input type="submit" value="Update">
                    </form>

                    <!-- Nút Delete thực hiện xóa trực tiếp -->
                    <form action="delete_category.php" method="post" style="display:inline;">
                        <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <!-- Form Thêm mới danh mục -->
        <h2>Add Category</h2>
        <form action="add_category.php" method="post" id="add_category_form">
            <label>Name:</label>
            <input type="text" name="category_name">
            <input type="submit" value="Add">
        </form>

        <!-- Liên kết quay lại trang sản phẩm -->
        <p><a href="index.php">List Products</a></p>
    </main>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>