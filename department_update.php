<!-- department_update.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$ddepartment_id = $_POST['dep'];
	    $sql = "SELECT * FROM departments WHERE deparment_id = '$ddepartment_id' ";
		$result = $conn->query($sql);	

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){  
				$ddepartment_name = $row['deparment_name'];

				if (empty($row['last_eddit'])){
					$dlast_eddit = "Not Define";
				}
				else{
					
					$dlast_eddit_id = $row['last_eddit'];
					$sql3 = "SELECT firstname, lastname FROM basic WHERE  username = '$dlast_eddit_id'";
					$result3 = $conn->query($sql3);
					if ($result3->num_rows > 0) {
						while($row3 = $result3->fetch_assoc()) {
							$dlast_eddit = $row3["firstname"] . " " . $row3["lastname"] .  " : " . $dlast_eddit_id;
						}
					}else{
						$dlast_eddit = "Not Define";
					}
				}

				if (empty($row['manager_id'])){
					$dmanager = "Not Define";
				}else{
					$dmanger_id = $row['manager_id'];
					$sql3 = "SELECT firstname, lastname FROM basic WHERE  username = '$dmanger_id'";
					$result2 = $conn->query($sql3);
					if ($result2->num_rows > 0) {
						while($row2 = $result2->fetch_assoc()) {
							$dmanager = $row2["firstname"] . " " . $row2["lastname"] ;
						}
					}else{
						$dmanager = "Not Define";
					}	
				}
			}
		}
		
	}
	else{
		header("location: department.php");
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
       			<a class="text-primary" href ="department.php">Retun to Department</a><br> <br>
       			<a class="text-primary" href ="#"></a><br> <br>
       			<a class="text-primary" href ="#"></a><br> <br>
       			<a class="text-primary" href ="#"></a><br> <br>
        	</div>
       </div> 
       <div class="col-md-6">
            <div class="container-fluid  well"> 
            	<h3 class="text text-default">Manage Department</h3>
            	<br>
            	<div class="col-md-4 ">
            		<div class="text text-primary">
            			<label>Department Name  </label>  <br><br> 
            			<label>Existing Manager </label> <br><br>
            			<label>Select New Manager</label><br><br>
            			<label>Last update Person </label><br><br>

            		</div>

            	</div>
            	<div class="col-md-8">
            		<div class="text text-primary">

            			<?php echo "$ddepartment_name"; ?> <br><br>
            			<?php echo "$dmanager"; ?>  <br><br>
            			<form action="department_update_add.php" method="post">
            				<?php 
		            		$sql4 = "SELECT username, firstname, lastname FROM basic WHERE  department_id = '$ddepartment_id' AND approved = '1'";
							$result4 = $conn->query($sql4); ?>

            				<select class="form-control input-form" name="new_manager">
            					<?php 
            					if ($result4->num_rows > 0) {
									while($row4 =  $result4->fetch_assoc()) {
										$dname = $row4["firstname"] . "  " .  $row4["lastname"] ;
										?>
										<option value="<?php echo($row4['username']) ?>"> <?php echo "$dname"; ?> </option> 

								<?php }} ?>
            					
            				</select>
            				<br>
            				<?php echo "$dlast_eddit"; ?>  <br><br>

            			<button type="submit" class="btn btn-danger" name = "dep" value="<?php echo("$ddepartment_id") ?>"> Assign as Manager</button>
            			</form>
            			
            		</div>
            	</div> 	
            </div>
        </div>
   	</div>

    <div class="col-md-3"></div> 
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
