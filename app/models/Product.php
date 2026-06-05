<?php

require_once 'config/database.php';

class Product{

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getAll()
    {
        return mysqli_query(
            $this->conn,
            "SELECT * FROM produk
             WHERE stok > 0"
        );
    }

    public function getLimit($limit)
    {
        return mysqli_query(
            $this->conn,
            "SELECT *
            FROM produk
            WHERE stok > 0
            ORDER BY id_produk DESC
            LIMIT $limit"
        );
    }

    public function getById($id)
    {
        $query = mysqli_query(
            $this->conn,
            "SELECT * FROM produk
            WHERE id_produk='$id'"
        );

        return mysqli_fetch_assoc($query);
    }
}