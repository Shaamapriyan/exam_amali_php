<?php

include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        
        $sql = "DELETE FROM pekerja_info WHERE id = ?";
        $stmt = $conn->prepare($sql);

        
        $stmt->bind_param("i", $id);

        
        $stmt->execute();

        
        $stmt->close();

        
        header("Location: index.php");
        exit();
    } else {
        // Display Bootstrap confirmation modal
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Delete Record Confirmation</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>
        <body>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Delete Record Confirmation
                            </div>
                            <div class="card-body">
                                <p>Are you sure you want to delete this record?</p>
                                <a href="padam.php?id=<?php echo $id; ?>&confirm=yes" class="btn btn-danger mr-2">Yes, Delete</a>
                                <a href="index.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
} else {
    // If no ID parameter is provided, redirect to index.php
    header("Location: index.php");
    exit();
}



?>