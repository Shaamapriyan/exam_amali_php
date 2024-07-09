<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADD MAKLUMAT PEKERJA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .form-container {
            width: 300px;
            padding: 20px;
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .form-container h1 {
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container .form-label {
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }
        .form-container .form-control,
        .form-container .form-select {
            font-size: 0.875rem;
            padding: 0.5rem;
            height: auto;
            margin-bottom: 1rem;
        }
        .form-container .btn {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            width: 100px;
        }
        .form-container .btn-group {
            display: flex;
            justify-content: space-between;
        }
        .form-container .btn-group .btn + .btn {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>ADD MAKLUMAT</h1>
        <form action="proses_tambah.php" method="POST">
            <div class="mb-3">
                <label for="no_ic" class="form-label">IC</label>
                <input type="text" class="form-control" id="no_ic" name="no_ic" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">NAMA</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <div class="mb-3">
                <label for="jantina" class="form-label">JANTINA</label>
                <select class="form-select" id="jantina" name="jantina" required>
                    <option value="" disabled selected>-- Sila Pilih --</option>
                    <option value="Lelaki">Lelaki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">ADD</button>
                <a href="index.php" class="btn btn-secondary">BACK</a>
                <button type="reset" class="btn btn-warning">Clear</button>
            </div>
        </form>
    </div>
</body>
</html>
