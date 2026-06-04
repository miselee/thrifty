<?php

require_once 'app/models/User.php';

class AuthController{

    public function login()
    {
        if(isset($_POST['login'])){

            $model = new User();

            $user =
            $model->login(
                $_POST['email']
            );

            if(
                $user &&
                $user['password']
                ==
                md5($_POST['password'])
            ){

                $_SESSION['user']
                =
                $user;

                if (isset($user['role']) && $user['role'] === 'admin') {
                    header("Location:index.php?page=admin-dashboard");
                } else {
                    header("Location:index.php?page=beranda");
                }
                exit();
            }
        }

        include 'app/views/auth/login.php';
    }

    public function register()
    {
        if(isset($_POST['register'])){

            $model = new User();

            $model->register($_POST);

            header(
                "Location:index.php?page=login"
            );
        }

        include 'app/views/auth/register.php';
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location:index.php?page=login");
        exit();
    }
}