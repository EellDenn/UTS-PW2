<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['kursus']) && is_array($_POST['kursus'])) {
        $user_id = 12; // Contoh user ID, bisa diganti sesuai sesi login
        $kursus_terpilih = $_POST['kursus'];

        // Simpan ke database
        $conn = new mysqli("localhost", "root", "", "database_kursus");

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        foreach ($kursus_terpilih as $kursus_id) {
            $sql = "INSERT INTO pendaftaran (user_id, kursus_id) VALUES ('$user_id', '$kursus_id')";
            $conn->query($sql);
        }

        echo "Pendaftaran berhasil!";
        $conn->close();
    } else {
        echo "Silakan pilih minimal satu kursus.";
    }
}
?>
