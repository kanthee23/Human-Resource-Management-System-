<!-- staff_full_details.php -->

<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');
	
	if ($department_id == '2'){

	}else{
		header("location: index.php");
	}
	
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	$zun 	= $_POST['zusername'];
    	$zfn 	= $_POST['zfirstname'];
    	$zln 	= $_POST['zlastname'];
    	$zhire 	= $_POST['zhire'];
    	$znic 	= $_POST['znic'];
    	$zmobile 	= $_POST['zmobile'];
    	$zdepartment 	= $_POST['zdepartment'];

    	$res = "approved ='1'";

    	if (empty($zun)){
    		// $sql= "SELECT * FROM `basic` WHERE approved ='1'" ;
    	}else{
    		$res = $res . " AND username ='$zun'";
    	}
    	if(empty($zfn)){

    	}else{
    		$res = $res . " AND firstname ='$zfn'";
    	}
    	if(empty($zln)){

    	}else{
    		$res = $res . " AND lastname ='$zln'";
    	}
    	if(empty($zhire)){

    	}else{
    		$res = $res . " AND hire_date ='$zhire'";
    	}

    	if(empty($znic)){

    	}else{
    		$res = $res . " AND nic ='$znic'";
    	}
    	if(empty($zmobile)){

    	}else{
    		$res = $res . " AND mobile ='$zmobile'";
    	}
    	if(empty($zdepartment)){

    	}else{
    		    $sql2 = "SELECT deparment_id FROM departments WHERE deparment_name = '$zdepartment'";
				$result2 = $conn->query($sql2);
				if ($result2->num_rows > 0) {
				  while($row2 = $result2->fetch_assoc()) {
				    $zdepartment_id = $row2["deparment_id"];

				  }
				  
				  $res = $res . " AND department_id ='$zdepartment_id'";

				}

    	}

    	$sql= "SELECT * FROM `basic` WHERE $res" ;
		$result = $conn->query($sql);

    }
	else{

	    $sql2 = "SELECT deparment_name FROM departments WHERE  deparment_id  = '$department_id'";
		$result = $conn->query($sql2);
		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
		    $department = $row["deparment_name"];
		  }
		}

	    $sql= "SELECT * FROM `basic` WHERE approved ='1'" ;
		$result = $conn->query($sql);

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
				    	<tr>
				    		<form action="#" method="post">
					    		<td><input type="text" name="zusername" class="form-control"></td>
					    		<td><input type="text" name="zfirstname" class="form-control"></td>
					    		<td><input type="text" name="zlastname" class="form-control"></td>
					    		<td><input type="date" id="hire" class="form-control input-forme" name = "zhire"> </td>
					    		<td><select class="form-control input-forme" id="department" name ="zdepartment" >
	                                <option></option>
	                                <option>Admin</option>
	                                <option>Construction</option>
	                                <option>HR</option>
	                                <option>Planing</option>
	                                <option>QAQC</option>
		                            </select>  
    		                    </td>
					    		<td><input type="text" name="znic" class="form-control"></td>
					    		<td><input type="text" name="zmobile" class="form-control"></td>
					    		<td><button type="submit" class="btn btn-success">Search</button></td>
					    	</form>
				    	</tr>
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
										<form class="submit" action="staff_ full_detail_single.php" method="post">
											<td><?php echo "$u"; ?></td>
											<td><?php echo "$fn"; ?></td>
											<td><?php echo "$ln"; ?></td>
											<td><?php echo "$xhire_date"; ?></td>
											<td><?php echo "$xdepartment"; ?></td>
											<td><?php echo "$xnic"; ?></td>
											<td><?php echo "$xmobile"; ?></td>
											<td>
												<button class="btn btn-primary" type="submit" name="approvel"  value="<?php echo ("$u"); ?>" >Full Details</button>
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
