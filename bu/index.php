<?php
ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);
require_once('../index.php');

session_start();


if (!isset($_SESSION['uid'])) {
    header('Location: /web/login.php');
    die();
}


use Helper\Permission;
use User\User;
use User\Manager;
use Card\Hiraganacard;
use Card\Katakanacard;
use Card\Manager as CardManager;
use Database\Manager as DatabaseManager;

$databaseManager = new DatabaseManager();
$peter           = new User();
$manager         = new Manager();
$cardManager     = new CardManager();
$kata            = new Katakanacard();
$hira            = new Hiraganacard();

$navi = require_once 'templates/navi.php';
require_once 'templates/content.php';
require_once 'templates/footer.php';

?>


<?php

if (!isset($_REQUEST['cont'])){
    $cont = 'main';
} else {
    $cont = $_REQUEST['cont'];
}


switch ($cont) {
    case 'hiragana':
        $manager = new CardManager();
        $data = $manager->makeCards($hira);
        $_POST['card'] = $data;
        $content = require_once "templates/Flashcard.php";
        break;
    case 'katakana':
        $manager = new CardManager();
        $data = $manager->makeCards($kata);
        $_SESSION['card'] = serialize($data);
        $content = require_once "templates/flashcard.php";
        break;
    case 'profile':
        $content = require_once "templates/profile.php";
        break;
    case 'kanji': break;
    case 'grammar': break;
    case 'vocabular': break;
    case 'main':
        $content = require_once "templates/home.php";
        break;
    default: $content = require_once "templates/home.php"; break;
}

?>


    <?php echo $footer;?>


<?php

$_SESSION['usermanager'] = serialize($manager);
$_SESSION['lastSite'] = serialize($cont);