<?php

$servername = "localhost";
$username = "del";
$password = "bbbbbb1";

// Creating connection
$conn = mysqli_connect($servername, $username, $password);

// Checking connection
if (!$conn) {

      // If connecting fails
    die("Connection failed: " . mysqli_connect_error());
}
else{
  echo "Connection established successfully";
}

// Close the connection
mysqli_close($conn);

?>
