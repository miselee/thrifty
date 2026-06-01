<?php

require_once 'app/models/Product.php';

class ProductController{

    public function beranda()
    {
        $model = new Product();

        $products = $model->getLimit(4);

        include 'app/views/home/beranda.php';
    }

    public function index()
    {
        $model = new Product();

        $products = $model->getAll();

        include 'app/views/product/produk.php';
    }

    public function detail()
    {
        $id = $_GET['id'];

        $model = new Product();

        $product = $model->getById($id);

        include 'app/views/product/detail.php';
    }
}