<?php

session_start();

if (isset($_POST['login'])) {

$dbhost = "localhost";
$dbuser = "ubigby";
$dbpass = "P@ssw0rd";
$dbname = "syftbot_db";

// Create connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection if it works
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



$uname = mysqli_real_escape_string($connection, $_POST['uname']);

$pass = mysqli_real_escape_string($connection, $_POST['pass']);

$query = "SELECT * FROM admin_users WHERE userName='$uname' AND password='$pass'";

$result = mysqli_query($connection, $query);


if(mysqli_num_rows($result)>0){
  $_SESSION['uname'] = $uname;
  header('Location: http://192.168.1.173/SYFTBOT_PROD/dashboard.php');
}
mysqli_close($connection);
}
?>
<!doctype html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">

  <div class="content_area">
  <main>
    <article>
    <h1>Login</h1>
<form id="loginForm" name="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <p>Username:</p>
  <input type="text" name="uname"/> <br>

  <p>Password:</p>
  <input type="password" name="pass"/> <br>

  <input class="button" type="submit" name="login" value="LOGIN"/>
</form>
</article>
</main>
</div>
</body>
</html>
