<?php
$host = "localhost";
$dbname = "mydb";
$username = "root";
$password = "Donsanteria906!"
$conn =  mysqli($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>