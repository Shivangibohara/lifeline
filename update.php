<?php
$sql ="UPDATE hospital INNER JOIN dealer ON hospital.Name=dealer.Name SET hospital.Need = hospital .Need-dealer.Available";

 if( mysqli_query($conn, $sql)){
      echo "done";}
      ?>
