<?php include 'includes/layouts/db_connection.php';?>

<?php
$fname = mysqli_real_escape_string($connection, $_POST['fname']);
$lname = mysqli_real_escape_string($connection, $_POST['lname']);
$gender = $_POST['checkGender'];
$dOB = $_POST['dateBirth'];

$profile = "select * from profile where firstName='$fname' OR  lastName='$lname' OR sex='$gender' OR sex='$dOB'";

$profile_data = mysqli_query($connection, $profile);

if(mysqli_num_rows($result)>0){
   $num_rows = mysqli_num_rows($profile_data);
}
else {
  $num_rows = "0";
}


?>

<!doctype html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">


<div class="content_area">
  <main>
    <h1>Welcome to the Dashboard, <?php echo $_SESSION['uname']; ?></h1>
    <p>From the Dashboard you will be able to create, read, update and delete information from profiles. it is the main control panel for various administrative tasks.</p>

<article class="image_area">
  <h2>View Profiles</h2>
  <p>put basic info when record gets shown, location</p>

  <img class="profile_image" src=""> </img> <br>

  <?php print_r($_GET); ?>
  <?php print_r($_POST); ?>
  <?php print_r($_SESSION); ?>

</article>

<article id="search_area">
<h2>Find Records</h2>
<p>the search will allow data to be read from the profile table if any matches are found those rows will be display with links.</p>
<form id="searchForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
<input class="button" type="submit" name="search" value="SEARCH"/>
</form>
</article>

    <article>
    <h3><?php echo $num_rows;?> profiles have been matched!</h3>

    <table style="width:100%; border-spacing:0;">
              <tr>
                <th>Profile ID</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Sex</th>

                <th>GO</th>
                <th>AD</th>
                <th>UL</th>
                <th>DL</th>
                <th>RE</th>
              </tr>
    <tr>

    <?php

    while($row = mysqli_fetch_array($profile_data)) {
       $pid = $row[0];
       $fname = $row[1];
       $lname = $row[2];
       $dob = $row[3];
       $sex = $row[4];

    ?>

    <td><?php echo $pid; ?></td>
    <td><?php echo $fname; ?></td>
    <td><?php echo $lname; ?></td>
    <td><?php echo $dob; ?></td>
    <td><?php echo $sex; ?></td>


    <td><span><a class='profile_links' href='profile.php?link=<?php echo $pid; ?>'></a>
    </span></td>

    <td><span><a class='update_links' href='update.php?link=<?php echo $pid; ?>'></a></span></td>

    <td><span><a class='upload_links' href='upload.php?link=<?php echo $pid; ?>'></a></span></td>

    <td><span><a class='download_links' href='download.php?link=<?php echo $pid; ?>'></a></span></td>

    <td><span><a class='delete_links' href='delete.php?link=<?php echo $pid; ?>'> </a>
    </span></td>
    </tr>


    <?php } ?>
    </table>
  </article>
  </main>
</div>

<div class="sidebar">
  <aside>


  <h3>Account</h3>
  <a href="logout.php">Logout, <?php echo $_SESSION['uname']; ?></a> <br>

  <h3>Mangage Profiles</h3>
  <a class="side_links" href="registration.php">Register a Profile</a> <br>
  <a class="side_links" href="">Update a Profile</a> <br>
  <a class="side_links" href="">Delete a Profile</a> <br>
  <a class="side_links" href="">Upload Media</a> <br>


  <h3>Recent</h3>
  </aside>
</div>

</body>
</html>
