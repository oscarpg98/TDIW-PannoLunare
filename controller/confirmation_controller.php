<?php

//Guardar compra en la base de datos.
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/trolley_model.php");
require_once(__DIR__."/../model/orderline_model.php");

$conn = connectDB();
$userId = $_SESSION['id_user'];
$totalQuantity = $_SESSION['trolley']['num_items'];
$totalPrice = $_SESSION['trolley']['total_price'];
createTrolley($conn, $userId, $totalQuantity, $totalPrice);
$trolleyId = getTrolleyId($conn, $userId);
foreach($_SESSION['trolley']['items'] as $product){
    $productId = $product['id_product'];
    $productName = $product['name_product'];
    $productQuantity = $_SESSION['trolley'][$productId]['quantity'];
    $unitaryPriceProduct = $product['price_product'];
    $totalPriceProduct = $unitaryPriceProduct * $_SESSION['trolley'][$productId]['quantity'];
    addItems2Orderline($conn, $productId, $productName, $productQuantity, $unitaryPriceProduct, $totalPriceProduct, $trolleyId);
}

//Vaciar carrito despues de comprar.
unset($_SESSION['trolley']['items']);
unset($_SESSION['trolley']['total_price']);
unset($_SESSION['trolley']['num_items']);
$_SESSION['trolley']['items'] = array();
$_SESSION['trolley']['total_price'] = 0.00;
$_SESSION['trolley']['num_items'] = 0;

require_once(__DIR__ . "/../view/header_view.php");
require_once(__DIR__."/../view/confirmation_view.php");
require_once(__DIR__."/../view/footer_view.php");