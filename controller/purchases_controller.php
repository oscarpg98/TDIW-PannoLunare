<?php
if(isset($_SESSION['id_user'])){
    require_once(__DIR__."/../model/connectDB.php");
    require_once(__DIR__ . "/../model/trolley_model.php");
    require_once(__DIR__ . "/../model/orderline_model.php");

    $conn = connectDB();
    $id_user = $_SESSION['id_user'];
    $trolleys = getAllTrolleysByUser($conn, $id_user);
    require_once(__DIR__."/../view/header_view.php");
    if(empty($trolleys)){
        $noPurchases = true;
        require(__DIR__ ."/../view/purchases_view.php");
    }
    else{
        $titlePrinted = false;
        $noPurchases = false;
        foreach ($trolleys as $trolley){
            $orderlines = getAllOrderlinesByTrolley($conn, $trolley['id_trolley']);
            require(__DIR__ ."/../view/purchases_view.php");
        }
    }
    require_once(__DIR__."/../view/footer_view.php");
}
else {
    require_once(__DIR__."/../view/header_view.php");
    require_once(__DIR__ ."/../view/category_list_view.php");
    require_once(__DIR__."/../view/footer_view.php");
}
