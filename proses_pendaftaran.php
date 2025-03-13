<?php
session_start();
include 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; 
    $courses = $_POST['courses'];

    foreach ($courses as $course) {
        $query = "INSERT INTO pendaftaran_kursus (user_id, course_name) VALUES ('$user_id', '$course')";
        mysqli_query($conn, $query);
    }

    echo "Pendaftaran Berhasil!";
}
?>
