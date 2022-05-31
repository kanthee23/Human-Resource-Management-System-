<!-- submit.php -->
<?php

include('connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  
  $username = $_REQUEST['username'];
  $pass     = md5($_REQUEST['password']);
  $fname    = $_REQUEST['fname'];
  $lname    = $_REQUEST['lname'];
  $nic      = $_REQUEST['nic'];

  $address  = $_REQUEST["address"]; 
  $email    = $_REQUEST["email"]; 
  $mobile   = $_REQUEST["mobile"]; 


  $bank      = $_REQUEST["bank"]; 
  $ac_number = $_REQUEST["ac_number"];
                  
  $department= $_REQUEST["department"]; 
  $hire      = $_REQUEST["hire"]; 
    
  
}


$sql2 = "SELECT deparment_id FROM departments WHERE deparment_name = '$department'";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $department_id = $row["deparment_id"];
  }
}



$sql = "INSERT INTO basic (username, firstname, lastname, email, hire_date, department_id, mobile, 
address, bank, ac_number, nic, pass, a_level, approved)
 VALUES ('$username', '$fname', '$lname', '$email', '$hire', '$department_id', '$mobile', '$address',
  '$bank', '$ac_number', '$nic', '$pass', '0', '0')";


if ($conn->query($sql) === TRUE) {
  
  $msg = "New record created successfully"; 
  echo "$msg";
  header("location: index.php");


} else {


  echo ("Error: " . $sql . "<br>" . $conn->error);
 
}


function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>


<?php
?>




<!DOCTYPE html>
<html>

<head>
	<title>
				
	</title>
</head>
<body>
   

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>