<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="style.css">
    <style>
    /* Gaya untuk seluruh halaman */
body {
    background: linear-gradient(to right, #eef2f3, #8e9eab); /* Gradient soft */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

/* Container Form */
.container {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    width: 380px;
    text-align: center;
}

/* Judul */
.container h2 {
    margin-bottom: 20px;
    color: #333;
    font-weight: 600;
}

/* Input Form */
.container input {
    width: 100%;
    padding: 12px;
    margin: 8px auto; /* Mengatur margin auto agar rata tengah */
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    display: block; /* Pastikan input menjadi blok agar bisa auto */
    text-align: left; /* Jika ingin teks input rata kiri */
}


/* Efek hover & focus input */
.container input:focus {
    border-color: #28a745;
    outline: none;
    box-shadow: 0px 0px 8px rgba(40, 167, 69, 0.4);
}

/* Tombol */
.container button {
    width: 100%;
    padding: 12px;
    background: #28a745;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

/* Efek hover tombol */
.container button:hover {
    background: #218838;
    transform: translateY(-2px);
    box-shadow: 0px 5px 10px rgba(40, 167, 69, 0.3);
}


    </style>
</head>
<body>
    <div class="container">
        <h2>Form Pendaftaran Pengguna</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Lengkap:</label>
                <input type="text" name="full_name" required class="form-control">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" required class="form-control">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" name="password" required class="form-control">
            </div>

            <button type="submit" class="btn btn-success mt-3">Daftar</button>
        </form>

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $full_name = trim($_POST['full_name']);
        $email = trim($_POST['email']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

        // Cek apakah email sudah ada
        $check_email = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            echo "<div class='alert alert-warning mt-3 text-center'>Email sudah terdaftar! Silakan <a href='login.php'>login di sini</a>.</div>";
            $check_email->close();
            exit(); // Hentikan eksekusi
        }
        $check_email->close();

        // Insert data jika email belum ada
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $full_name, $email, $password);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success mt-3 text-center'>";
            echo "Pendaftaran berhasil!<br>";
            echo "<strong>Nama:</strong> $full_name <br>";
            echo "<strong>Email:</strong> $email <br>";
            echo "<a href='login.php' class='btn btn-primary mt-2'>Login Sekarang</a>";
            echo "</div>";
        } else {
            echo "<p class='alert alert-danger mt-3'>Terjadi kesalahan, coba lagi!</p>";
        }

        $stmt->close();
    } else {
        echo "<p class='alert alert-danger mt-3'>Semua field harus diisi!</p>";
    }
}
?>
    </div>
</body>
</html>
