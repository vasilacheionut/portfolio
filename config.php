<?php
//Do not remove session_start
session_start();

define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'portfolio');

include './database/database.php';
include './model/contact.php';
include './model/users.php';

$db   = new Database();
$contact = new Contact($db);
$user = new Users($db);

if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    $user->login($_SESSION["username"], $_SESSION["password"]);    
}