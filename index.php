<?php

session_start();

$page = $_GET['page'] ?? 'login';

$publicPage = ['login','register'];

if(
    !isset($_SESSION['user']) &&
    !in_array($page,$publicPage)
){
    header("Location:index.php?page=login");
    exit();
}

switch($page){

    case 'login':
        require_once 'app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        require_once 'app/controllers/AuthController.php';
        $controller =
        new AuthController();
        $controller->logout();
        break;

    case 'register':
        require_once 'app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->register();
        break;

    case 'beranda':
        require_once 'app/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->beranda();
        break;

    case 'produk':
        require_once 'app/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->index();
        break;

    case 'detail':
        require_once 'app/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->detail();
        break;

    case 'add-cart':
        require_once
        'app/controllers/CartController.php';
        $controller =
        new CartController();
        $controller->add();
        break;

    case 'keranjang':
        require_once
        'app/controllers/CartController.php';
        $controller =
        new CartController();
        $controller->index();
        break;

    case 'hapus-cart':
        require_once
        'app/controllers/CartController.php';
        $controller =
        new CartController();
        $controller->delete();
        break;
    
    case 'checkout':

        require_once
        'app/controllers/OrderController.php';

        $controller =
        new OrderController();

        $controller->checkout();

        break;

    case 'process-order':

        require_once
        'app/controllers/OrderController.php';

        $controller =
        new OrderController();

        $controller->process();

        break;

    case 'detail-pesanan':
        require_once 'app/controllers/OrderController.php';
        $controller = new OrderController();
        $controller->detail();
    break;

    case 'sukses':

        require_once
        'app/controllers/OrderController.php';

        $controller =
        new OrderController();

        $controller->success();

        break;

    case 'profil':

        require_once
        'app/controllers/ProfileController.php';

        $controller =
        new ProfileController();

        $controller->profile();

        break;

    case 'riwayat':

        require_once
        'app/controllers/ProfileController.php';

        $controller =
        new ProfileController();

        $controller->history();

        break;

    default:
        echo "404 Not Found";
}