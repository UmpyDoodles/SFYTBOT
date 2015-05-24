<?php include'includes/layouts/db_connection.php';?>
<?php //include 'includes/functions.php';?>

<!doctype html>
<html>
<head>
<title>Education</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">
<div class="content_area">
  <main>

    <?php include'includes/layouts/profile_area.php';?>
    <?php
    $link_id = $_GET['link'];

    $education = "SELECT * FROM education where profileID='$link_id'";

    $education_data = mysqli_query($connection, $education);

    if(mysqli_num_rows($education_data)>0){
      $num_rows = mysqli_num_rows($education_data);
    }
    else {
      $num_rows = "0";
    }
    ?>
    <article>
  <h3><?php echo $num_rows;?> records have been matched!</h3>

    <table style="width:100%; border-spacing:0;">
              <tr>
                <th>Education ID</th>
                <th>Institution</th>
                <th>Profile ID</th>
              </tr>

    <?php

    while($row = mysqli_fetch_array($education_data)) {

       $eid = $row[0];
       $institution = $row[3];
       $pid = $row[4];

?>
<tr>
<td><?php echo $eid; ?></td>
<td><?php echo $institution; ?></td>
<td><?php echo $pid; ?></td>

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

<?php include 'includes/layouts/sidebar_profile.php';?>

</body>
</html>
