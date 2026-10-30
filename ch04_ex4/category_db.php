<?php
// Lấy danh sách tất cả các category
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories ORDER BY category_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

// Lấy thông tin chi tiết 1 category theo ID
function get_category($category_id) {
    global $db;
    $query = 'SELECT * FROM categories WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    return $category;
}

// Thêm category mới
function add_category($category_name) {
    global $db;
    $query = 'INSERT INTO categories (category_name) VALUES (:category_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();
}

// Cập nhật category
function update_category($category_id, $category_name) {
    global $db;
    $query = 'UPDATE categories SET category_name = :category_name WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

// Xóa category
function delete_category($category_id) {
    global $db;
    $query = 'DELETE FROM categories WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}
?>