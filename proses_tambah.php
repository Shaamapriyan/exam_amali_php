<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_ic = $_POST['no_ic'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $jantina = $_POST['jantina'];

    // Prepare SQL statement
    $sql = "INSERT INTO pekerja_info (no_ic, nama, no_hp, jantina) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Gagal menyediakan pernyataan SQL: " . $conn->error);
    }

    // Bind parameters and execute
    $stmt->bind_param("ssss", $no_ic, $nama, $no_hp, $jantina);

    if ($stmt->execute()) {
        // Redirect to index.php upon successful insertion
        header("Location: index.php");
        exit();
    } else {
        // Redirect to tambah_pekerja.php with error message upon failure
        header("Location: tambah_pekerja.php?error=failed");
        exit();
    }

    
   
} else {
    // Redirect to tambah_pekerja.php if accessed directly without POST request
    header("Location: tambah_pekerja.php");
    exit();
}
?>
