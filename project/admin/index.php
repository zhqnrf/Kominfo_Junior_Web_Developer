<?php
require_once('../includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home Admin - BPSDMP Kominfo Surabaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
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
                        <a class="nav-link" href="reject_admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <!-- Search -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="index.php" method="get" class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search activities..." name="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Admin Panel Menu -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center" style="color: #ffff;"><b>Admin</b></h2>
                <div class="d-flex justify-content-end mb-3">
                    <a href="add_activity.php" class="btn btn-primary">Add Activity</a>
                </div>
                <?php
                $query = "SELECT * FROM konten ORDER BY tanggal DESC";
                $result = mysqli_query($conn, $query);
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $query = "SELECT * FROM konten WHERE judul LIKE '%$search%' OR deskripsi LIKE '%$search%' ORDER BY tanggal DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card mb-3">
                            <img src="../img/' . $row['foto'] . '" class="card-img-top" alt="Activity Image">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['judul'] . '</h5>
                                <p class="card-text">' . $row['deskripsi'] . '</p>
                                <p class="card-text">' . $row['hobby'] . '</p>
                                <p class="card-text"><small class="text-muted">Date: ' . $row['tanggal'] . '</small></p>
                                <a href="edit_activity.php?id=' . $row['id'] . '" class="btn btn-info">Edit</a>
                                <a href="delete_activity.php?id=' . $row['id'] . '" class="btn btn-secondary">Delete</a>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>