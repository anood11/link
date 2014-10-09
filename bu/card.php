<?php
/**
 * Created by PhpStorm.
 * User: CoalaJoe
 * Date: 21.08.14
 * Time: 16:32
 */


if (!isset($_SESSION['uid'])) {
    header('Location: /login.php');
    die();
}
