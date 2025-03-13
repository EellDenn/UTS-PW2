<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil daftar kursus
$result = $conn->query("SELECT * FROM courses");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Form Pendaftaran Kursus</h2>

        <form action="" method="post">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">

            <label>Pilih Kursus:</label>
            <select name="course_id" required>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                <?php } ?>
            </select>

            <button type="submit" name="enroll">Daftar</button>
        </form>

        <?php
        if (isset($_POST['enroll'])) {
            $course_id = $_POST['course_id'];

            // Cek apakah user sudah terdaftar di kursus ini
            $check = $conn->prepare("SELECT * FROM enrollments WHERE user_id = ? AND course_id = ?");
            $check->bind_param("ii", $user_id, $course_id);
            $check->execute();
            $check->store_result();

            if ($check->num_rows > 0) {
                echo "<p class='alert alert-warning'>Anda sudah terdaftar di kursus ini!</p>";
            } else {
                // Tambahkan user ke kursus
                $stmt = $conn->prepare("INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)");
                $stmt->bind_param("ii", $user_id, $course_id);
                
                if ($stmt->execute()) {
                    echo "<p class='alert alert-success'>Pendaftaran berhasil!</p>";
                } else {
                    echo "<p class='alert alert-danger'>Terjadi kesalahan, coba lagi.</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
