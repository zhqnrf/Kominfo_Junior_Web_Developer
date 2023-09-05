<?php
require_once('../includes/db.php'); // Pastikan path menuju file db.php sesuai dengan struktur proyek Anda

if (isset($_GET['id'])) {
    $adminId = $_GET['id'];

    // Update status admin menjadi "Approved" (misalnya dengan mengubah nilai approved menjadi 1)
    $updateQuery = "UPDATE admin SET approved = 1 WHERE id = $adminId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if (!$updateResult) {
        echo "Error: " . mysqli_error($conn);
    }
}

// Redirect kembali ke halaman daftar admin yang belum disetujui
header("Location:reject_admin.php");
exit();
?>