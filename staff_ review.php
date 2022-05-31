<!-- staff_ review.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');
	if ($department_id == '2'){

	}else{
		header("location: index.php");
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$val 	= $_POST['susername'];
		$sql= "SELECT hrreview.review, basic.firstname, basic.lastname, hrreview.date FROM `hrreview` LEFT JOIN `basic` ON hrreview.username=basic.username WHERE hrreview.username='$val'" ;
		$result = $conn->query($sql);


	}else{
		$sql= "SELECT hrreview.review, basic.firstname, basic.lastname, hrreview.date FROM `hrreview` LEFT JOIN `basic` ON hrreview.username=basic.username" ;
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
            <div class="container-fluid text-center well"> 
            	<form action="#" method = "post" class="form">
            		<div class="text text-left col-md-2">
            			<label class="text " for="username">Enter the Employee ID  </label>
            		</div>
            		<div class="col-md-2">
            			<input type="text " class = "form-control text-center" name="susername">
            			
            		</div>
            		<div class="col-md-2">
            			<button type="submit" class="btn btn-primary">Search for Review</button>
            		</div>


            	</form>
            	<br><br>    

            	<table class="table">
            		<thead>
            			<tr>
            				<th> First Name </th>
            				<th> Last Name </th>
            				
            				<th> Review  </th>
            			</tr>
            		</thead>
            		<tbody>
            			
            			<?php 
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){  
									
									$fn 	= $row["firstname"];
									$ln 	= $row["lastname"];
									$review = $row["review"];
									
								?>
									<tr>
										<form class="submit" action="staff_full_detail_single_manger.php" method="post">
											
											<td><?php echo "$fn"; ?></td>
											<td><?php echo "$ln"; ?></td>
											
											<td><?php echo "$review"; ?></td>
											
										</form>
										
									</tr>
								<?php }
							}

					     ?>


            		</tbody>
            	</table>

        	</div>
        </div>

       
    </div>

	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
</body>

</html>
