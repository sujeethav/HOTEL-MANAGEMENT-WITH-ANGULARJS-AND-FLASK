<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE housekeeps SET EMP_NUMBER=$_POST[EMP_NUMBER] WHERE ROOM_NUM=$_POST[ROOM_NUM]";

if (mysqli_query($conn, $sql)) {
    echo ("Record updated successfully");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>