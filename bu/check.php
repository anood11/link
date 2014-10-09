<?php
/**
 * Created by PhpStorm.
 * User: CoalaJoe
 * Date: 22.08.14
 * Time: 15:39
 */
session_start();
require_once '../index.php';
require_once 'templates/navi.php';
require_once 'templates/content.php';
require_once 'templates/footer.php';


if (!isset($_SESSION['uid'])) {
    header('Location: /login.php');
    die();
}

$usermanager = unserialize($_SESSION['usermanager']);

$navi = require_once 'templates/navi.php';

?>


<?php

if( array_key_exists('answer', $_POST) && array_key_exists('question', $_POST) && isset($_POST['answer']) && isset($_POST['question'])){
    $color = "red";

    $answer = $_POST['answer'];
    $question = $_POST['question'];

    $card = unserialize($_SESSION['card']);

    // Validates user input
    if ($answer == $card->getCorrectAnswer()) {
        $valid = "Richtige Antwort";
        $color = "green";
    } else {
        $valid = "Falsche Antwort";
    }

        // Output of your answer

} else {
    echo "Invalid answer";
}
$content = require_once "templates/answer.php"
?>

<?php echo $content;?>
<?php echo $footer;?>

