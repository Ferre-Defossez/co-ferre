<?php
require_once('../../vendor/autoload.php');
require_once('../../config/database.php');
require_once('../../src/Services/DatabaseConnector.php');

session_start();

$connection = \Services\DatabaseConnector::getConnection();
// @TODO Bootstrap Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../resources/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../storage/cache',
    'auto_reload' => true // set to false on production
]);
$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$lastLogged = isset($_COOKIE['lastLogged']) ? $_COOKIE['lastLogged'] : '';
$day = isset($_COOKIE['day']) ? $_COOKIE['day'] : '';
$hour = isset($_COOKIE['hour']) ? $_COOKIE['hour'] : '';
$username = isset($_POST['name']) ? (string) $_POST['name'] : '';
$msgName = '*';
$password = isset($_POST['pass']) ? (string) $_POST['pass'] : '';
$msgPassword = '*';
$pass = 0;
if($user){
    header('location: menu.php');
    exit();
}

if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] === 'login')){
    $allOk = true;

    if(trim($username) === ''){
        $msgName = 'Enter your username';
        $allOk = false;
    }
    else{
        $stmt = $connection->prepare('SELECT password FROM users WHERE name = ?');
        $result = $stmt->executeQuery([$username]);
        $pass = $result->fetchOne();
    }
    if(trim($password) === ''){
        $msgPassword = 'Enter your password';
        $allOk = false;
    }
    else if($pass == 0){
        $allOk = false;
        $msgPassword = 'username does not exist';
    }
    else if (!password_verify($password,$pass)){
        $allOk = false;
        $msgPassword = 'wrong password: ';
    }

    if($allOk){
        $_SESSION['user'] = true;
        $_SESSION['name'] = $username;

        $stmt = $connection->prepare('SELECT id FROM users WHERE name = ?');
        $result = $stmt->executeQuery([$username]);
        $id = $result->fetchOne();

        $_SESSION['user_id'] = $id;

        setcookie('lastLogged', $username);
        setcookie('day', date("d/m/Y"));
        setcookie('hour', date("H:i"));

        //header('Location: menu.php');
        //exit();
    }
}
$template = $twig->load('login.twig');
echo $template->render([
    'username' => $username,
    'msgName' => $msgName,
    'msgPass' => $msgPassword,
    'nameLastLogin' => $lastLogged,
    'dayLastLogin' => $day,
    'hourLastLogin' => $hour,
    'logged' => $user
]);