<?php

require_once 'config/database.php';

class Cart{

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function add($id_user,$id_produk)
    {
        return mysqli_query(
            $this->conn,
            "INSERT INTO keranjang
            (id_user,id_produk,qty)
            VALUES
            ('$id_user','$id_produk',1)"
        );
    }

    public function getCart($id_user)
    {
        return mysqli_query(
            $this->conn,
            "SELECT *
            FROM keranjang k
            JOIN produk p
            ON k.id_produk=p.id_produk
            WHERE k.id_user='$id_user'"
        );
    }

    public function getTotalCart($id_user)
    {
        global $conn;

        $query = mysqli_query(
            $conn,
            "SELECT hitung_total_cart($id_user) AS total"
        );

        $data = mysqli_fetch_assoc($query);

        return $data['total'] ?? 0;
    }

    public function delete($id)
    {
        return mysqli_query(
            $this->conn,
            "DELETE FROM keranjang
            WHERE id_keranjang='$id'"
        );
    }

    public function clearCart($id_user)
    {
        return mysqli_query(
            $this->conn,
            "DELETE FROM keranjang
            WHERE id_user='$id_user'"
        );
    }
}