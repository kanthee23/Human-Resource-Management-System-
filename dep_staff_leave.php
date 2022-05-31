<!-- dep_staff_leave.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');

	
	$msg_1 = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$lev_btn_val		= $_REQUEST['approvel'];
		$lev_id			= $_REQUEST['id'];

		if ($lev_btn_val == 'Approved'){

			$sql = "UPDATE req_leave SET status = 'Approved' WHERE id = '$lev_id'";

		}elseif ($lev_btn_val == 'Rejected'){
			$sql = "UPDATE req_leave SET status = 'Rejected' WHERE id = '$lev_id'";
			
		}


		if ($conn->query($sql) === TRUE) {
		  // $msg_1 =  "Submited successfully";
		} else {
		  $msg_1 = "Error: " . $sql . "<br>" . $conn->error;
		}
		echo $msg_1;

	}else{
		if ($manager_id > 0){

		}else{
			
			header("location: index.php");
		}

	}
	$sql2 = "SELECT * FROM req_leave WHERE dep_id = '$department_id' AND status = 'Pending'";
	$result = $conn->query($sql2);
	

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
       <div class="col-md-8">
            <div class="container-fluid  well"> 
            	<div class=" text-center">
            		<h3 >Manage Department</h3>
            	</div>
            	
            	<table class="table table-condensed">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>E.ID</th>
										<th>Application Date</th>
										<th>Leave Start Date</th>
										<th>Number of Days</th>
										<th>Leave Type</th>
										<th>Status</th>
										<th>Approvel</th>

								</thead>
								<tbody>
									<?php 	
											$sn = 0;
											if ($result->num_rows > 0) {
												while($row = $result->fetch_assoc()){
													$sn 				= $sn + 1; 
													$s_id				= $row["id"];
													$s_username			= $row["username"];
													$s_application_date	= $row["requestdate"];
													$s_leave_type		= $row["leave_type"];
													$s_leave_start_date = $row["leave_start_date"];
													$s_leave_end_date 	= $row["leave_end_date"];
													$s_status 			= $row["status"];
													$s_leave_reason 	= $row["reason"];
													$s_leave_days 		= $row["leave_days"] ?>
												

									<tr>
										<form class="submit" action="#" method="post">
											<td><?php echo "$sn"; ?></td>
											<td><?php echo "$s_username"; ?></td>
											<td><?php echo "$s_application_date"; ?></td>
											<td><?php echo "$s_leave_start_date"; ?></td>
											<td><?php echo "$s_leave_days "; ?></td>
											<td><?php echo "$s_leave_type"; ?></td>
											<td><?php if($s_status == 'Pending') { echo( '<span style="color:#00CD00;">Pending</span>');} elseif ($s_status == 'Approved'){ echo( '<span style="color:#00AAFF;">Approved</span>'); } elseif ($s_status == 'Rejected'){ echo( '<span style="color:#F50000;">Rejected</span>'); } ?></td>

											<td>
												<input type="hidden" name="id" value= <?php echo "$s_id"; ?> >
												<button class="btn btn-primary" type="submit" name="approvel" value="Approved")>Approved</button>
												<button class="btn btn-danger" type="submit" name="approvel" value="Rejected")>Rejected</button>
											</td>
											</form>

												
											<?php 
												}
											}
										?>
									</tr>
								</tbody>
							</table>
        	</div>
        </div>

        <div class="col-md-1"></div> 
    </div>

	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
</body>

</html>
