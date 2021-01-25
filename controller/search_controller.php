<?php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/products_model.php");

if(isset($_POST['search-button'])){
    $conn = connectDB();
    $search = $_POST['search'];
    $newSearch = "%" . $_POST['search'] . "%";
    $searchResults = searchProduct($conn, $newSearch);

    require_once(__DIR__ . "/../view/header_view.php");
    require_once(__DIR__ . "/../view/search_view.php");
    require_once(__DIR__ . "/../view/footer_view.php");
}