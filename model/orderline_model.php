<?php
//Añade un orderline asociado a un trolley.
function addItems2Orderline($conn, $productId, $productName, $totalQuantity, $unitaryPriceProduct, $totalPriceProduct, $trolleyId){
    $sql = "INSERT INTO orderline(id_product, product_name_ol, quantity_ol, unitary_price_ol, total_price_ol, trolley_id) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $productId);
    $stmt->bindValue(2, $productName);
    $stmt->bindValue(3, $totalQuantity);
    $stmt->bindValue(4, $unitaryPriceProduct);
    $stmt->bindValue(5, $totalPriceProduct);
    $stmt->bindValue(6, $trolleyId);
    $stmt->execute();
}
//Retorna todos los orderlines asociados a un trolley.
function getAllOrderlinesByTrolley($conn, $trolley_id){
    $sql = "SELECT * FROM orderline WHERE trolley_id = :trolley_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'trolley_id' => $trolley_id,
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}