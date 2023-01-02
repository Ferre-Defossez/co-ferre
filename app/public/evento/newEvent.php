<?php
require_once('../vendor/autoload.php');
require_once('../config/database.php');
require_once('../src/Services/DatabaseConnector.php');

session_start();

$connection = \Services\DatabaseConnector::getConnection();


// @TODO Bootstrap Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../resources/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../storage/cache',
    'auto_reload' => true // set to false on production
]);
$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

if(!$user){
    header('location: login.php');
    exit();
}

$template = $twig->load('newEvent.twig');
echo $template->render([
    'logged' => $user
]);
