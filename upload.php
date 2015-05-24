
<?php
  $image_dir = "data/images/";
  //$audio_dir = "data/audio";
  //$video_dir = "data/videos";

$image_file = $image_dir . basename($_FILES["image"]["name"]);
$image_file_tmp = $_FILES["image"]["tmp_name"];

//$video_file = $video_dir . basename($_FILES["video"]["name"]);
//$audio_file = $audio_dir . basename($_FILES["audio"]["name"]);

$uploadOk = 1;

$imageFileType = pathinfo($image_file,PATHINFO_EXTENSION);


if(isset($_POST["upload"])) {

    $check = getimagesize($image_file_tmp);

    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if ($uploadOk == 1) {
   move_uploaded_file($image_file_tmp, $image_file);
}
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

<form id="uploadForm" name="uploadForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" accept-charset="utf-8">

  <p>Image:</p>
  <input type="file" name="image" id="image"/> <br>
<!--
  <p>Audio:</p>
  <input type="file" name="audio"/> <br>

  <p>Video:</p>
  <input type="file" name="video"/> <br>
-->


  <input class="button" type="submit" name="upload" value="UPLOAD"/>
</form>
</article>
<?php echo $uploadOk; ?> <br>
<?php echo $image_file; ?>

 <pre>
   <?php print_r($_FILES); ?>
 </pre>

</main>
</div>
<div class="sidebar">
  <aside>


  <h3>Account</h3>
  <a href="logout.php">Logout, <?php echo $_SESSION['uname']; ?></a> <br>
  <a href="dashboard.php">Dashboard</a> <br>

  <h3>CRUD</h3>
  <a class="side_links" href="registration.php">Create a new Profile</a> <br>

  <a class="side_links" href="">Update a Profile</a> <br>
  <a class="side_links" href="">Delete a Profile</a> <br>

  </aside>
</div>
<?php mysqli_close($connection); ?>
</body>
</html>
