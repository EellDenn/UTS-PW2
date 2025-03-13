<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #007bff, #6610f2);
            color: white;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            background: white;
            color: black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Pendaftaran Kursus</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form action="proses_pendaftaran.php" method="POST">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID:</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" value="12" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilih Kursus:</label><br>
                            <div class="form-check text-start">
                                <input class="form-check-input" type="checkbox" name="kursus[]" value="Pemrograman Web">
                                <label class="form-check-label">Pemrograman Web</label>
                            </div>
                            <div class="form-check text-start">
                                <input class="form-check-input" type="checkbox" name="kursus[]" value="Data Science">
                                <label class="form-check-label">Data Science</label>
                            </div>
                            <div class="form-check text-start">
                                <input class="form-check-input" type="checkbox" name="kursus[]" value="Basis Data">
                                <label class="form-check-label">Basis Data</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
