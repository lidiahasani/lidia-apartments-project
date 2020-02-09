<?php

include ('admin/db.php');
    $id = $_GET['id'];
    $sqli = "SELECT image FROM room WHERE id=$id";
    $resulti = mysqli_query($con,$sqli);
    $row = mysqli_fetch_assoc($resulti);
    mysqli_close($con);
  
    header("Content-type: image/jpeg");
    echo $row['image'];
    ?>