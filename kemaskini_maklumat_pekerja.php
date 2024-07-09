<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM pekerja_info WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>kemaskini maklumat pekerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">UPDATE MAKLUMAT</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="updateForm" action="proses_kemaskini.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="no_ic" class="form-label">NO IC</label>
                        <input type="text" class="form-control" id="no_ic" name="no_ic" value="<?php echo $row['no_ic']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">NAMA</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">NO HP</label>
                        <textarea class="form-control" id="no_hp" name="no_hp" rows="3" required><?php echo $row['no_hp']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jantina" class="form-label">JANTINA</label>
                        <select class="form-select" id="jantina" name="jantina" required>
                            <option value="Lelaki" <?php if ($row['jantina'] == 'Lelaki') echo 'selected'; ?>>Lelaki</option>
                            <option value="Perempuan" <?php if ($row['jantina'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Update</button>
                        <div style="display: flex; justify-content: flex-end; flex-grow: 1;">
                        <button type="reset" class="btn btn-warning">Clear</button>
                            <a href="index.php" class="btn btn-secondary" style="margin-left: 10px;">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal for Confirmation -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Adakah anda pasti mahu mengemas kini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function submitForm() {
            document.getElementById("updateForm").submit();
        }
    </script>
</body>
</html>

<?php
    } else {
        echo "<p>Data tidak ditemukan.</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p>ID pekerja tidak diberikan.</p>";
}
?>
