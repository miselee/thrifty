<?php

require_once 'config/database.php';

class AdminController {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
        if (!isset($_SESSION['user'])) {
            header("Location:index.php?page=login");
            exit();
        }
    }

    public function dashboard() {
        $produk = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT COUNT(*) as total FROM produk"));
        $pesanan = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT COUNT(*) as total FROM pesanan"));
        $pendapatan = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT SUM(total) as total FROM pesanan WHERE status='Selesai'"));

        $data = [
            'total_produk' => $produk['total'],
            'total_pesanan' => $pesanan['total'],
            'total_pendapatan' => $pendapatan['total'] ?? 0
        ];

        include 'app/views/admin/dashboard.php';
    }

    public function produk() {
        if (isset($_POST['add_produk'])) {
            $nama = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $ukuran = $_POST['ukuran'];
            $kondisi = $_POST['kondisi'];
            $deskripsi = $_POST['deskripsi'];
            
            $gambar = $_FILES['gambar']['name'];
            $target = "assets/img/" . basename($gambar);
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target);

            mysqli_query(
                $this->conn,
                "CALL tambah_produk(
                    '$nama',
                    '$harga',
                    '$stok',
                    '$ukuran',
                    '$kondisi',
                    '$gambar',
                    '$deskripsi'
                )"
            );
        }

        if (isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            mysqli_query($this->conn, "DELETE FROM produk WHERE id_produk='$id'");
            header("Location:index.php?page=admin-produk");
            exit();
        }

        $products = mysqli_query($this->conn, "SELECT * FROM produk");
        include 'app/views/admin/produk.php';
    }

    public function pesanan() {
        if (isset($_POST['update_status'])) {
            $id_pesanan = $_POST['id_pesanan'];
            $status = $_POST['status'];
            mysqli_query($this->conn, "UPDATE pesanan SET status='$status' WHERE id_pesanan='$id_pesanan'");
            header("Location:index.php?page=admin-pesanan");
            exit();
        }

        $orders = mysqli_query($this->conn, "SELECT p.*, u.nama FROM pesanan p JOIN users u ON p.id_user=u.id_user ORDER BY p.tanggal DESC");
        include 'app/views/admin/pesanan.php';
    }

    
}