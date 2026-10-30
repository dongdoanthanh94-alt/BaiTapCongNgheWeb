<?php
require_once('database.php');
require_once('category_db.php');

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

if ($category_id == null || $category_id == false) {
    $error = "Invalid category ID.";
    include('error.php');
} else {
    delete_category($category_id);
    header('Location: category_list.php');
}
?>