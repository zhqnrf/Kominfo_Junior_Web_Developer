<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Activity</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
    body {
        background: linear-gradient(to bottom, #0c4b93, #0f93da, #63b6e7);
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .delete-container {
        background-color: white;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 20px;
        animation: slide-in 0.5s ease-out;
    }

    .delete-container h2 {
        color: #0c4b93;
        text-align: center;
        margin-bottom: 20px;
    }

    .delete-container .btn-danger {
        background-color: #d9534f;
        border-color: #d9534f;
    }

    .delete-container .btn-danger:hover {
        background-color: #c9302c;
        border-color: #c9302c;
    }

    .delete-container .btn-secondary {
        background-color: #ccc;
        border-color: #ccc;
    }

    .delete-container .btn-secondary:hover {
        background-color: #bbb;
        border-color: #bbb;
    }

    .delete-container .card {
        border-color: #0c4b93;
    }

    @keyframes slide-in {
        0% {
            opacity: 0;
            transform: translateY(-100%);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="../img/logo.png" alt="Logo" height="30" class="d-inline-block align-text-top">
            BPSDMP Kominfo Surabaya
        </a>
    </nav>

    <?php
    require_once('../includes/db.php');

    if (isset($_GET['id'])) {
        $activity_id = $_GET['id'];

        // Fetch activity details
        $query = "SELECT * FROM konten WHERE id = $activity_id";
        $result = mysqli_query($conn, $query);
        $activity = mysqli_fetch_assoc($result);

        // Delete activity
        if (isset($_POST['delete_activity'])) {
            $foto_path = "../img/" . $activity['foto'];
            if (unlink($foto_path)) {
                $delete_query = "DELETE FROM konten WHERE id = $activity_id";
                $delete_result = mysqli_query($conn, $delete_query);

                if ($delete_result) {
                    echo '<script>alert("Activity deleted successfully."); window.location.href = "index.php";</script>';
                } else {
                    echo '<div class="container mt-3">
                            <div class="alert alert-danger">Failed to delete activity.</div>
                          </div>';
                }
            } else {
                echo '<div class="container mt-3">
                        <div class="alert alert-danger">Failed to delete image.</div>
                      </div>';
            }
        }
    }
    ?>

    <!-- Delete Activity Confirmation -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 delete-container">
                <h2 class="text-center">Delete Activity</h2>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $activity['judul']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $activity['deskripsi']; ?>
                        </p>
                        <form action="" method="post">
                            <button type="submit" class="btn btn-danger btn-block"
                                name="delete_activity">Delete</button>
                            <a href="index.php" class="btn btn-secondary btn-block">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>