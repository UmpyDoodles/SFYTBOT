<?php

session_start();

if (isset($_POST['update'])) {

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


  $link_id = $_GET['link'];
  $fname = mysqli_real_escape_string($connection,   $_POST['fname']);
  $lname = mysqli_real_escape_string($connection,   $_POST['lname']);


//sex='$sex'

$profile = "UPDATE profile SET firstName='$fname', lastName='$lname', WHERE id='$link_id'";

$result = mysqli_query($connection, $profile);

if ($result){
  echo "Record updated successfully";
}


mysqli_close($connection);
}
?>
<!doctype html>
<html>
<head>
<title>Update</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">

  <div class="content_area">
  <main>
    <article id="update_area">
    <h2>Update Records</h2>
    <p>the search will allow data to be read from the profile table if any matches are found those rows will be display with links.</p>
    <form id="updateForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>Firstname:</p>
    <input type="text" name="fname"/> <br>
    <p>Lastname:</p>
    <input type="text" name="lname"/> <br>

    <select>
    <option name="male">Male</option>
    <option name="female">Female</option>
    </select>
    <input class="button" type="submit" name="update" value="UPDATE"/>
    </form>
    </article>

</main>
</div>
<div class="sidebar">
  <aside>


  <h3>Account</h3>
  <a href="logout.php">Logout, <?php echo $_SESSION['uname']; ?></a> <br>
  <a href="dashboard.php">Dashboard</a> <br>

  <h3>Mangage Profiles</h3>
  <a class="side_links" href="registration.php">Register a Profile</a> <br>
  <a class="side_links" href="update.php">Update a Profile</a> <br>
  <a class="side_links" href="">Delete a Profile</a> <br>



  <h3>Recent</h3>
  </aside>
</div>

</body>
</html>
