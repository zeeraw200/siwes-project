<?php
$conn = new mysqli('localhost', 'root', '', 'africa_prudential');

if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}