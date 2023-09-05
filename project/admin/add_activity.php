<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Activity</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #0c4b93, #0f93da, #63b6e7);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .navbar-dark .navbar-nav .nav-link {
            padding: 20px 15px;
            color: #FFFFFF;
            font-weight: 500;
            text-transform: uppercase;
            outline: none;
        }

        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link.active {
            color: #1E2024;
            background: #FFCC00;
        }

        .container {
            margin-top: 5rem;
        }

        h2 {
            font-weight: 700 !important;
        }

        .add-container {
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            animation: slide-in 0.5s ease-out;
        }

        .add-container h2 {
            color: #0c4b93;
            text-align: center;
            margin-bottom: 20px;
        }

        .add-container .btn-primary {
            background-color: #007BFF;
            border-color: #007BFF;
        }

        .add-container .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .add-container .btn-secondary {
            background-color: #ccc;
            border-color: #ccc;
        }

        .add-container .btn-secondary:hover {
            background-color: #bbb;
            border-color: #bbb;
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

    <!-- Add Activity Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 add-container">
                <h2 class="text-center">Add New Activity</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul">Title</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Description</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hobi">Hobby</label>
                        <textarea class="form-control" id="hobby" name="deskripsi" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Image</label>
                        <input type="file" class="form-control-file" id="foto" name="foto" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Date</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="add_activity">Add Activity</button>
                    <a href="index.php" class="btn btn-secondary btn-block">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <?php
    require_once('../includes/db.php');

    if (isset($_POST['add_activity'])) {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = $_POST['tanggal'];

        // Upload image
        $foto = $_FILES['foto']['name'];
        $target_path = "../img/" . basename($_FILES['foto']['name']);

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
            $query = "INSERT INTO konten (judul, deskripsi,hobby, foto, tanggal) VALUES ('$judul', '$deskripsi','$hobby','$foto', '$tanggal')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '<script>alert("Activity added successfully."); window.location.href = "index.php";</script>';
            } else {
                echo '<div class="container mt-3">
                        <div class="alert alert-danger">Failed to add activity.</div>
                      </div>';
            }
        } else {
            echo '<div class="container mt-3">
                    <div class="alert alert-danger">Image upload failed.</div>
                  </div>';
        }
    }

    mysqli_close($conn);
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>