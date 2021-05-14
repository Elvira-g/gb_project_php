<?php

function __autoload($classname)
{
    include_once("c/$classname.php");
}

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

switch ($_GET['c']) {
    case 'articles':
        $controller = new C_Page();
    case 'user':
        $controller = new C_User();
        break;
    case 'cart':
        $controller = new C_Cart();
        break;
    case 'product':
        $controller = new C_Product();
        break;
    case 'order':
        $controller = new C_Order();
        break;
    case 'admin':
        $controller = new C_Admin();
        break;
    default:
        $controller = new C_Page();
}

$controller->Request($action);