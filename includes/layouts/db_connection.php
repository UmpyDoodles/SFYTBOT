<?php

session_start();

// change to constants
if(!isset($_SESSION['uname'])){
    header('Location: http://192.168.1.173/SYFTBOT_PROD/index.php');
}

$dbhost = "localhost";
$dbuser = "ubigby";
$dbpass = "P@ssw0rd";
$dbname = "syftbot_db";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
