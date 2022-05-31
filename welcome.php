<!-- welcome.php -->
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;


}else{
	// session_start();
					                      			
$username     	= 	$_SESSION["username"] 	;	                    	
$firstname    	=	$_SESSION["firstname"] 	;	            	
$lastname	    =	$_SESSION["lastname"] 	;		                    
$pass  			=   $_SESSION["pass"]		;	  			                    
$department_id 	=	$_SESSION["department_id"];		                    
$manager_id		=  	$_SESSION["manager_id"]	;		                    
$a_level		=	$_SESSION["a_level"];				                    
$approved		=	$_SESSION["approved"];				                    

}
?>

