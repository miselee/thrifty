<?php

require_once 'config/database.php';

class User{

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function login($email)
    {
        $query = mysqli_query(
            $this->conn,
            "SELECT * FROM users
            WHERE email='$email'"
        );

        return mysqli_fetch_assoc($query);
    }

    public function register($data)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $wa = $data['wa'];

        $password =
        md5($data['password']);

        return mysqli_query(
            $this->conn,
            "INSERT INTO users
            (nama,email,no_wa,password)
            VALUES
            ('$nama','$email','$wa','$password')"
        );
    }

    public function getSaldo($id_user)
    {
        $query = mysqli_query(
            $this->conn,
            "SELECT saldo
            FROM users
            WHERE id_user='$id_user'"
        );

        return mysqli_fetch_assoc($query);
    }

    public function kurangiSaldo(
        $id_user,
        $jumlah
    ){
        return mysqli_query(
            $this->conn,
            "UPDATE users
            SET saldo = saldo - $jumlah
            WHERE id_user='$id_user'"
        );
    }
}