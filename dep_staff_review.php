<!-- dep_staff_review.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');

	$sql= "SELECT * FROM `basic` WHERE approved ='1' AND department_id = $department_id" ;
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
            	<div class=" text-center">
            		<h3 >Manage Department Staff Review</h3>
            		<br>
            	</div>
            	
            	<table class="table table-condensed">
				    <thead>
					      <tr >
					      	<th>Job No </th>
					        <th>First Name</th>
					        <th>Last Name</th>
					        <th>Hire Date </th>
					        <th>Department</th>
					        <th>NIC</th>
					        <th>Mobile</th>
					        <th>Details </th>
					      </tr>
				    </thead>
				    <tbody>
				    
					    <?php 
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){  
									$u = $row["username"];
									$fn = $row["firstname"];
									$ln = $row["lastname"];
									$xmobile = $row["mobile"];
									$xdep = $row["department_id"];
									$xhire_date 	= $row["hire_date"];
									$xnic 			= $row["nic"];

									$sql3 = "SELECT deparment_name FROM departments WHERE  deparment_id  = '$xdep'";
									$result2 = $conn->query($sql3);
									if ($result2->num_rows > 0) {
									  while($row2 = $result2->fetch_assoc()) {
									    $xdepartment = $row2["deparment_name"];
									  }
									}

									
								?>
									<tr>
										<form class="submit" action="dep_staff_review _add.php" method="post">
											<td><?php echo "$u"; ?></td>
											<td><?php echo "$fn"; ?></td>
											<td><?php echo "$ln"; ?></td>
											<td><?php echo "$xhire_date"; ?></td>
											<td><?php echo "$xdepartment"; ?></td>
											<td><?php echo "$xnic"; ?></td>
											<td><?php echo "$xmobile"; ?></td>
											<td>
												<input type="hidden" name="identity" value="1">
												<button class="btn btn-primary" type="submit" name="approvel"  value="<?php echo ("$u"); ?>" >Add review</button>
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
