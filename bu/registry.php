<?php

require_once('../src/Database/Manager.php');

session_start();

use Database\Manager;


$username = $_POST['username'];

$databaseManager = new Manager();

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];


if($databaseManager->emailExists($_POST['email'])){
    $_SESSION['existingemail'] = true;
    header('Location: /register.php');
    die();
} else if ($password1 != $password2){
    $_SESSION['register'] = false;
    header('Location: /register.php');
    die();
}

$databaseManager->register($_POST['firstname'], $_POST['lastname'], $_POST['address'], $_POST['language'], $_POST['email'],$_POST['username'],  md5($_POST['password1']), "hiragana-katakana-kanji-vocabulary-grammar", date('Y-m-d'));

$userData = $databaseManager->login($_POST['username'], md5($_POST['password1']));

$_SESSION['uid'] = $userData['id'];

if (isset($_SESSION)) {
    header('Location: /index.php');

} else {
    header('Location: /login.php');

}