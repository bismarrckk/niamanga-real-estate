<?php
$DBhost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "appartments";

$conn = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);

if ($conn->connect_errno) {
echo "Database connection failed";
}

?>