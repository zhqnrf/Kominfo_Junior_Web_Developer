<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BPSDMP Kominfo Surabaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="img/logo.png" type="image/png">
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

        .register-container {
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            animation: slide-in 1s ease-out;
        }

        .register-container h2 {
            color: #0c4b93;
            text-align: center;
            margin-bottom: 20px;
        }

        .register-container label {
            color: #0c4b93;
        }

        .register-container .form-control {
            border-color: #0c4b93;
        }

        .register-container .btn-primary {
            background-color: #0c4b93;
            border-color: #0c4b93;
        }

        .register-container .btn-primary:hover {
            background-color: #0f93da;
            border-color: #0f93da;
        }

        .register-container .btn-secondary {
            background-color: #ccc;
            border-color: #ccc;
        }

        .register-container .btn-secondary:hover {
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mt-5 register-container">
                    <h2>Register as Admin</h2>
                    <form action="" method="post">
                        <!-- Form fields for registration -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                        <div class="mt-3">
                            <a href="index.php" class="btn btn-secondary">Back to Homepage</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    session_start();
    if (isset($_POST['register'])) {
        require_once('includes/db.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if the username already exists
        $checkQuery = "SELECT * FROM admin WHERE username = '$username'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo '<div class="container mt-3">
                    <div class="alert alert-danger">Username is already taken. Please choose a different username.</div>
                  </div>';
        } else {
            // Insert registration data into the database
            $query = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '<div class="container mt-3">
                        <div class="alert alert-success">Registration successful. Please wait for approval from existing admin.</div>
                      </div>';
            } else {
                echo '<div class="container mt-3">
                        <div class="alert alert-danger">Registration failed. Please try again later.</div>
                      </div>';
            }
        }

        mysqli_close($conn);
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>