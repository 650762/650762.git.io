<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' name='form_filter' >

    <select name="surname">
        <option value="all">All</option>
        <option value="Doe">Doe</option>
        <option value="Parker">Parker</option>
    </select>
	
    <br />
	
    <input type='submit' value = 'Filter'>
	
<br/>

</form>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myguests";
$surname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT firstname, lastname, email FROM guests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border = 5px bordercolor = black><tr><th>Name</th><th>Email</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["firstname"]." ".$row["lastname"]."</td> <td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $surname = $_POST["surname"];
}
echo "<h2>Your Selection:</h2>";

$sql = "SELECT firstname, lastname, email FROM guests WHERE lastname='$surname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Name</th><th>Email</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["firstname"]." ".$row["lastname"]."</td> <td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>