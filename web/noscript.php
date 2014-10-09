<?php
session_start();

require "../src/evil.php";

$evil = new evil();

$now = date("Y-m-d H:i:s");

$evil->sendMail($now);

//header('Location: http://google.com');