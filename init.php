<?php
$servername = getenv('MYSQLSERVER');
$username = getenv('MYSQLUSERNAME');
$password = getenv('MYSQLPASSWORD');

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE sales";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
$conn = new mysqli($servername, $username, $password, "sales");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "DROP TABLE clients";
  if ($conn->query($sql) === TRUE) {
    echo "Table dropped successfully";
  } else {
    echo "Error dropping table: " . $conn->error;
  }
$sql = "CREATE TABLE clients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
$conn->close();
?> 