<?php

?>
<!doctype html>
<html>
<head>
<title>Upload</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">

  <div class="content_area">
  <main>
    <article>
    <h1>Upload Media</h1>
    <p>
      upload multimedia file to our server and the db will keep track, define formats to save on filesystem.
    </p>
<form id="regForm" name="regForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <p>Image:</p>
  <input type="file" name="image"/> <br>

  <p>Audio:</p>
  <input type="file" name="audio"/> <br>

  <p>Video:</p>
  <input type="file" name="video"/> <br>



  <input class="button" type="submit" name="upload" value="UPLOAD"/>
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
