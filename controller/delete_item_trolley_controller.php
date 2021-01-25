<?php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/products_model.php");

if (isset($_SESSION['id_user'])){
    $conn = connectDB();
    $productId = $_GET['id_product'];
    $products = getDetailProduct($conn, $productId);

    $_SESSION['trolley']['total_price'] -= ($_SESSION['trolley']['items'][$productId]['price_product'] * $_SESSION['trolley'][$productId]['quantity']);
    $_SESSION['trolley']['num_items'] -= $_SESSION['trolley'][$productId]['quantity'];
    if($_SESSION['trolley']['num_items'] == 0) {
        $_SESSION['trolley']['total_price'] = 0.00;
    }
    unset($_SESSION['trolley']['items'][$productId]); //Unseteamos el producto en sí con todos sus atributos de la lista de productos.
    unset($_SESSION['trolley'][$productId]); //Unseteamos donde se guardan las cantidades de cada producto individualmente.

    header("Location: index.php?action=trolley");
}