<?php
require_once('database.php');
require_once('category_db.php');

$category_name = filter_input(INPUT_POST, 'category_name');

if ($category_name == null || $category_name == false) {
    $error = "Invalid category name. Check field and try again.";
    include('error.php');
} else {
    add_category($category_name);
    header('Location: category_list.php');
}
?>