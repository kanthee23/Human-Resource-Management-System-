<!-- signup.php -->
<?php
include('connection/connection.php');

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
        <link rel="stylesheet" href="css/kan.css">

          <script>
            function checkallfill() {
                var username    = document.forms["regform"]["username"];
                var pass        = document.forms["regform"]["password"];             
                var pass2       = document.forms["regform"]["pass2"];
                var fname       =  document.forms["regform"]["fname"];               
                var lname       = document.forms["regform"]["lname"];                
                var nic         = document.forms["regform"]["nic"]; 

                var address     =  document.forms["regform"]["address"]; 
                var email       = document.forms["regform"]["email"]; 
                var mobile      = document.forms["regform"]["mobile"]; 

                var bank        = document.forms["regform"]["bank"]; 
                var ac_number   = document.forms["regform"]["ac_number"];
                                
                var department  = document.forms["regform"]["department"]; 
                var hire        = document.forms["regform"]["hire"]; 


                if (pass.value != pass2.value){
                    window.alert("Please check pasword not match.");
                    pass2.focus();
                    return false;
                }

                if (username.value == "") {
                    window.alert("Please enter your username.");
                    username.focus();
                    return false;
                }
                if (pass.value == "") {
                    window.alert("Please enter your pasword .");
                    pass.focus();
                    return false;
                }
                if (fname.value == "") {
                    window.alert("Please enter your first name.");
                    fname.focus();
                    return false;
                }
                if (lname.value == "") {
                    window.alert("Please enter your last name.");
                    lname.focus();
                    return false;
                }
                if (nic.value == "") {
                    window.alert("Please enter your NIC number.");
                    nic.focus();
                    return false;
                }

                if (address.value == "") {
                    window.alert("Please enter your Address.");
                    address.focus();
                    return false;
                }
                if (mobile.value == "") {
                    window.alert("Please enter your mobile number.");
                    mobile.focus();
                    return false;
                }
                if (email.value == "") {
                    window.alert("Please enter your email.");
                    email.focus();
                    return false;
                }


                if (bank.value == "") {
                    window.alert("Please selece your Bank Name.");
                    bank.focus();
                    return false;
                }
                if (ac_number.value == "") {
                    window.alert("Please enter your Salary Account number.");
                    ac_number.focus();
                    return false;
                }
                if (department.value == "") {
                    window.alert("Please Select your department.");
                    department.focus();
                    return false;
                }
                if (hire.value == "") {
                    window.alert("Please select hire date.");
                    hire.focus();
                    return false;
                }
                return true;
            }

        </script>


	</head>

	<body>
		<div class="panel-header ">

            <div class="text-center" > <p align='center'  class="text-primary"><h2 class="text-primary" > New Staff Sign Up Form</h2></p>
            	<p align="center" class="text-info">Please fill in this for to create an account </p>
            	
            </div>

        </div>

        <div class="row ">
           <div class="col-md-3"></div> 
           <div class="col-md-6">
                <div class="container-fluid text-center well">        

                     <form  name = "regform" action="submit.php" onsubmit="return checkallfill()"  method="post" >
                        
                        <div class="col-md-12 kw-dvp-HorizonalButton">
                            <span>Basic Details</span> <br>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <input type="text" id="username" class="form-control input-lg input-forme"   placeholder="Employee Num / User Name" name ="username" > <br>
                        </div>
                        <div class="col-md-6">
                            <input type="password" id="password" class="form-control input-lg input-forme"   placeholder="Password" name = "password">     
                        </div>
                        <div class="col-md-6">
                            <input type="password" id="pass2" class="form-control input-lg input-forme"   placeholder="Re-Password" name ="pass2" >    
                            <br>

                        </div>
                        <div class="col-md-6">
                            <input type="text" id="fname" class="form-control input-lg input-forme"   placeholder="First Name" name ="fname">     
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="lname" class="form-control input-lg input-forme"   placeholder="Last Name" name = "lname">
                            <br>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control input-lg input-forme" id="nic" placeholder="NIC" name ="nic"> <br>
                        </div>

                        
                        <div class="col-md-12 kw-dvp-HorizonalButton">
                            <span>Contact Details</span> <br>
                            
                        </div>
                        <div class="col-md-12">
                            <br>
                            <input type="text" id="address" class="form-control input-lg input-forme"   placeholder="Address" name ="address" > <br>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="mobile" class="form-control input-lg input-forme"   placeholder="Mobile Number" name ="mobile">     
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="email" class="form-control input-lg input-forme"   placeholder="e-mail" name ="email">
                            <br>
                        </div>
                        <div class="col-md-12 kw-dvp-HorizonalButton">
                            <span>Finance Details</span> 

                        </div>
                       
                        <div class="col-md-6 ">
                            <br>

                            <select class="form-control input-lg input-forme" id="bank"  name ="bank" >
                                <option> Amana Bank PLC </option>
                                <option> Bank of Ceylon</option>
                                <option> Bank of China Ltd</option>
                                <option> Cargills Bank Ltd</option>
                                <option> Citibank, N.A.</option>
                                <option> Commercial Bank of Ceylon PLC</option>
                                <option> Deutsche Bank AG</option>
                                <option> DFCC Bank PLC</option>
                                <option> Habib Bank Ltd</option>
                                <option> Hatton National Bank PLC </option>
                                <option> Indian Bank </option>
                                <option> Indian Overseas Bank </option>
                                <option> MCB Bank Ltd </option>
                                <option> National Development Bank PLC </option>
                                <option> Nations Trust Bank PLC </option>
                                <option> Pan Asia Banking Corporation PLC </option>
                                <option> People's Bank </option>
                                <option> Public Bank Berhad </option>
                                <option> Sampath Bank PLC </option>
                                <option> Seylan Bank PLC. </option>
                                <option> Standard Chartered Bank </option>
                                <option> State Bank of India </option>
                                <option> The Hongkong & Shanghai Banking (HSBC) </option>
                                <option> Union Bank of Colombo PLC </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <br>

                            <input  class="form-control input-lg input-forme" type="text" id="ac_number"  placeholder="Accoutnt Number" name ="ac_number">
                            <br>
                        </div>

      

                        <div class="col-md-6">
                             <select class="form-control input-lg input-forme" id="department" name ="department" >
                                <option>Admin</option>
                                <option>Construction</option>
                                <option>HR</option>
                                <option>Planing</option>
                                <option>QAQC</option>
                            </select>    
                        </div>
                        <div class="col-md-6">
                            <input type="date" id="hire" class="form-control input-lg input-forme"   placeholder="Date of Hire" name = "hire">     
                            <br>
                        </div>
<!-- 
                        <div>
                             <input class="form-control input-lg" type="file" name="uploadfile" value="" />
                        </div> <br> -->


                        <input id = "submit" type="submit" class="btn btn-success" value="Submit Button"> 
                        <input id = "back" type="Button" class="btn btn-primary" value="Back to Home" onclick="window.location.href = 'index.php'">
                    
                </div>
                
            </form>

                </div>       
           </div>
           <div class="col-md-3"></div> 

        </div>
        

		<script type="text/javascript">
           
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

	</body>
	</html>
