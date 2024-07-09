<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Routes {
    public static function Index() {
        header('Location: ../keyauth-php/pages/landing/');
        exit();
    }
}