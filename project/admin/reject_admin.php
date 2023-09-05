<?php
require_once('../includes/db.php');

if (isset($_GET['id'])) {
    $adminId = $_GET['id'];

    $deleteQuery = "DELETE FROM admin WHERE id = $adminId";
    $updateResult = mysqli_query($conn, $deleteQuery);

    if (!$updateResult) {
        echo "Error: " . mysqli_error($conn);
    }
}


$query = "SELECT * FROM admin WHERE approved = 0";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - BPSDMP Kominfo Surabaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
<style>
    body {
        background: linear-gradient(to bottom, #0c4b93, #0f93da, #63b6e7);
        margin: 0;
        font-family: Arial, sans-serif;
        min-height: 100vh;
    }


    .navbar {
        background-color: #343a40;
        /* Dark gray navbar */
    }

    .navbar-brand {
        font-weight: bold;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" alt="Logo" height="30" class="d-inline-block align-text-top">
                BPSDMP Kominfo Surabaya
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#admin">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center" style="color: #ffff;"><b>Unapproved Admins</b></h2>
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <ul class="list-group">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                  ' . $row['username'] . '
                                  <div>
                                      <a href="approve_admin.php?id=' . $row['id'] . '" class="btn btn-success btn-sm mr-2">Approve</a>
                                      <a href="reject_admin.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Reject</a>
                                  </div>
                              </li>';
                        }
                        ?>
                    </ul>
                <?php } else {
                    echo '<div class="text-center"><p>Tidak ada admin yang mendaftar.</p></div>';
                } ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>