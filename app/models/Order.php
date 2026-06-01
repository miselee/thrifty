<?php

require_once 'config/database.php';

class Order{

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function createOrder($id_user,$total)
    {
        mysqli_query(
            $this->conn,
            "INSERT INTO pesanan
            (id_user,total,status)
            VALUES
            ('$id_user','$total','Menunggu COD')"
        );

        return mysqli_insert_id($this->conn);
    }

    public function saveDetail(
        $id_pesanan,
        $id_produk,
        $qty,
        $harga
    ){
        mysqli_query(
            $this->conn,
            "INSERT INTO detail_pesanan
            (id_pesanan,id_produk,qty,harga)
            VALUES
            ('$id_pesanan','$id_produk','$qty','$harga')"
        );
    }

    public function getOrders($id_user)
    {
        return mysqli_query(
            $this->conn,
            "SELECT *
            FROM pesanan
            WHERE id_user='$id_user'
            ORDER BY tanggal DESC"
        );
    }

    public function getOrderById($id)
    {
        global $conn;

        return mysqli_fetch_assoc(
            mysqli_query(
                $conn,
                "SELECT *
                FROM pesanan
                WHERE id_pesanan='$id'"
            )
        );
    }

    public function getDetailOrder($id)
    {
        return mysqli_query(
            $this->conn,
            "SELECT *
            FROM v_detail_pesanan
            WHERE id_pesanan='$id'"
        );
    }
}