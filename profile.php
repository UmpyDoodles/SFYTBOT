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

    <article>
    <h2>View the latest info about users first and lastname</h2>

    <table style="width:100%; border-spacing:0;">
              <tr>
                <th>Employment ID</th>
                <th>Company</th>
                <th>Job Role</th>
                <th>Profile ID</th>
              </tr>
    <tr>


    <?php

    if(!isset($_GET['link'])){
      $link_id = null;
    }
    else {
      $link_id = $_GET['link'];
    }

// change this query to show lateste updates

    $employment = "SELECT * FROM employment where profileID='$link_id'";

    $result = mysqli_query($connection, $employment);

    while($row = mysqli_fetch_array($result)) {

       $eid = $row[0];
       $company = $row[1];
       $job = $row[2];
       $pid = $row[5];

    ?>

    <td><?php echo $eid; ?></td>
    <td><?php echo $company; ?></td>
    <td><?php echo $job; ?></td>
    <td><?php echo $pid; ?></td>


    </tr>


    <?php } ?>
    </table>
  </article>
  </main>
</div>

<?php include 'includes/layouts/sidebar_profile.php';?>

</body>
</html>
