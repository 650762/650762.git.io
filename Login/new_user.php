<html>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

    $fname = $_POST["fname"];
	echo "Hello: ".$fname;
	
	$lname = $_POST["lname"];

    $address = $_POST["address"];
	
	$postcode = $_POST["postcode"];

	$gender = $_POST['gender'];
	
	$uname = $_POST["uname"];
	
	$pword = $_POST["pword"];
	
	
	
	
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO new_user(fname, lname, address, postcode, gender, uname, pword) 
VALUES ('$fname', '$lname', '$address', '$postcode', '$gender', '$uname', '$pword')";

if ($conn->query($sql) === TRUE) {
    echo "\n New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
?>
</body>
</html>