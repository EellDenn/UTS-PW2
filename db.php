<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "online_course";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
