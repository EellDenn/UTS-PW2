<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
    <div style="text-align: center; margin-top: 30px;">
    <a href="index.php" class="btn-back">
        ⬅ Kembali ke Halaman Utama
    </a>

<style>
    .btn-back {
        display: inline-block;
        padding: 12px 24px;
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-back:hover {
        background: linear-gradient(135deg, #0056b3, #003d80);
        transform: scale(1.05);
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
    }
</style>

        <h2>Daftar Kursus</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Kursus</th>
                    <th>Instruktur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT courses.course_name, users.full_name AS instructor 
                                        FROM courses 
                                        LEFT JOIN users ON courses.instructor_id = users.id");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['course_name']}</td><td>{$row['instructor']}</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
