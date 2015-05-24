<?php include 'includes/layouts/db_connection.php';?>
<?php //include 'includes/functions.php';?>

<!doctype html>
<html>
<head>
<title>Employment</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">
  <div class="content_area">
    <main>

  <?php include'includes/layouts/profile_area.php';?>
  <?php

  $link_id = $_GET['link'];

  $employment = "SELECT * FROM employment where profileID='$link_id'";

  $employment_data = mysqli_query($connection, $employment);

  if(mysqli_num_rows($employment_data)>0){
    $num_rows = mysqli_num_rows($employment_data);
  }
  else {
    $num_rows = "0";
  }

  ?>

    <article>
    <h3><?php echo $num_rows;?> records have been matched!</h3>
    <table style="width:100%; border-spacing:0;">

              <tr>
                <th>Employment ID</th>
                <th>Company</th>
                <th>Job Role</th>
                <th>Profile ID</th>
              </tr>


   <?php

   // function goes here

  while($row = mysqli_fetch_array($employment_data)) {

     $eid = $row[0];
     $company = $row[1];
     $job = $row[2];
     $pid = $row[5];
?>
    <tr>
      <td><?php echo $eid; ?></td>
          <td><?php echo $company; ?></td>
          <td><?php echo $job; ?></td>
          <td><?php echo $pid; ?></td>
          <td><span><a class='profile_links' href='profile.php?link=<?php echo $pid; ?>'></a>
          </span></td>

          <td><span><a class='update_links' href='update.php?link=<?php echo $pid; ?>'></a></span></td>

          <td><span><a class='upload_links' href='upload.php?link=<?php echo $pid; ?>'></a></span></td>

          <td><span><a class='download_links' href='download.php?link=<?php echo $pid; ?>'></a></span></td>

          <td><span><a class='delete_links' href='delete.php?link=<?php echo $pid; ?>'> </a>
          </span></td>
    </tr>

<?php }?>

    </table>
  </article>

  </main>
</div>


<?php include 'includes/layouts/sidebar_profile.php';?>

</body>
</html>
