<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BPSDMP Kominfo Surabaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #0c4b93, #0f93da, #63b6e7);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            animation: slide-in 0.5s ease-out;
        }

        .login-container h2 {
            color: #0c4b93;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container label {
            color: #0c4b93;
        }

        .login-container .form-control {
            border-color: #0c4b93;
        }

        .login-container .btn-primary {
            background-color: #0c4b93;
            border-color: #0c4b93;
        }

        .login-container .btn-primary:hover {
            background-color: #0f93da;
            border-color: #0f93da;
        }

        .login-container p {
            color: #0c4b93;
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
                <div class="mt-5 login-container">
                    <h2>Login Administrator</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                    </form>
                    <p class="mt-3 text-center">Belum punya akun? <a href="register.php">Daftar menjadi admin</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    session_start();
    if (isset($_POST['login'])) {
        require_once('includes/db.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate login credentials using MySQL query
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' AND approved = 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // Set session variables and redirect to admin panel
            $_SESSION['username'] = $username;
            header("Location: admin/index.php");
            exit();
        } else {
            echo '<div class="container mt-3">
                    <div class="alert alert-danger">Invalid username or password.</div>
                  </div>';
        }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>