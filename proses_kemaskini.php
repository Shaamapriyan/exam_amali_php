<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $no_ic = $_POST['no_ic'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $jantina = $_POST['jantina'];

    $sql = "UPDATE pekerja_info SET no_ic=?, nama=?, no_hp=?, jantina=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $no_ic, $nama, $no_hp, $jantina, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>
