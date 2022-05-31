<!-- dep_staff_review _add.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$val 	= $_POST['approvel'];
		$identity 	= $_POST['identity'];

		if ($identity == 1){
			$sql= "SELECT hrreview.review, basic.firstname, basic.lastname, hrreview.date FROM `hrreview` RIGHT JOIN `basic` ON hrreview.username=basic.username  WHERE hrreview.username='$val'" ;
			
			$result = $conn->query($sql);

		}if ($identity == 2){
			$review  = $_POST['review'];
			$dd 	= date("Y/m/d");
			echo $dd;

			$sql2= "INSERT INTO  hrreview(username, date, review_by, review) VALUES ('$val','$dd','$username','$review')" ;	

			if ($conn->query($sql2) === TRUE) {
			  
			  	$msg = "New record created successfully"; 
			  	echo "$msg";

			} else{
				echo ("Error: " . $sql . "<br>" . $conn->error);
			  	
			}

			$sql= "SELECT hrreview.review, basic.firstname, basic.lastname, hrreview.date FROM `hrreview` RIGHT JOIN `basic` ON hrreview.username=basic.username  WHERE hrreview.username='$val'" ;
        
			$result = $conn->query($sql);
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
	      <li ><a href="manager.php">Add New Review</a></li>
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
       			<a class="text-primary" href ="dep_staff_review.php"> Back to Review </a> <br> <br>
       			<a class="text-primary" href ="#"></a><br> <br>
       			<a class="text-primary" href ="#"></a><br> <br>
        	</div>
       </div> 
       <div class="col-md-6">
            <div class="container-fluid  well"> 
            	<div class=" text-center">
            		<h3 >Manage Department</h3>
            	</div>
            	
            	<form class="submit" action="#" method="post">
					
					<div class="col-md-12">
                            <br>
                            <textarea  type="textarea " id="review" rows="3"  class="form-control input-lg input-forme"   placeholder="Review" name ="review" > </textarea><br>
                            <input type="hidden" name="approvel" value="<?php echo $val ?>">
                            <input type="hidden" name="identity" value="2">
                            
                        </div>
                        <input id = "submit" type="submit" class="btn btn-success" value="Add Review"> 
                    </form>
				</form>
				<br>
				<br>
				<table class="table table-condensed">
				    <thead>
					      <tr >
					      	
					        <th>First Name</th>
					        <th>Last Name</th>
					        <th>Review Date</th>
					        <th>Review</th>
					     
					      </tr>
				    </thead>
				    <tbody>
				    
					    <?php 
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){  
									
									$fn 	= $row["firstname"];
									$ln 	= $row["lastname"];
									$dat    = $row["date"];
									$review = $row["review"];				
								?>
									<tr>
										<form class="submit" action="staff_full_detail_single_manger.php" method="post">
											
											<td><?php echo "$fn"; ?></td>
											<td><?php echo "$ln"; ?></td>
											<td><?php echo "$dat"; ?></td>
											<td><?php echo "$review"; ?></td>
											
										</form>
										
									</tr>
								<?php }
							}

					     ?>
				    
				     </tbody>            	
        	</div>
        </div>

        <div class="col-md-3"></div> 
    </div>

	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
</body>

</html>
