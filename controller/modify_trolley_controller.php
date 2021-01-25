<?php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/products_model.php");

if (isset($_SESSION['id_user'])){
    $conn = connectDB();
    $productId = $_GET['id_product'];
    $products = getDetailProduct($conn, $productId);
    $arrow = $_GET['arrow']; //Indica con un "up" si quiero aumentar la cantidad o disminuirla con "down"

    if($arrow == "up"){
        $_SESSION['trolley'][$productId]['quantity'] += 1;
        $_SESSION['trolley']['total_price'] += $_SESSION['trolley']['items'][$productId]['price_product'];
        $_SESSION['trolley']['num_items'] += 1;
    }
    elseif ($arrow == "down"){
        if($_SESSION['trolley'][$productId]['quantity'] > 1){
            $_SESSION['trolley'][$productId]['quantity'] -= 1;
            $_SESSION['trolley']['total_price'] -= $_SESSION['trolley']['items'][$productId]['price_product'];
            $_SESSION['trolley']['num_items'] -= 1;
        }
    }
    header("Location: index.php?action=trolley");
}