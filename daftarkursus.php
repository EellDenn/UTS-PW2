<?php
session_start();
include 'db.php'; 
include 'navbar.php';

// Ambil data kursus dari database
$sql = "SELECT * FROM kursus";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Daftar Kursus</h2>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Kursus</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama_kursus'] . "</td>";
                        echo "<td>" . $row['deskripsi'] . "</td>";
                        echo "<td><a href='detail_kursus.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Detail</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Tidak ada kursus tersedia</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
