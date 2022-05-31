<!-- Login.php -->
<?php
include('connection/connection.php');
$sql = "SELECT username, password, approved FROM basic WHERE username='admin' " ;

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["username"]. " password: " . $row["password"].  "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();

?>
