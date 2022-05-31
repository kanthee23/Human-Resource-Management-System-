<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');
		
    $sql = "SELECT * FROM departments ";
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
       			<a class="text-primary" href ="#">Department</a><br> <br>
       			<a class="text-primary" href ="#"></a><br> <br>
       			<a class="text-primary" href ="#"></a><br> <br>
       			<a class="text-primary" href ="#"></a><br> <br>
        	</div>
       </div> 
       <div class="col-md-6">
            <div class="container-fluid  well"> 
            	<div class=" text-center">
            		<h3 >Manage Department</h3>
            	</div>
            	
            	<table class="table">
            		<thead>
            			<tr>
            				<th>Department Name </th>
            				<th>Manager Name </th>
            				<th>Number of Staffs</th>
            				<th>Operation</th>
            			</tr>
         			
            		</thead>
            		<tbody>
            			<?php 
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){  
									$ddepartment_id = $row["deparment_id"];
									$ddname 	= $row["deparment_name"];
									$dmanager_id = $row["manager_id"];


									$sql3 = "SELECT firstname, lastname FROM basic WHERE  username = '$dmanager_id'";
									$result2 = $conn->query($sql3);
									if ($result2->num_rows > 0) {
									  while($row2 = $result2->fetch_assoc()) {
									    $dmanager = $row2["firstname"] . " " . $row2["lastname"] ;
									  }
									}else{
										$dmanager = "Not - Available";
									}
									
								?>
									<tr>
										<form class="submit" action="#" method="post">
											<td><?php echo "$ddname"; ?></td>
											<td><?php echo "$dmanager"; ?></td>
											<td><?php echo "111"; ?></td>
											<td>
												<button class="btn btn-primary" type="submit" name="approvel"  value="<?php echo ("$ddepartment_id"); ?>" >Add/Edit</button>
												
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
