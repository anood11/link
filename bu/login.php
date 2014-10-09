<?php
/**
 * Created by PhpStorm.
 * User: CoalaJoe
 * Date: 04.09.14
 * Time: 10:39
 */
session_start();

if (isset($_SESSION['uid'])){
    header("Location: /index.php");
    die();
}

if (isset($_SESSION['login'])){
    if (!$_SESSION['login']){
        include_once 'templates/popupLogin.php';
        session_unset($_SESSION['login']);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Language Online Learning</title>
    <meta charset="UTF-8">
    <?php include("js/lib.php"); ?>
</head>
<body>
    <main>
        <div class="box">
            <div class="login-wrapper">
                <form method='post' action='verify.php'>
                    <h2>Login</h2>
                    <br />
                    <span>Username: </span><input class="form" autofocus name='username' type='text' placeholder='Username' required />
                    <br />
                    <br />
                    <span>Passwort: </span><input class="form" name='password' type='password' placeholder='Passwort' required />
                    <br />
                    <input class="login-button btn btn-success" type='submit' value='login'/>
                </form>
                <div id='nologin'>
                    <a href="">Passwort vergessen</a>?
                    <br />
                    <br />
                    Noch kein Konto?
                    <br />
                    Registrieren Sie sich <a href="register.php">hier</a>.
                </div>
            </div>
        </div>
    </main>
</body>
</html>