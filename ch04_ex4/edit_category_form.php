<?php
require_once('database.php');
require_once('category_db.php');

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
if ($category_id == null || $category_id == false) {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
}

$category = get_category($category_id);
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
        <h1>Edit Category</h1>
        <form action="edit_category.php" method="post" id="edit_category_form">
            <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">

            <label>Name:</label>
            <input type="text" name="category_name" value="<?php echo htmlspecialchars($category['category_name']); ?>">
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Update Category">
            <br>
        </form>
        <p><a href="category_list.php">View Category List</a></p>
    </main>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>