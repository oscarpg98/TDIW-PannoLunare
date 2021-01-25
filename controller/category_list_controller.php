<?php

require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__ . "/../model/categories_model.php");

$conn = connectDB();

$categories = getCategories($conn);

require_once(__DIR__ . "/../view/header_view.php");
require(__DIR__."/../view/category_list_view.php");
require_once(__DIR__ . "/../view/footer_view.php");