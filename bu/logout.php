<?php
/**
 * Created by PhpStorm.
 * User: CoalaJoe
 * Date: 04.09.14
 * Time: 13:26
 */
session_start();

if (isset($_SESSION['uid'])) {
    session_destroy();
}
header('Location: /login.php');
