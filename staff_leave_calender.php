<!-- staff_leave_calender.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');
	
	if ($department_id == '2'){

	}else{
		header("location: index.php");
	}
	
	
	include 'Calendar.php';
	$calendar = new Calendar(date('Y-m-d'));
	$sql2 = "SELECT * FROM req_leave WHERE dep_id = '1'  AND  status = 'Approved'";
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
	$sql2 = "SELECT * FROM req_leave WHERE dep_id = '2'  AND status = 'Approved'";
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

		$calendar->add_event($s_username, $s_leave_start_date ,$s_leave_days , 'red');
	}	
	$sql2 = "SELECT * FROM req_leave WHERE dep_id = '3'  AND status = 'Approved'";
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

		$calendar->add_event($s_username, $s_leave_start_date ,$s_leave_days , 'yellow');
	
	}

	$sql2 = "SELECT * FROM req_leave WHERE dep_id = '4'  AND status = 'Approved'";
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

		$calendar->add_event($s_username, $s_leave_start_date ,$s_leave_days , 'blue');
	}

	$sql2 = "SELECT * FROM req_leave WHERE dep_id = '5'  AND status = 'Approved'";
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

		$calendar->add_event($s_username, $s_leave_start_date ,$s_leave_days , 'pink');
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
       <div class="col-md-9">
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
					 <label style="background-color: lightgreen;">Admin</label> 
					<br>
					<label style="background-color: red;">HR</label> 
					<br>
					<label style="background-color: yellow;">Planing</label> 
					<br>
					<label style="background-color: blue;">QAQC</label> 
					<br>
					<label style="background-color: pink;">Construction</label> 



				</div>

        	</div>
        </div>

        <div class="col-md-3"></div> 
    </div>
	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
</body>

</html>
