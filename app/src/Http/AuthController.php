<?php

class AuthController {
    protected \Doctrine\DBAL\Connection $connection;
    protected \Twig\Environment $twig;


    public function __construct () {
        //database connection
        $this->connection = \Services\DatabaseConnector::getConnection();

        //twig
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../resources/templates/');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => __DIR__ . '/../../storage/cache',
            'auto_reload' => true //set to false on production
        ]);
        if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
            $this->twig->addGlobal('username', $_SESSION['username']);     }
    }

    public function login() {
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
                $stmt = $this->connection->prepare('SELECT password FROM users WHERE name = ?');
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

                $stmt = $this->connection->prepare('SELECT id FROM users WHERE name = ?');
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
        $template = $this->twig->load('login.twig');
        echo $template->render([
            'username' => $username,
            'msgName' => $msgName,
            'msgPass' => $msgPassword,
            'nameLastLogin' => $lastLogged,
            'dayLastLogin' => $day,
            'hourLastLogin' => $hour,
            'logged' => $user
        ]);
    }

    public function register() {
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
                $stmt = $this->connection->prepare('SELECT name FROM users WHERE name = ?');
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

                $stmtName = $this->connection->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
                $result = $stmtName->executeQuery([$username,$email,password_hash($pass,
                    PASSWORD_DEFAULT)]);

                $stmt = $this->connection->prepare('SELECT id FROM users WHERE name = ?');
                $result = $stmt->executeQuery([$username]);
                $id = $result->fetchOne();

                $_SESSION['user_id'] = $id;

                header('Location: menu.php');
                exit();
            }
        }
        $template = $this->twig->load('registrate.twig');
        echo $template->render([
            'username' => $username,
            'msgName' => $msgName,
            'email' => $email,
            'msgEmail' => $msgEmail,
            'msgPass' => $msgPassword,
            'msgPass2' => $msgPassword2,
            'logged' => $user
        ]);

    }

    public function logout() {
        session_start();
        unset($_SESSION["user"]);
        unset($_SESSION["name"]);
        unset($_SESSION["user_id"]);

        header('location: login.php');
        exit();
    }





}