<?php

require_once 'app/models/Order.php';
require_once 'app/models/Cart.php';
require_once 'app/models/User.php';
require_once 'app/models/Product.php';

class OrderController{

    public function checkout()
    {
        $id_user = $_SESSION['user']['id_user'];

        $cart = new Cart();

        $items = $cart->getCart($id_user);

        $total = $cart->getTotalCart($id_user);

        include 'app/views/cart/checkout.php';
    }

    public function process()
    {
        try
        {
            mysqli_begin_transaction(
                $GLOBALS['conn']
            );

            $id_user =
            $_SESSION['user']['id_user'];

            $userModel =
            new User();

            $user =
            $userModel->getSaldo($id_user);

            $saldo =
            $user['saldo'];

            $cart =
            new Cart();

            $items =
            $cart->getCart($id_user);

            $total = 0;

            while(
                $item =
                mysqli_fetch_assoc($items)
            )
            {
                $total +=
                ($item['harga'] * $item['qty']);
            }

            $platform = 5000;

            $grand =
            $total + $platform;

            if($saldo < $grand)
            {
                throw new Exception(
                    "Saldo tidak mencukupi"
                );
            }

            $order =
            new Order();

            $id_pesanan =
            $order->createOrder(
                $id_user,
                $grand
            );

            if(!$id_pesanan)
            {
                throw new Exception(
                    "Gagal membuat pesanan"
                );
            }

            /*trigger kurangi stok*/
            $items =
            $cart->getCart($id_user);

            while(
                $item =
                mysqli_fetch_assoc($items)
            )
            {
                $order->saveDetail(
                    $id_pesanan,
                    $item['id_produk'],
                    $item['qty'],
                    $item['harga']
                );
            }

            $cart->clearCart(
                $id_user
            );

            mysqli_commit(
                $GLOBALS['conn']
            );

            $_SESSION['user']['saldo']
            -= $grand;

            header(
                "Location:index.php?page=checkout&success=1"
            );
            exit;
        }
        catch(Exception $e)
        {
            mysqli_rollback(
                $GLOBALS['conn']
            );

            echo "
            <script>
                alert('Transaksi gagal!');
                window.location='index.php?page=checkout';
            </script>";
            exit;
        }
    }

    public function detail()
    {
        $id_pesanan = $_GET['id'];

        $order = new Order();

        $pesanan =
        $order->getOrderById($id_pesanan);

        $detail =
        $order->getDetailOrder($id_pesanan);

        include
        'app/views/order/detail_pesanan.php';
    }

}