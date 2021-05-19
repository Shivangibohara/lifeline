<?php 
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
mysqli_close($conn);




?>