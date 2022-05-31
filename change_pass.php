<!-- change_pass.php -->
<?php
	include('connection/connection.php');
	include('welcome.php');
	$department_id 			=$_SESSION["department_id"];	 
	$manager_id				=$_SESSION["manager_id"];

	
	if ($username == '' ){
		header("location: index.php");
	}else{
		$msg_1 = '';
		$sn = 0;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$old_pass 	= md5($_REQUEST['old_password']);
			$new_pass 	= md5($_REQUEST['new_password']);
			if ($pass == $old_pass){
				$sql = "UPDATE basic SET pass = '$new_pass' WHERE username ='$username'";

				if ($conn->query($sql) === TRUE) {

					$_SESSION["pass"] = $new_pass;
				  	$msg_1 =  "Your Password changed successfully";
				  	
				} else {
				  $msg_1 = "Error: " . $sql . "<br>" . $conn->error;
				}

			}else{

				$msg_1 =  "Your old Password not matched";
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
						<h4 class="text-primary text-center">Logging Password change Form</h4> <br>
						<br>
						<form action ="#" method="post" >
							<input type="password" id="old_password" name="old_password" class="form-control input-lg input-forme"   placeholder="Existing Password" ><br>
							<input type="password" id="new_password" name="new_password" class="form-control input-lg input-forme"   placeholder="New Password" ><br>
							<input type="password" id="new_password2" name="new_password2" class="form-control input-lg input-forme"   placeholder="Confirm New Password" ><br>

							<button type="submit" class="bnt btn-primary btn-lg">Update Pass</button>
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

