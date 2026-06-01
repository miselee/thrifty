<?php

require_once 'app/models/Order.php';

class ProfileController{

    public function profile()
    {
        include
        'app/views/profile/profil.php';
    }

    public function history()
    {
        $id_user =
        $_SESSION['user']['id_user'];

        $order =
        new Order();

        $orders =
        $order->getOrders($id_user);

        include
        'app/views/profile/riwayat.php';
    }
}