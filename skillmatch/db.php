<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "skillmatch_db";
$port = 3306; // default MySQL port in XAMPP

$conn = mysqli_connect("localhost", "root", "", "skillmatch", 3306);


if (!$conn) {
    die("❌ Database connection failed: " . mysqli_connect_error());
}
?>
