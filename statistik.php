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
    <title>Statistik Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Statistik Pendaftaran Kursus</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kursus</th>
                <th>Jumlah Pendaftar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT course_name, COUNT(*) as total_pendaftar 
                                    FROM registrations GROUP BY course_name");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['course_name']}</td>
                        <td>{$row['total_pendaftar']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
