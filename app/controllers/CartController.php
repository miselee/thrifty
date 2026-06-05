<?php

require_once 'app/models/Cart.php';

class CartController{

    public function add()
    {
        $id_produk = $_GET['id'];
        $id_user = $_SESSION['user']['id_user'];

        $cart = new Cart();

        $cart->add(
            $id_user,
            $id_produk
        );

        header(
            "Location:index.php?page=keranjang"
        );
    }

    public function index()
    {
        $id_user = $_SESSION['user']['id_user'];

        $cart = new Cart();

        $items = $cart->getCart($id_user);

        $total = $cart->getTotalCart($id_user);

        include 'app/views/cart/keranjang.php';
    }

    public function delete()
    {
        $cart = new Cart();

        $cart->delete(
            $_GET['id']
        );

        header(
            "Location:index.php?page=keranjang"
        );
    }
}