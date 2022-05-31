<!-- dep_staff_leave_cal.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');

	
	include 'Calendar.php';
	$calendar = new Calendar(date('Y-m-d'));
	$sql2 = "SELECT * FROM req_leave WHERE dep_id = '$department_id' AND status = 'Approved'";
	$result = $conn->query($sql2);

	while($row = $result->fetch_assoc()){
		
		$s_username		    = $row["username"];
		$s_application_date	= $row["requestdate"];
		$s_leave_type		= $row["leave_type"];
		$s_leave_start_date = $row["leave_start_date"];
		$s_leave_end_date 	= $row["leave_end_date"];
		$s_status 			= $row["status"];
		$s_leave_reason 	= $row["reason"];
		$s_leave_days 		= $row["leave_days"] ;

		$calendar->add_event($s_username, $s_leave_start_date ,$s_leave_days , 'green');
	}
	$sql2 = "SELECT * FROM req_leave WHERE dep_id = '$department_id' AND status = 'Pending'";
	$result = $conn->query($sql2);

	while($row = $result->fetch_assoc()){
		
		$s_username		    = $row["username"];
		$s_application_date	= $row["requestdate"];
		$s_leave_type		= $row["leave_type"];
		$s_leave_start_date = $row["leave_start_date"];
		$s_leave_end_date 	= $row["leave_end_date"];
		$s_status 			= $row["status"];
		$s_leave_reason 	= $row["reason"];
		$s_leave_days 		= $row["leave_days"] ;

		$calendar->add_event($s_username, $s_leave_start_date ,$s_leave_days , 'Red');
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
        <link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/calendar.css" rel="stylesheet" type="text/css">

</head>
<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Largo Trading</a>
	    </div>

	    <ul class="nav navbar-nav">
	      <li><a href="home_hr.php">Home</a></li>


	      <li ><a href="manager.php">Manager Option</a></li>

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
       			<a class="text-primary" href ="manager.php">Manager Home</a><br> <br>
       			<a class="text-primary" href ="dep_staff_list.php">Staff List</a><br> <br>
       			<a class="text-primary" href ="dep_staff_leave.php">Staff leave Request</a><br> <br>
       			<a class="text-primary" href ="dep_staff_leave_cal.php">Staff leave Calander</a><br> <br>
       			<a class="text-primary" href ="dep_staff_review.php">Add Review</a><br> <br>
       			

       			
       			<a class="text-primary" href ="#"></a><br> <br>
       			<a class="text-primary" href ="#"></a><br> <br>
        	</div>
       </div> 
       <div class="col-md-6">
            <div class="container-fluid  well"> 
            	
            	<nav class="navtop">
			    	<div>
			    		<h1>Staff Leave Calendar</h1>
			    	</div>
		    	</nav>
				<div class="content home">
					<?=$calendar?>
				</div>
				<div>
					 <label style="background-color: lightgreen;">Approved Leave</label> 
					<br>
					<label style="background-color: yellow;">Pending Leave</label> 
					  
				</div>

        </div>

        <div class="col-md-3"></div> 
    </div>

	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
</body>

</html>
