<?php
session_start();
include 'db.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil nama pengguna yang sedang login
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT full_name FROM users WHERE id = '$user_id'");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kursus Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Kursus Online Operation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="daftar-kursus.php">Pendaftaran Kursus</a></li>
                <li class="nav-item"><a class="nav-link" href="peserta.php">Peserta Kursus</a></li>
                <li class="nav-item"><a class="nav-link" href="statistik.php">Statistik Pendaftaran</a></li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="#">👤 <?php echo $user['full_name']; ?></a>
                </li>
                <li class="nav-item"><a class="nav-link btn btn-danger text-white ms-2" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="hero text-center text-white">
    <div class="container">
        <h1>Selamat Datang, <?php echo $user['full_name']; ?>!</h1>
        <p>Temukan kursus terbaik dan tingkatkan keterampilan Anda!</p>
    </div>
</header>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <h3 class="text-center">Form Pendaftaran Kursus</h3>
                <form action="registrations.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    
                    <label>Pilih Kursus:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kursus[]" value="Pemrograman Web" id="kursus1">
                        <label class="form-check-label" for="kursus1">Pemrograman Web</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kursus[]" value="Data Science" id="kursus2">
                        <label class="form-check-label" for="kursus2">Data Science</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kursus[]" value="Basis Data" id="kursus3">
                        <label class="form-check-label" for="kursus3">Basis Data</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kursus[]" value="Cloud Computing" id="kursus4">
                        <label class="form-check-label" for="kursus4">Cloud Computing</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kursus[]" value="UI/UX Design" id="kursus5">
                        <label class="form-check-label" for="kursus5">UI/UX Design</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kursus[]" value="Mobile App Development" id="kursus6">
                        <label class="form-check-label" for="kursus6">Mobile App Development</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kursus[]" value="Cyber Security" id="kursus7">
                        <label class="form-check-label" for="kursus7">Cyber Security</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kursus[]" value="Artificial Intelligence" id="kursus8">
                        <label class="form-check-label" for="kursus8">Artificial Intelligence</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="text-center text-white mt-5 p-3">
    <p>&copy; 2025 Kursus Online Operation. Semua Hak Dilindungi.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
