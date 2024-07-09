<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Maklumat Pekerja Dan Repositori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Sistem Maklumat Pekerja Dan Repositori</h1>
        
        <div class="d-flex justify-content-end mb-3">
            <a href="tambah_pekerja.php" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Pekerja</a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>NAMA PEKERJA</th>
                        <th>NO KP</th>
                        <th>NO HP</th>
                        <th>JANTINA</th>
                        <th>SEMAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id, nama, no_ic, no_hp, jantina FROM pekerja_info";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["no_ic"] . "</td>";
                            echo "<td>" . $row["no_hp"] . "</td>";
                            echo "<td>" . $row["jantina"] . "</td>";
                            echo "<td>
                                    <a href='view.php?id=".$row["id"]."' class='btn btn-info btn-sm'><i class='fas fa-eye'></i></a>
                                    <a href='kemaskini_maklumat_pekerja.php?id=".$row["id"]."' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i></a>
                                    <a href='padam.php?id=".$row["id"]."' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No results found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
