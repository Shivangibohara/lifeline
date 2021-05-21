<?php 
session_start();
$servername = "localhost";
$username = "root";
$password= "";
$dbname = "login";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
$OName =$_POST['OName'];
$Available = $_POST['Available'];
$Name = $_POST['Name'];
$sql="INSERT INTO `dealer` (`OName`, `Available`, `Name`) VALUES ('$OName', $Available, '$Name');";

if ($conn->query($sql) == true){
    echo "Success! Your entry has been submitted successfully"
;
} else {
  echo "ERROR: $sql <br> $conn->error";
}
}
 $sql ="UPDATE hospital INNER JOIN dealer ON hospital.Name=dealer.Name SET hospital.Need = hospital .Need-dealer.Available";
 if ( mysqli_query($conn, $sql)){
      echo "done";}


$var = "SELECT * FROM hospital";      
// if(isset($_SESSION['Need']))
//    {echo "session started";
//      $Need=$_SESSION['Need'];
//     echo $Need;}
$result = mysqli_query($conn,$var);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){

//https://github.com/saraswati789/TrainBooking/blob/master/TrainBooking/train/book.php
// 
//  

if($row[1] >0){
  if($Name=="KAMLA NEHRU MEMORIAL HOSPITAL"){
    $to_email = "muskanpatel272002@gmail.com";
    $subject = "Simple Email Test via PHP";
     $body = "requirement of ".$row[1]." oxygen cylinder in ".$Name;
    $headers = "From: lifelinewebsite03@gmail.com";
    if (mail($to_email, $subject, $body, $headers)) {
      echo "Email successfully sent to $to_email...";
   } else {
       echo "Email sending failed...";}
}   
}
}

mysqli_close($conn);


?>