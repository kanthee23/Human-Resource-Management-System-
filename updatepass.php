<!-- updatepass.php -->
<?php

include('connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  
  $username = $_REQUEST['username'];
  $pass  = md5($_REQUEST['password']);
  $mobile = $_REQUEST['mobile'];
  $nic = $_REQUEST['nic'];
}



$sql = "INSERT INTO account (username,password,firstname, lastname, dateofbirth,dateofjoin, mobile,nic,approved,department)
VALUES ('$username', '$pass', '$fname', '$lname' )";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>

    </head>

</html>
