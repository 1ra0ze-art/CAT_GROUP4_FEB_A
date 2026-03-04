<?php
session_start();


define('ROOT', dirname(__DIR__) . '/');
define('APP',  ROOT . 'app/');

spl_autoload_register(function ($class) {
    $locations = [
        APP . 'models/'      . $class . '.php',
        APP . 'controllers/' . $class . '.php',
    ];
    foreach ($locations as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

require_once APP . 'models/User.php';
require_once APP . 'models/Supplier.php';
require_once APP . 'models/Order.php';
require_once APP . 'models/OrderItem.php';

require_once ROOT . 'config/database.php';

function redirect($url) {
    header("Location: $url");
    exit;
}

function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        redirect('?page=login');
    }
}

$page = $_GET['page'] ?? 'login';

switch ($page) {

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'suppliers':
        $controller = new SupplierController();
        $controller->index();
        break;

    case 'suppliers-edit':
        $controller = new SupplierController();
        $controller->edit();
        break;    

    case 'orders':
        $controller = new OrderController();
        $controller->create();
        break;

    case 'receipt':
        $controller = new ReceiptController();
        $controller->show();
        break;

    default:
        redirect('?page=login');
        break;
}
?>