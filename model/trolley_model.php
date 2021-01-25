<?php
//Crea un trolley para un usuario.
function createTrolley($conn, $userId, $productQuantity, $totalPriceProduct){
    $sql = "INSERT INTO trolley(id_user, num_items, total_price) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $userId);
    $stmt->bindValue(2, $productQuantity);
    $stmt->bindValue(3, $totalPriceProduct);
    $stmt->execute();
}
//Retorna el id de trolley más reciente.
function getTrolleyId($conn, $userId){
    $sql = "SELECT id_trolley, creation_date FROM trolley WHERE id_user = :id_user ORDER BY creation_date DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id_user' => $userId,
    ]);
    $trolley = $stmt->fetch(PDO::FETCH_ASSOC);
    return $trolley['id_trolley'];
}
//Retorna todos los trolleys de un usuario.
function getAllTrolleysByUser($conn, $id_user){
    $sql = "SELECT * FROM trolley WHERE id_user = :id_user";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id_user' => $id_user,
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}