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
    $username = isset($_POST['name']) ? (string) $_POST['name'] : '';
    $msgName = '*';
    $email = isset($_POST['email']) ? (string) $_POST['email'] : '';
    $msgEmail = '*';
    $pass = isset($_POST['pass']) ? (string) $_POST['pass'] : '';
    $msgPassword = '*';
    $pass2 = isset($_POST['pass2']) ? (string) $_POST['pass2'] : '';
    $msgPassword2 = '*';
    $exists = 0;

    if($user){
        header('location: menu.php');
        exit();
    }

if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] === 'registrate')){
    $allOk = true;

    if(trim($username) === ''){
        $msgName = 'Fill in a username';
        $allOk = false;
    }
    else{
        $stmt = $connection->prepare('SELECT name FROM users WHERE name = ?');
        $result = $stmt->executeQuery([$username]);
        $exists = $result->fetchOne();
    }

    if($exists != 0){
        $allOk = false;
        $formErrors[] = 'username already exists';
    }

    if(trim($email) === ''){
        $msgEmail = "Fill in your e-mail address";
        $allOk = false;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msgEmail = "Invalid e-mail address";
        $allOk = false;
    }

    $uppercase = preg_match('@[A-Z]@', $pass);
    //$lowercase = preg_match('@[a-z]@', $pass);
    //$number    = preg_match('@[0-9]@', $pass);
    //$specialChars = preg_match('@[^\w]@', $pass);

    if(trim($pass) === ''){
        $msgPassword = "Fill in a password";
        $allOk = false;
    }
    else if(!$uppercase) {
        $msgPassword = 'Password needs to contain at least one upper case letter.';
        $allOk = false;
    }
    if(trim($pass2) === ''){
        echo("repeat: ". $pass2);
        $msgPassword2 = "Repeat your password";
        $allOk = false;
    }
    else if ($pass2 != $pass) {
        $msgPassword2 = "does not match the given password";
        $allOk = false;
    }

    if($allOk){
        $_SESSION['user'] = true;
        $_SESSION['name'] = $username;

        $stmtName = $connection->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $result = $stmtName->executeQuery([$username,$email,password_hash($pass,
            PASSWORD_DEFAULT)]);

        $stmt = $connection->prepare('SELECT id FROM users WHERE name = ?');
        $result = $stmt->executeQuery([$username]);
        $id = $result->fetchOne();

        $_SESSION['user_id'] = $id;

        header('Location: menu.php');
        exit();
    }
}
$template = $twig->load('registrate.twig');
echo $template->render([
    'username' => $username,
    'msgName' => $msgName,
    'email' => $email,
    'msgEmail' => $msgEmail,
    'msgPass' => $msgPassword,
    'msgPass2' => $msgPassword2,
    'logged' => $user
]);