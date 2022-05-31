<!-- change_pass.php -->
<?php
	include('connection/connection.php');
	include('welcome.php');
	
	$department_id = $_SESSION["department_id"];	
	
	
	if ($username == '' ){
		header("location: index.php");
	}else{
		$msg_1 = '';
		$sn = 0;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$x_x_user		= $_REQUEST["x_user"];
			$x_x_fname 		= $_REQUEST["x_fname"];
			$x_x_last_name 	= $_REQUEST["x_last_name"];
			$x_x_nic 		= $_REQUEST["x_nic"];
			$x_x_address 	= $_REQUEST["x_address"];
			$x_x_email 		= $_REQUEST["x_email"];
			$x_x_mobile 	= $_REQUEST["x_mobile"];



			$sql = "UPDATE basic SET firstname = '$x_x_fname', lastname ='$x_x_last_name' , email='$x_x_email', mobile = '$x_x_mobile', address = '$x_x_address' WHERE username ='$x_x_user'";

			if ($conn->query($sql) === TRUE) {

			  	$msg_1 =  "Your profile update successfully";
			  	
			}else {
			  	$msg_1 = "Error: " . $sql . "<br>" . $conn->error;
			}

			$sql= "SELECT * FROM `basic` WHERE username ='$username'" ;

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){

		            $xfirstname 	= $row["firstname"];
		            $xlastname		=$row["lastname"];
					$xnic 			= $row["nic"];
			  		$xaddress 		= $row["address"];
			  		$xemail 		= $row["email"];
			  		$xmobile 		= $row["mobile"];
			  		
			  		$xbank 			= $row["bank"];
			  		$xac_number 	= $row["ac_number"];
			  		
			  		$xdepartment_id	= $row["department_id"];
			  		$xhire_date 	= $row["hire_date"];
			  	}
			  }

		}else{
			
			$sql= "SELECT * FROM `basic` WHERE username ='$username'" ;

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){

		            $xfirstname 	= $row["firstname"];
		            $xlastname		=$row["lastname"];
					$xnic 			= $row["nic"];
			  		$xaddress 		= $row["address"];
			  		$xemail 		= $row["email"];
			  		$xmobile 		= $row["mobile"];
			  		
			  		$xbank 			= $row["bank"];
			  		$xac_number 	= $row["ac_number"];
			  		
			  		$xdepartment_id	= $row["department_id"];
			  		$xhire_date 	= $row["hire_date"];
	
			  		
				$msg_1 =  "";
				}
				
			}
		}
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
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">Largo Trading</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="home_u">Home </a></li>
		    </ul>

		     <ul class="nav navbar-nav navbar-right">
		      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo(" "  .$firstname) ?>  </a></li>
		      <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
		    </ul>
		</div>
	</nav>


	<div class="row ">
       <div class="col-md-3"></div> 
       <div class="col-md-6">
       		<p class="text-danger "> <?php if($msg_1 ==''){}else{ echo ($msg_1);} ?> </p>
			<div class="container-fluid text-center well">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<h4 class="text-primary text-center">Personal Detail Edit Form</h4> <br>
						<br>
						<form action ="#" method="post" >
							<label >First Name</label>
							<input type="text" id="x_fname" name="x_fname" class="form-control input-lg input-forme text-center"  value=<?php echo $xfirstname  ?>  ><br>
							<label >Last Name</label>
							<input type="text" id="x_last_name" name="x_last_name" class="form-control input-lg input-forme text-center"  value=<?php echo $xlastname   ?> ><br>
							<label >NIC</label>
							<input type="text" id="x_nic" name="x_nic" class="form-control input-lg input-forme text-center"  value=<?php echo $xnic  ?>><br>
							<label >Address</label>
							<input type="text" id="x_address" name="x_address" class="form-control input-lg input-forme text-center"  value=<?php echo $xaddress   ?>  ><br>
							<label >Email</label>
							<input type="text" id="x_email" name="x_email" class="form-control input-lg input-forme text-center"  value=<?php echo $xemail  ?>  ><br>
							<label >Mobile</label>
							<input type="text" id="x_mobile " name="x_mobile" class="form-control input-lg input-forme text-center"  value=<?php echo $xmobile  ?>  ><br>
							<input type="hidden" id="x_user " name="x_user" class="form-control input-lg input-forme text-center"  value=<?php echo $username  ?>  ><br>

							<button type="submit" class="bnt btn-primary btn-lg">Update Profile</button>
							<button type="button" class="bnt btn-default btn-lg" onclick="window.location.href = '/aaa/home_load.php' " >Back to Home </button>


						</form>

					</div>
					<div class="col-md-3"></div>
				</div>
				
				
			</div>
		</div>
		<div class="col-md-3"></div> 
	</div>




	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/myscript.js"></script> -->
</body>

</html>

