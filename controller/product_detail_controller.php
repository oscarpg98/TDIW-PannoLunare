<?php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__ . "/../model/products_model.php");

$conn = connectDB();

$id_prod = $_GET['id_product'];

$detail = getDetailProduct($conn, $id_prod);

require_once(__DIR__."/../view/detail_product_list_view.php");