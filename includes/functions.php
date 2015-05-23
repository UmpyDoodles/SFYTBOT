<?php

// get profile

function readProfile(){

}

$link_id = $_GET['link'];
// get employment

function readEmployment(){
  global $connection;
  global $link_id;

  $employment = "SELECT * FROM employment where profileID='$link_id'";

  $employment_data = mysqli_query($connection, $employment);

  while($row = mysqli_fetch_array($employment_data)) {

     $eid = $row[0];
     $company = $row[1];
     $job = $row[2];
     $pid = $row[5];

    echo "<td> $eid </td>";
}

function readEducation(){

}

function readResidential(){

}

?>
