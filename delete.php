<?php

?>
<!doctype html>
<html>
<head>
<title>Delete</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">

  <div class="content_area">
  <main>
    <article>
    <h1>Delete Records</h1>
    <p>
      delete any record from this proile or related tables.
    </p>
<form id="regForm" name="regForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <p>:</p>
  <input type="text" name=""/> <br>




  <input class="button" type="submit" name="remove" value="DELETE"/>
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
