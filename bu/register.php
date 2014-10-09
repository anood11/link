<?php
/**
 * Created by PhpStorm.
 * User: CoalaJoe
 * Date: 04.09.14
 * Time: 14:54
 */

session_start();


if(isset($_SESSION['existingemail'])){
    if($_SESSION['existingemail']){
        require_once "templates/popupExistingEMail.php";
        session_unset($_SESSION['existingemail']);
    }
} else if (isset($_SESSION['register'])){
    if (!$_SESSION['register']) {
        require_once "templates/popupRegisterPass.php";
        session_unset($_SESSION['register']);
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
                <form method='post' action='registry.php'>
                    <h2>Register</h2>
                    <br />
                    <span>Vorname: </span><input class="form" autofocus name='firstname' type='text' placeholder='Max' required />
                    <br />
                    <br />
                    <span>Nachname: </span><input class="form" name='lastname' type='text' placeholder='Mustermann' required />
                    <br />
                    <br />
                    <span>Adresse: </span><input class="form" name='address' type='text' placeholder='Dorf' required />
                    <br />
                    <br />
                    <span>Sprache: </span>
                    <select class="form selectbox" name="language">
                       <option>Deutsch</option>
                    </select>
                    <br />
                    <br />
                    <span>E-Mail: </span><input class="form" name='email' type='email' placeholder='Max@Mustermann.com' required />
                    <br />
                    <br />
                    <span>Username: </span><input class="form" name='username' type='text' placeholder='Username' required />
                    <br />
                    <br />
                    <span>Passwort: </span><input class="form" name='password1' type='password' placeholder='Passwort' required />
                    <br />
                    <br />
                    <span>Passwort Wiederholen: </span><input class="form" name='password2' type='password' placeholder='Passwort' required />
                    <br />
                    <input class="login-button btn btn-success" type='submit' value='Registrieren'/>
                </form>
            </div>
        </div>
    </main>
</body>
</html>