<html>
<body>
<form action="process.php" method="post">
Enter name: <input type="text" name="name">
<input type="submit">
</form>
</body>
</html> 

<?php
$servername = getenv('MYSQLSERVER');
$username = getenv('MYSQLUSERNAME');
$password = getenv('MYSQLPASSWORD');

// Create connection
$conn = new mysqli($servername, $username, $password, "sales");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, fullname FROM clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border=1>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fullname"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();




?> 