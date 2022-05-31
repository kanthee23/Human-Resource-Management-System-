<!-- department_update_add.php -->
<?php
// Initialize the session
	include('connection/connection.php');
	include('welcome.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$ddepartment_id = $_POST['dep'];
		$dmanager_id  = $_POST['new_manager'];
		$dupdate = $username;

		$sql = "UPDATE departments SET manager_id ='$dmanager_id' , last_eddit = '$dupdate' WHERE deparment_id = '$ddepartment_id' ";
		
		$tem = $conn->query($sql);
		
		$sql = "UPDATE basic SET manager_id = '1' WHERE username ='$dmanager_id'";
	
		$tem = $conn->query($sql);

		header("location: department.php");
			
	}
	else{
		header("location: department.php");
	}
	
?>
