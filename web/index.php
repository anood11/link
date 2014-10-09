<?php
//error_reporting(0);
session_start();
require "../src/evil.php";
$evil = new evil();

    $hash = $_GET['pic'];
if (isset($hash)){
    $_SESSION['hash'] = $hash;
}

?>
<!DOCTYPE html>
<html>
<head>
    <noscript>
        <meta http-equiv="refresh" content="0;URL='http://link.tt8.li/noscript.php'">
    </noscript>
    <title></title>
    <script src="jquery-2.1.1.min.js"></script>
    <script src="app.js"></script>
</head>
<body>
    <h1>Back again!</h1>
</body>
</html>
