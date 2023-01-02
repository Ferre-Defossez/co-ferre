<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["name"]);
unset($_SESSION["user_id"]);

header('location: login.php');
exit();