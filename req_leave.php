<!-- req_leave.php -->
<?php
	include('connection/connection.php');
	include('welcome.php');
	
	if ($username == '' ){
		header("location: index.php");
	}else{
		$msg_1 = '';
		$sn = 0;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$application_date 	= date("Y-m-d");
			$leave_start_date 	= $_REQUEST['leave_start_date'];
			$leave_end_date 	= $_REQUEST['leave_end_date'];
			$leave_type			= $_REQUEST['leave_type'];
			$leave_reason		= $_REQUEST['leave_reason'];
			$leave_days			= intval($_REQUEST['leave_days']);
			$status 			= "Pending";

			// echo ($_REQUEST['leave_days']);

			$sql = "INSERT INTO req_leave( username, leave_type, requestdate, leave_start_date, 
				leave_end_date, status, reason,leave_days, dep_id)
			VALUES ('$username', '$leave_type','$application_date','$leave_start_date','$leave_end_date',
				'$status','$leave_reason','$leave_days', $department_id)";

			if ($conn->query($sql) === TRUE) {
			  $msg_1 =  "Your Leave application Submited successfully";
			} else {
			  $msg_1 = "Error: " . $sql . "<br>" . $conn->error;
			}
		}

		$sql2 = "SELECT * FROM req_leave WHERE username = '$username'";
		$result = $conn->query($sql2);

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
       		<p class="text-success"> <?php if($msg_1 ==''){}else{ echo ($msg_1);} ?> </p>
			<div class="container-fluid text-center well">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">

						<h4 class="text-primary text-center">Staff Leave Requesting Form</h4> <br>
						<br>

						<form action ="#" method="post" >
							
							<label for = "application_date" class="form-label">Leave start Date</label>  
							<input type="date" id="leave_start_date" name="leave_start_date" class="form-control input-lg input-forme"   ><br>
							
							<label for = "application_date" class="form-label" >Leave End Date</label>  

							<input type="date" id="leave_end_date" name="leave_end_date" class="form-control input-lg input-forme" onchange = "document.getElementById('leave_day').innerHTML = '( ' + (day_calculation(document.getElementById('leave_start_date').value,document.getElementById('leave_end_date').value) ) + ' Days )'  ; document.getElementById('leave_days').setAttribute('value',(day_calculation(document.getElementById('leave_start_date').value,document.getElementById('leave_end_date').value) )) ">


							<p id='leave_day' name = 'leave_day' class="text-warning"></p>

							<input type="hidden" name="leave_days" id ="leave_days" >

							<br>
							<select  id="leave_type" name="leave_type" class="form-control input-lg input-forme"  >		
								
								<option value="def" disabled selected>Select leave Type</option>
								<option value="anual">Anual Leave</option> 
								<option value="casual">Casual Leave</option>
								<option value="medical">Meadical Leave</option>
							</select>
							<br>
							<input type="text" id="leave_reason" name="leave_reason" class="form-control input-lg input-forme" placeholder="Reson of Leave"><br>
							<button type="submit" class="bnt btn-primary btn-lg" >Submit For Approvel</button> 
							
							<button type="button" class="bnt btn-default btn-lg" onclick="window.location.href ='/aaa/home_load.php' " >Return to Home</button> 
							
						</form>

					</div>
					<div class="col-md-3"></div>
				</div>
				
				
			</div>
		</div>
		<div class="col-md-3"></div> 
	</div>


		<div class="row ">
       <div class="col-md-3"></div> 
       <div class="col-md-6">
			<div class="container-fluid text-center well">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<h4 class="text-primary">Staff Leave Status</h4>

						<!-- Get data from database and update here  -->

						<div class="container-fluid well">
							<table class="table table-condensed">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>Application Date</th>
										<th>Leave Start Date</th>
										<th>Number of Days</th>
										<th>Leave Type</th>
										<th>Status</th>
								</thead>
								<tbody>
									<?php 	
											if ($result->num_rows > 0) {
												while($row = $result->fetch_assoc()){
													$sn 				= $sn + 1; 
													$s_application_date	= $row["requestdate"];
													$s_leave_type		= $row["leave_type"];
													$s_leave_start_date = $row["leave_start_date"];
													$s_leave_end_date 	= $row["leave_end_date"];
													$s_status 			= $row["status"];
													$s_leave_reason 	= $row["reason"];
													$s_leave_days 		= $row["leave_days"] ?>
												

									<tr>
										
										<td><?php echo "$sn"; ?></td>
												<td><?php echo "$s_application_date"; ?></td>
												<td><?php echo "$s_leave_start_date"; ?></td>
												<td><?php echo "$s_leave_days "; ?></td>
												<td><?php echo "$s_leave_type"; ?></td>
												<td><?php if($s_status == 'Pending') { echo( '<span style="color:#00CD00;">Pending</span>');} elseif ($s_status == 'Approved'){ echo( '<span style="color:#00AAFF;">Approved</span>'); } elseif ($s_status == 'Rejected'){ echo( '<span style="color:#F50000;">Rejected</span>'); } ?></td>
												
											<?php 
												}
											}
										?>
									</tr>
								</tbody>
							</table>

						</div>


					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div> 




	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/myscript.js"></script> -->
</body>

</html>

<script type="text/javascript">
	
	function day_calculation(a, b) {
	    var date1 = new Date(a);
	    var date2 = new Date(b);

	    var Difference_In_Time = date2.getTime() - date1.getTime();
	  
	    var Difference_In_Days = (Difference_In_Time / (1000 * 3600 * 24)) + 1 ;
	    
	    
	  	return Difference_In_Days;
	}

</script>
