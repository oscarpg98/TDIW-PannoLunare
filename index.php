<?php
session_start();
$filesAbsolutePath = '/home/TDIW/tdiw-i8/public_html/files/';
$filesPublicPath = '/files/';
if (isset($_GET['action'])) $action = $_GET['action'];
else $action = null;
switch ($action){
	case 'mainpage': //The category list is displayed in mainpage!
		require_once(__DIR__ ."/rsc_mainpage.php");
		break;
	case 'product_list':
        require_once(__DIR__ ."/rsc_products.php");
		break;
	case 'product_detail':
		require_once(__DIR__ ."/rsc_detail.php");
		break;
	case 'register':
		require_once(__DIR__ ."/rsc_register.php");
		break;
	case 'login':
		require_once(__DIR__."/rsc_login.php");
		break;
    case 'logout':
        require_once(__DIR__."/rsc_logout.php");
        break;
    case 'add_trolley':
        require_once(__DIR__ . "/rsc_add_trolley.php");
        break;
    case 'trolley':
        require_once(__DIR__ . "/rsc_trolley_page.php");
        break;
    case 'profile':
        require_once(__DIR__ . "/rsc_profile.php");
        break;
    case 'purchases':
        require_once(__DIR__ . "/rsc_purchases.php");
        break;
    case 'confirmation':
        require_once(__DIR__ . "/rsc_confirmation.php");
        break;
    case 'empty-trolley':
        require_once(__DIR__ . "/rsc_empty_trolley.php");
        break;
    case 'modify_trolley':
        require_once(__DIR__ . "/rsc_modify_trolley.php");
        break;
    case 'delete_item_trolley':
        require_once(__DIR__ . "/rsc_delete_item_trolley.php");
        break;
    case 'search':
        require_once(__DIR__ . "/rsc_search.php");
        break;
	default: require_once(__DIR__ ."/rsc_mainpage.php");
}
