<?php include 'includes/layouts/db_connection.php';?>
<?php //include 'includes/functions.php';?>

<!doctype html>
<html>
<head>
<title>Residential</title>
<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>
<body>

<div class="main_wrapper">
<div class="content_area">
  <main>

  <?php include 'includes/layouts/profile_area.php';?>
  <?php

  $link_id = $_GET['link'];

  $residential = "SELECT * FROM residential where profileID='$link_id'";

  $residential_data = mysqli_query($connection, $residential);

   if(mysqli_num_rows($residential_data)>0){
     $num_rows = mysqli_num_rows($residential_data);
   }
   else {
     $num_rows = "0";
   }

  ?>
    <article>

    <h3><?php echo $num_rows;?> records have been matched!</h3>
    <table style="width:100%; border-spacing:0;">
              <tr>
                <th>Residential ID</th>
                <th>AddressLineOne</th>
                <th>AddressLineTwo</th>
                <th>Town</th>
                <th>Profile ID</th>
              </tr>


    <?php

     // function goes here

    while($row = mysqli_fetch_array($residential_data)) {

       $rid = $row[0];
       $addressLineOne = $row[1];
       $addressLineTwo = $row[2];
       $PostTown = $row[3];
       $pid = $row[4];

    ?>
  <tr>

    <td><?php echo $rid; ?></td>
    <td><?php echo $addressLineOne; ?></td>
    <td><?php echo $addressLineTwo; ?></td>
    <td><?php echo $PostTown; ?></td>
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
