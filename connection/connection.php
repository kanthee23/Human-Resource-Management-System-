<!-- connection.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "largo";


$conn = new mysqli($servername, $username, $password, $dbname)
        or die("Could not connect to server\n");

		
?>

