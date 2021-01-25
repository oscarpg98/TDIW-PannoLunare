<?php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/products_model.php");

if (isset($_SESSION['id_user'])){
    $conn = connectDB();
    $productId = $_GET['id_product'];
    $product = getDetailProduct($conn, $productId);

    if(!isset($_SESSION['trolley']['items'][$productId]['name_product'])){
        $_SESSION['trolley'][$productId]['quantity'] = 1;
    }
    else $_SESSION['trolley'][$productId]['quantity'] += 1;
    $_SESSION['trolley']['items'][$productId]['id_product'] = $product['id_product'];
    $_SESSION['trolley']['items'][$productId]['name_product'] = $product['name_product'];
    $_SESSION['trolley']['items'][$productId]['price_product'] = $product['price_product'];
    $_SESSION['trolley']['total_price'] += $_SESSION['trolley']['items'][$productId]['price_product'];
    $_SESSION['trolley']['num_items'] += 1;

    require_once(__DIR__ . "/../view/trolley_view.php");
}
else require_once(__DIR__ . "/../view/login_form_view.php");