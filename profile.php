<?php include 'includes/layouts/db_connection.php';?>

<!doctype html>
<html>
<head>
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">
<div class="content_area">
  <main>

  <?php include 'includes/layouts/profile_area.php';?>



  <article id="search_area">
    <h2>Location:</h2>
    <?php print_r($_GET); ?>
    <?php print_r($_POST); ?>
    <?php print_r($_SESSION); ?>



</article>

    <article>
    <h3>View the latest info about users first and lastname</h3>
    <table style="width:100%; border-spacing:0;">
              <tr>
                <th>Profile ID</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Sex</th>
              </tr>
    <tr>


    <?php

    //if(!isset($_GET['link'])){
    //  $link_id = " ";
    //}
    //else {
    //  $link_id = $_GET['link'];
    //}

// change this query to show lateste updates

    $profile = "SELECT * FROM profile where profileID='$link_id'";

    $profile_data = mysqli_query($connection, $profile);

// function !
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

    </tr>


    <?php } ?>
    </table>
  </article>
  </main>
</div>

<?php include 'includes/layouts/sidebar_profile.php';?>

</body>
</html>
