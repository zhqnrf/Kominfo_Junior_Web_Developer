<!-- about.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - BPSDMP Kominfo Surabaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<style>
    body {

        background: linear-gradient(to bottom, #63b6e7, #0f93da, #0c4b93);
        /* Light gray background */
        font-family: Arial, sans-serif;
        /* Choose a readable font */
    }

    .navbar {
        background-color: #343a40;
        /* Dark gray navbar */
    }

    .navbar-brand {
        font-weight: bold;
    }

    .site-footer {
        background-color: #333;
        /* Ganti dengan warna latar belakang yang diinginkan */
        padding: 30px 0;
        /* Atur jarak padding atas dan bawah */
        height: 250px;
        /* Atur tinggi sesuai keinginan */
        color: #fff;
        /* Warna teks di dalam footer */
    }

    table.hoverable tr:hover td {
        font-weight: bold;
        color: blue;
    }

    .slide-in {
        animation: slide-in 1s ease-in-out;
    }

    @keyframes slide-in {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(0);
        }
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    .card-title {
        color: #333;
    }

    .card-text {
        color: #777;
    }

    /* Social Icons Styling */
    .social-icons {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .social-icons a {
        display: inline-block;
        margin: 0 10px;
        transition: transform 0.3s ease-in-out;
    }

    .social-icons a img {
        width: 30px;
        height: 30px;
    }

    .social-icons a:hover {
        transform: scale(1.2);
    }

    footer {
        background-color: #343a40;
        /* Dark gray footer */
        color: #ffffff;
        /* White text color */
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="Logo" height="30" class="d-inline-block align-text-top">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- About Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 slide-in">
                <div class="card" style="height: 100%;">
                    <div class="card-body text-center">
                        <img src="img/logo.png" alt="Logo" class="img-fluid">
                        <h5 class="mt-3">Balai Pengembangan SDM dan Penelitian Komunikasi dan Informatika Surabaya</h5>
                        <p>Badan Penelitian dan Pengembangan Sumber Daya Manusia - Kementerian Komunikasi dan
                            Informatika Republik Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Kontak</h5>
                        <table class="table hoverable">
                            <tbody>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>Jl. Raya Ketajen No.36, Ketajen, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur
                                        61254</td>
                                </tr>
                                <tr>
                                    <th scope="row">Telepon</th>
                                    <td>(031) 8011944</td>
                                </tr>
                                <tr>
                                    <th scope="row">Provinsi</th>
                                    <td>Jawa Timur</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="social-icons mt-3">
                            <h5>Follow Us:</h5>
                            <a href="https://instagram.com/bpsdmp.kominfo.sby" target="_blank"><img
                                    src="https://img.icons8.com/ios-glyphs/30/000000/youtube.png" alt="YouTube"></a>
                            <a href="https://youtube.com/@bpsdmpkominfosurabaya5369"" target=" _blank"><img
                                    src="https://img.icons8.com/ios-glyphs/30/000000/instagram-new.png"
                                    alt="Instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <h3 class="mb-4">Tentang Kami</h3>
                        <p>Balai Pengembangan Sumber Daya Manusia dan Penelitian Komunikasi dan Informatika (BPSDMP
                            Kominfo) Surabaya</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Media Sosial</h3>
                        <div class="row">
                            <div class="col-6">
                                <a href="#">
                                    <img src="https://img.icons8.com/ios-glyphs/30/ffffff/instagram-new.png"
                                        alt="Instagram">
                                    <br>
                                    <a href="https://instagram.com/bpsdmp.kominfo.sby" target="_blank">Instagram</a>
                                </a>
                            </div>
                            <div class="col-6 ">
                                <a href="#">
                                    <img src="https://img.icons8.com/ios-glyphs/30/ffffff/youtube.png" alt="YouTube">
                                    <br>
                                    <a href="https://youtube.com/@bpsdmpkominfosurabaya5369" target="_blank">
                                        YouTube</a>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Hubungi Kami</h3>
                        <div class="post-entry-footer">
                            <p><i class="bi-pin-map"></i> Jl. Raya Ketajen No.36 Gedangan, Kabupaten Sidoarjo Jawa Timur
                                61254</p>
                            <p><i class="bi-phone-vibrate"></i> (031) 8011944</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p>©2023 <a href="#">Badan Pengembangan Sumber Daya Manusia Komunikasi dan Informatika</a><br><a
                            href="https://kominfo.go.id/" target="_blank">Kementerian Komunikasi dan Informatika
                            Republik Indonesia</a></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>