<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL query
    $sql = "SELECT * FROM pekerja_info WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if data exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>View Maklumat Pekerja</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container mt-5">
                <h1 class="text-center mb-4">Maklumat Pekerja</h1>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form>
                            <div class="mb-3">
                                <label for="no_ic" class="form-label">NO IC</label>
                                <input type="text" class="form-control" id="no_ic" value="<?php echo $row['no_ic']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">NAMA</label>
                                <input type="text" class="form-control" id="nama" value="<?php echo $row['nama']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">NO HP</label>
                                <textarea class="form-control" id="no_hp" rows="3" readonly><?php echo $row['no_hp']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jantina" class="form-label">JANTINA</label>
                                <input type="text" class="form-control" id="jantina" value="<?php echo $row['jantina']; ?>" readonly>
                            </div>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>

<?php
    } else {
        // No data found
        echo "<p>Data tidak ditemukan.</p>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // No ID provided
    echo "<p>ID pelajar tidak diberikan.</p>";
}
?>
