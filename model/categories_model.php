<?php function getCategories($conn){
    $sql_categories = "SELECT id_category, name_category FROM categories";
    $query = $conn->query($sql_categories, \PDO::FETCH_ASSOC);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}