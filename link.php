<?php

$dbhost = "localhost";
$dbuser = "ubigby";
$dbpass = "P@ssw0rd";
$dbname = "syftbot_db";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);



$query = "select * from employment where profileID='$link_id'";

$result = mysqli_query($connection, $query);

if(mysqli_num_rows($result)>0){
  header('Location: http://192.168.1.173/SYFTBOT_PROD/profile.php');

}

mysqli_close($connection);

?>
