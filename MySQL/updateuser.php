<?php
$servername = "localhost";
$username = "root";
$password = "test1";
$dbname = "mywebsite";

$fname = val($_POST["fname"]);  
$lname = val($_POST["lname"]);  
$email = val($_POST["email"]);
$id =val($_POST["id"]);  

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
    return $data;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE users SET firstname='$fname', lastname='$lname', email='$email' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location:delete.php?message=success&id=" .$id);
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>