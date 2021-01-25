<?php function getProducts($conn, $id): array{
    try {
        $sql = "SELECT id_product, name_product, image, price_product FROM products WHERE id_category = :id_category";
        $sql_products = $conn->prepare($sql);
        $sql_products->execute([
            'id_category' => $id,
        ]);
        return $sql_products->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function getDetailProduct($conn, $id_prod): array{
    try{
        $sql = "SELECT id_product, description, price_product, name_product FROM products WHERE id_product = :id_prod";
        $sql_detail = $conn->prepare($sql);
        $sql_detail->execute([
            'id_prod' => $id_prod,
        ]);
        return $sql_detail->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function searchProduct($conn, $newSearch){
    $sql = "SELECT * FROM products WHERE name_product LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $newSearch);
    $stmt->bindValue(2, $newSearch);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}