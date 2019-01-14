<!-- this works if you have a database called login -->
<!-- a table called login, and column headers uname and pword -->
<!-- make sure your headers are of type VRCHAR when you set them up -->

<html>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
	
	$uname = $_POST["uname"];
	echo "Hello: ".$uname;

	$pword = $_POST["pword"];
	echo " your password is: ".$pword;
	
	$gender = $_POST['gender'];
	
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO login_2(uname, pword, gender) 
VALUES ('$uname', '$pword','$gender')";

if ($conn->query($sql) === TRUE) {
    echo "\n New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
?>
</body>
</html>