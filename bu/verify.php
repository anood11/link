<?php

require_once('../src/Database/Manager.php');

session_start();

use Database\Manager;


$username = $_POST['username'];
$password = md5($_POST['password']);

$databaseManager = new Manager();

$userData = $databaseManager->login($username, $password);

$_SESSION['uid'] = $userData['id'];

if (isset($_SESSION['uid'])) {
    header('Location: /index.php');

} else {
    $_SESSION['login'] = false;
    header('Location: /login.php');
}