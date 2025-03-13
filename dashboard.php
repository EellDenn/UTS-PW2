<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


$query = "SELECT courses.name, users.full_name AS instructor 
          FROM enrollments 
          JOIN courses ON enrollments.course_id = courses.id 
          JOIN users ON courses.instructor_id = users.id 
          WHERE enrollments.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Dashboard Anda</h2>
        
        <h3>Kursus yang Anda Ikuti:</h3>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>{$row['name']} - Instruktur: {$row['instructor']}</p>";
            }
        } else {
            echo "<p>Anda belum mendaftar di kursus manapun.</p>";
        }
        ?>

        <a href="enroll.php">Daftar Kursus Baru</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
