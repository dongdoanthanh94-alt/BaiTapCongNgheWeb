<?php
require_once('database.php');
require_once('category_db.php');

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$category_name = filter_input(INPUT_POST, 'category_name');

if ($category_id == null || $category_id == false || empty($category_name)) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    update_category($category_id, $category_name);
    header('Location: category_list.php');
}
?>