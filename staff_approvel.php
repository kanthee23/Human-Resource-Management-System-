<!-- staff_approvel.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');
	
	if ($department_id == '2'){
	}else{
		header("location: index.php");
	}
	
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $val = $_POST['approved'];
        $myArray = explode(',', $val);
		$un  = "$myArray[0]";
		$cmd = "$myArray[1]";
		
		if ($cmd = 'APP'){
			
			$sql = "UPDATE `basic` SET approved='1' WHERE  username =  '$un'";
			$tem = $conn->query($sql);

			// $result = $conn->query($sql);
		}elseif ($cmd = 'DEL') {
			$sql = "DELETE FROM `basic` WHERE username =  '$un'";
			$tem = $conn->query($sql);
		}
    }
    

    $sql2 = "SELECT deparment_name FROM departments WHERE  deparment_id  = '$department_id'";
	$result = $conn->query($sql2);
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
	    $department = $row["deparment_name"];
	  }
	}

    $sql= "SELECT username, firstname, lastname, mobile FROM `basic` WHERE approved ='0'" ;

	$result = $conn->query($sql);

    

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
	      <li><a href="home_hr.php">Home</a></li>
	      <li class="dropdown active">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">HR-Option
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="staff.php">Staff </a></li>
	          <li><a href="#">Manager</a></li>
	          <li><a href="department.php">Deparment</a></li>

	        </ul>
	      </li>


	    </ul>

	     <ul class="nav navbar-nav navbar-right">
	     	<li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo(" "  .$firstname) ?> </a></li>
	      	<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>

	    </ul>
	  </div>
	</nav>

	<div class="row ">
       <div class="col-md-3">
       		<div class="container-fluid text-center well"> 
       			<a class="text-primary" href ="staff_approvel.php">New Staff Approvel </a> <br> <br>
       			<a class="text-primary" href ="staff_ full_detail.php">Full Staff Detail</a>  <br> <br>
       			<a class="text-primary" href ="staff_ review.php">Staff Review</a>  <br> <br>
       			<a class="text-primary" href ="#">Staff End Hire</a><br> <br>
       			<a class="text-primary" href ="staff_leave_calender.php">Staff Leave Callender</a><br> <br>
        	</div>
       </div> 
       <div class="col-md-6">
            <div class="container-fluid  well"> 
            	<table class="table table-condensed">
				    <thead>
					      <tr >
					        <th>Employee No</th>
					        <th>Full Name</th>
					        <th>Mobile</th>
					        <th>Status </th>
					      </tr>
				    </thead>
				    <tbody>
					    <?php 
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){  
									$u = $row["username"];
									$fn = $row["firstname"] . " " . $row["lastname"];
									$dep = $row["mobile"];
					
								?>
									<tr>
										<form class="submit" action="staff_approvel_fun.php" method="post">
											<td name = "un"><?php echo ("$u"); ?></td>
											<td><?php echo "$fn"; ?></td>
											<td><?php echo "$dep"; ?></td>
											<td>
												<button class="btn btn-warning" type="submit" name="approvel"  value="<?php echo ("$u"); ?>" >Full Details</button>
											
											</td>
										</form>
										
									</tr>
								<?php }
							}

					     ?>
				    
				     </tbody>
				    
				</table>

        	</div>
        </div>

        <div class="col-md-3"></div> 
    </div>
	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
</body>

</html>
