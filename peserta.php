<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT full_name FROM users WHERE id = '$user_id'");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peserta Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Daftar Peserta Kursus</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kursus</th>
                <th>Instruktur</th>
                <th>Tanggal Pendaftaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT users.full_name, registrations.course_name, 
                                    COALESCE(instructors.name, 'Instruktur Belum Ditentukan') AS instructor_name, 
                                    registrations.registration_date 
                                    FROM registrations 
                                    JOIN users ON registrations.user_id = users.id 
                                    JOIN courses ON registrations.course_name = courses.course_name 
                                    LEFT JOIN instructors ON courses.instructor_id = instructors.id 
                                    ORDER BY registrations.registration_date DESC"); // Menampilkan data dari terbaru
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['full_name']}</td>
                        <td>{$row['course_name']}</td>
                        <td>{$row['instructor_name']}</td>
                        <td>{$row['registration_date']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
