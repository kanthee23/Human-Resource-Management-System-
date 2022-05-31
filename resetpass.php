<!-- resetpass.php -->
<?php
include('connection/connection.php');

$reply_mgs = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  
    $username = $_REQUEST['username'];
    $pass     = md5($_REQUEST['password']);
    $pass2     = md5($_REQUEST['password']);
    $nic      = $_REQUEST['nic'];
    $mobile   = $_REQUEST["mobile"]; 

    if ($pass == $pass2){
        $sql = "SELECT username , approved, nic, mobile  FROM basic WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                if ($row["approved"] == '1'){
                    if (($nic == $row["nic"] ) AND ($mobile ==$row["mobile"])){

                        $sql = "UPDATE `basic` SET pass='$pass' ,  approved='0' WHERE  username =  '$username' ";
                        $tem = $conn->query($sql);
                        echo ($tem);

                        $reply_mgs = "Request Submited for HR Approval.";
                        

                    }else{
                        $reply_mgs = "Your NIC/Mobile information not match with databse. Please try again."    ;
                    } 
                }else{
                    $reply_mgs = "Your Account Not Activated, You cannot use this features. Please Contact HR Department.";
                }
            
          }
        }else{
            $reply_mgs = "Your Username not found. Please Contact HR Department or Try Again.";
        }


    }else{
        $reply_mgs = "Password are not matched.";
    }
}


$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
            
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>
            Largo - HRMS
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">


	</head>

	<body>
		<div class="panel-header ">

            <div class="text-center" > <p align='center'  class="text-primary"><h2 class="text-primary" >  Staff Password Reset Form</h2></p>
                <br>

            	<p align="center" class="text-warning"><?php echo "$reply_mgs" ?>; </p>
            	
            </div>

        </div>

        <div class="row ">
           <div class="col-md-3"></div> 
           <div class="col-md-6">
                <div class="container-fluid text-center well">        

                     <form action="#" method="post">
                        
                        <input type="text" id="username" name="username" class="form-control input-lg input-forme"   placeholder="User Name" ><br>
                        <div class="col-md-6">
                            <input type="password" name="password" id="password" class="form-control input-lg input-forme"   placeholder="New Password">     
                        </div>
                        <div class="col-md-6">
                            <input type="password" name = "password2" id="password2" class="form-control input-lg input-forme"   placeholder="Re-Password">    
                            <br>

                        </div>
                        
                       
                       
                        <div class="col-md-6">
                            <input type="text" name = "mobile" id="mobile" class="form-control input-lg input-forme"   placeholder="Mobile Number">     
                        </div>
                        <div class="col-md-6">
                            <input type="text" name = "nic" id="nic" class="form-control input-lg input-forme"   placeholder="NIC">
                            <br>
                        </div>
                        <button type="submit" class="bnt btn-primary btn-lg" >Submit For Approvel</button> 
                            
                        <button type="button" class="bnt btn-default btn-lg" onclick="window.location.href ='/aaa/index.php' " >Return to Home</button> 

                    
                </div>
                
            </form>

                </div>       
           </div>
           <div class="col-md-3"></div> 

        </div>
        

		
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

	</body>
	</html>
