<?php

	include('connection/connection.php');	



	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
	  	$username = $_POST['username'];		
		$pass  = md5($_REQUEST['password']);

	}

	$sql = "SELECT username, firstname, lastname, department_id, manager_id, pass, a_level, approved FROM basic WHERE username = '$username'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

	  while($row = $result->fetch_assoc()) {
	  	
	  	if ($row["pass"] == $pass and $row["approved"] == '1' ){


	  		$department 	= $row["department"];
	  		$firstname 		= $row["firstname"];
	  		$lastname 		= $row["lastname"];
	  		$department_id 	= $row["department_id"];
	  		$manager_id		= $row["manager_id"];
	  		$a_level		= $row["a_level"];
	  		$approved		= $row["approved"];
	 		
	  		
	  		session_start();

	  		$_SESSION["loggedin"] 		= true;
	  		$_SESSION["username"] 		= $username;
	  		$_SESSION["firstname"] 		= $firstname ;
	  		$_SESSION["lastname"] 		= $lastname;
	  		$_SESSION["pass"]			= $pass;
	  		$_SESSION["department_id"]	= $department_id;
	  		$_SESSION["manager_id"]		= $manager_id;
	  		$_SESSION["a_level"]		= $a_level;
	  		$_SESSION["approved"]		= $approved;
	  	

	  		header("location: welcome.php");

	  		if ($department_id == "2" and $manager_id	=="1"){
	  			header("location: home_hr_m.php");
	  		}elseif ($department_id == "2" ){
	  			header("location: home_hr.php");
			}elseif($manager_id	=="1"){
			header("location: home_m.php");
			}else{
				header("location: home_u.php");	
			}
	  		
	  	}
	  	else{ ?>
	  		<script> 

	  			if (confirm("Wrong Password!, Try again") == true) {
	  				location.href = '/aaa/index.php';
				} 

	  		</script>
	  		<?php 
	  		
	  	}

	  	
	  }
	  
	} else {
	  header("location: index.php");
	}

?>


<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>
            Largo - HRMS
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

	


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>