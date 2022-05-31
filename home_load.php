<!-- home_load.php -->
<?php

	include('connection/connection.php');	
	include("location: welcome.php");

	$department_id 			= $_SESSION["department_id"];	 
	$manager_id				= $_SESSION["manager_id"];
  	
  	echo $department_id;
  		

		if ($department_id == "2" and $manager_id	=="1"){
			header("location: home_hr_m.php");
		}elseif ($department_id == "2" ){
			header("location: home_hr.php");
		}elseif($manager_id	=="1"){
			header("location: home_m.php");
		}
		else{
			header("location: home_u.php");	
		}

?>