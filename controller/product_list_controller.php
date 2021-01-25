<?php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__ . "/../model/products_model.php");

$conn = connectDB();

$id = $_GET['id_category'];

$products = getProducts($conn, $id);

require_once(__DIR__."/../view/product_list_view.php");
