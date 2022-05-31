<!-- staff_ full_detail_single.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');
	
	if ($department_id == '2'){

	}else{
		header("location: index.php");
	}
	

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo "$_POST['approvel']";
        
        $val = $_POST['approvel'];
        
        $sql= "SELECT * FROM `basic` WHERE username ='$val'" ;

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){


			$xusername 		= $val;
            $xfirstname 	= $row["firstname"];
            $xlastname		=$row["lastname"];
			$xnic 			= $row["nic"];
	  		$xaddress 		= $row["address"];
	  		$xemail 		= $row["email"];
	  		$xmobile 		= $row["mobile"];
	  		

	  		$xbank 			= $row["bank"];
	  		$xac_number 	= $row["ac_number"];
	  		$xsalary 		= $row["salary"];

	  		$xdepartment_id	= $row["department_id"];
	  		$xhire_date 	= $row["hire_date"];
	  		
	  		$forapprovel 	= $xusername . ",APP" ; 
	  		$fordelete 		= $xusername . ",DEL" ;
			}
		}
    }


    

	$sql2 = "SELECT deparment_name FROM departments WHERE  deparment_id  = '$xdepartment_id'";
	$result = $conn->query($sql2);
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
	    $xdepartment = $row["deparment_name"];
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
       			<a class="text-primary" href ="staff_ full_detail.php">Back to Staff Full Details </a> <br> <br>

        	</div>
       </div> 
       <div class="col-md-6">
            <div class="container-fluid  well"> 
            	<form class="submit" action="#" method="post">
	            	<table class="table table-hover">
	            		<tbody>
	            			<tr>
	            				<td>Full Name</td>
	            				<td><?php echo ("$xfirstname  "  ."$xlastname");  ?> </td>
	            			</tr>
	        				<tr>
	        					<td>Employee No</td>
	        					<td><?php echo ("$xusername");  ?> </td>	
	        				</tr>
	        				<tr>
	        					<td>NIC </td>
	        					<td><?php echo " $xnic";  ?></td>
	        				</tr>

	        				<tr>
	        					<td>Address</td>
	        					<td><?php echo "  $xaddress";  ?></td>
	        				</tr>

	        				<tr>
	        				<tr>
	        					<td>Email</td>
	        					<td><?php echo "  $xemail";  ?></td>
	        				</tr>

	        				<tr>
	        					<td>Mobile</td>
	        					<td><?php echo "  $xmobile";  ?></td>
	        				</tr>

	        				<tr>
	        					<td>Department</td>
	        					<td><?php echo " $xdepartment ";  ?></td>
	        				</tr>
	        				<tr>
	        					<td>Hire Date</td>
	        					<td><?php echo "  $xhire_date";  ?></td>
	        				</tr>
	        				<tr>
	        					<td>Bank Name </td>
	        					<td><?php echo "$xbank";  ?> </td>
	        				</tr>
	        				<tr>
	        					<td>Account Number </td>
	        					<td><?php echo "$xac_number";  ?> </td>

	        				</tr>
	        				<tr>
	        					<td>Basic Salary </td>
	        					<td><?php echo ("Rs" . "$xsalary");  ?> </td>
	        				</tr>
	        						
	            		</tbody>
	            	</table>

	            	<button type="submit" class="btn btn-primary  btn-lg" name="approved"  value="<?php  ?> ">Print </button>
	            	

	        		<!-- <button type="submit" class="btn btn-danger  btn-lg">Delete </button> -->

        	</div>
        </div>

        <div class="col-md-3"></div> 
    </div>
	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
</body>

</html>
