<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'] ?? ''; // Pastikan user_id ada
    $kursus = $_POST['kursus'] ?? []; // Ambil kursus yang dipilih (array)

    if (empty($user_id) || empty($kursus)) {
        echo "<script>alert('Semua field harus diisi!'); window.history.back();</script>";
        exit();
    }

    foreach ($kursus as $kursus_terpilih) {
        $stmt = $conn->prepare("INSERT INTO registrations (user_id, course_name) VALUES (?, ?)");
        $stmt->bind_param("ss", $user_id, $kursus_terpilih);
        $stmt->execute();
    }

    echo "<script>alert('Pendaftaran berhasil!'); window.location.href = 'index.php';</script>";
    exit();
}
?>
