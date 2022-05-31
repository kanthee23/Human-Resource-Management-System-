<?php
	
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
	      <li class="active"><a href="#">Home</a></li>
	      <li><a href="#">Edit</a></li>
	      <li><a href="#">Time Sheet</a></li>
	      <li><a href="#">Salary Details</a></li>
	    </ul>

	     <ul class="nav navbar-nav navbar-right">
	      <li><a href="#"><span class="glyphicon glyphicon-user"></span> ------- </a></li>
	      <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
	    </ul>
	  </div>
	</nav>

	<div class="row ">
       <div class="col-md-3"></div> 
       <div class="col-md-6">
            <div class="container-fluid text-center well"> 

            	<div class="row ">
	            	<div class="col-md-4"> 
	            		<img src="image/staff_logo.png" class="img-rounded" alt="Not available"  width="200" height="200">
	            		<p></p>

	            		<button type="button" class="btn btn-primary btn-md">Request Leave</button>
	            		<p> </p>
	            		<button type="button" class="btn btn-primary btn-md" onclick="document.location = 'req_leave.php'">Change password</button>
	            		<p> </p>
	            		<button type="button" class="btn btn-danger btn-md">Edit Information</button>
	            		<p> <br> </p>

	            		<P class="text-primary" >HR Review</P>

	            		<P class="text-default text-left" ><?php echo "Basic Detailk kkkkkkkkkkkkkkkkkkkkkkks";  ?> </P>

	            		
	            	</div>
	            	<div class="col-md-8">
	            		<P class="text-primary" >Basic Details</P>


	            		<table class="table table-hover">
	            		
	            			<tbody>
	            			
	            				<tr>
	            					<td>Full Name</td>
	            					<td>kantheepan </td>
	            				</tr>
	            				<tr>
	            					<td>User Name</td>
	            					<td><?php echo "Name";  ?></td>
	            				</tr>
	            				<tr>
	            					<td>NIC </td>
	            					<td><?php echo "  Name";  ?></td>
	            				</tr>

	            				<tr>
	            					<td>Address</td>
	            					<td><?php echo "  Name";  ?></td>
	            				</tr>

	            				<tr>
	            				<tr>
	            					<td>Email</td>
	            					<td><?php echo "  Name";  ?></td>
	            				</tr>

	            				<tr>
	            					<td>Mobile</td>
	            					<td><?php echo "  Name";  ?></td>
	            				</tr>

	            				<tr>
	            					<td>Department</td>
	            					<td><?php echo "  Name";  ?></td>
	            				</tr>

	            				<tr>
	            					<td>Hire Date</td>
	            					<td><?php echo "  Name";  ?></td>
	            				</tr>

	            				

	            			</tbody>

	            		</table>
	            		<P class="text-primary" > Salary Details</P>

	            		<table class="table table-hover">
	            			<tbody>
	            				<tr>
	            					<td>Bank Name </td>
	            					<td><?php echo "";  ?> </td>

	            				</tr>
	            				<tr>
	            					<td>Account Number </td>
	            					<td><?php echo "ac";  ?> </td>

	            				</tr>
	            				<tr>
	            					<td>Basic Salary </td>
	            					<td><?php echo "Rs -.-";  ?> </td>

	            				</tr>

	            			</tbody>
	            		</table>
	            		<P class="text-primary" > Leave Details</P>

	            		<table class="table table-hover">
	            			<thead>
	            				<tr>
	            					<th>
	            						Type of Leave 	
	            					</th>
	            					<th>
	            						Leave Taken
	            					</th>
	            					<th>
	            						Balance Leave 
	            					</th>

	            				</tr>
	            			</thead>
	            			<tbody>
	            				<tr>
	            					<td>Casual </td>
	            					<td><?php echo "7";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            				</tr>
	            				<tr>
	            					<td>Anual </td>
	            					<td><?php echo "7";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            				</tr>
	            				<tr>
	            					<td>Medical </td>
	            					<td><?php echo "7";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
								</tr>
	            				<tr>
									<td>Medical </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>

	            				</tr>
	            			</tbody>

	            		</table>

	            		<P class="text-primary" >Request Approvel</P>

	            		<table class="table table-hover">
	            			<thead>
	            				<tr>
	            					<th>
	            						Type of Leave 	
	            					</th>
	            					<th>
	            						Request Date
	            					</th>
	            					<th>
	            						Leave Date 
	            					</th>
	            					<th>
	            						No of Days
	            					</th>
	            					<th>
	            						Status
	            					</th>
	            				</tr>
	            			</thead>
	            			<tbody>
	            				<tr>
	            					
	            					<td><?php echo "7";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            				</tr>
	            				<tr>
	            					
	            					
	            					<td><?php echo "7";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            				</tr>
	            				<tr>
	            					
	            					<td><?php echo "7";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            				</tr>
	            				<tr>
	            					
	            					<td><?php echo "7";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            				</tr>
	            				<tr>
						
	            					
	            					<td><?php echo "7";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            					<td><?php echo "0";  ?> </td>
	            				

	            				</tr>
	            			</tbody>
	            		</table>
	            	</div>
	            </div>
            </div>
        </div>
    </div>



	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
</body>

</html>