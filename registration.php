<?php

session_start();

if (isset($_POST['register'])) {

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

$fname = mysqli_real_escape_string($connection, $_POST['fname']);
$lname = mysqli_real_escape_string($connection, $_POST['lname']);
$gender = $_POST['checkGender'];
$dOB = $_POST['dateBirth'];

$reg_profile = "INSERT INTO profile (firstName, lastName, DateofBirth, sex) VALUES ('$fname', '$lname', '$dOB', '$gender')";

$result = mysqli_query($connection, $reg_profile);


if(!$result){
  $error = "profile has not been created!";
}
  $success = "profile has been created!";

}
?>
<!doctype html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">

  <div class="content_area">
  <main>
    <article>
    <h1>Create a new Profile</h1>
<form id="regForm" name="regForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <p>Firstname:</p>
  <input type="text" name="fname"/> <br>
  <p>Lastname:</p>
  <input type="text" name="lname"/> <br>
  <p>DOB:</p>
  <input type="date" name="dateBirth"/> <br>
  <select name="checkGender">
  <option name="male" value="male">Male</option>
  <option name="female" value="female">Female</option>
  </select>

  <input class="button" type="submit" name="register" value="REGISTER"/>
</form>
</article>
<?php echo $success; ?>
 <?php print_r($_POST); ?>
</main>
</div>
<div class="sidebar">
  <aside>


  <h3>Account</h3>
  <a href="logout.php">Logout, <?php echo $_SESSION['uname']; ?></a> <br>
  <a href="dashboard.php">Dashboard</a> <br>

  <h3>Mangage Profiles</h3>
  <a class="side_links" href="registration.php">Register a Profile</a> <br>
  <a class="side_links" href="">Update a Profile</a> <br>
  <a class="side_links" href="">Delete a Profile</a> <br>



  <h3>Recent</h3>
  </aside>
</div>
<?php mysqli_close($connection); ?>
</body>
</html>
