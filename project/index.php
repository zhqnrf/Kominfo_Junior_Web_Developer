<!-- index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - BPSDMP Kominfo Surabaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
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

    .home-section {
        background-color: #f8f9fa;
        padding: 30px 0;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }


    .home-title {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        color: #343a40;
        margin-bottom: 0px;
    }

    .container.mt-5.home-section {
        margin-top: 0px;
    }

    .carousel-inner img {
        max-width: 100%;
        max-height: 400px;
        margin: auto;
    }

    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.7);
        padding: 10px;
        bottom: 10px;
        left: 10px;
        right: 10px;
        width: auto;
        transform: none;
    }

    #carouselHome {
        border: 7px solid #cfd6e6;
    }

    .carousel-indicators li {
        background-color: #6c757d;
        /* Gray indicators */
    }

    .carousel-indicators .active {
        background-color: #343a40;
    }

    .card {
        box-sizing: ;
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transform: translateY(-50px);
        opacity: 0;
        transition: transform 0.5s ease, opacity 0.5s ease;
    }

    .card-show {
        transform: translateY(0);
        opacity: 1;
    }

    /* Efek zoom saat kursor di atas kartu */
    .card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }

    .card-title {
        color: #343a40;
        /* Dark gray title */
    }

    .card-text {
        color: #6c757d;
        /* Gray text color */
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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
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
    <!-- End Search -->
    <h1 class="home-title">Home</h1>

    <!-- Home Carousel -->
    <?php
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    if (empty($search)) {
        ?>
        <div class="container mt-2 home-section">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div id="carouselHome" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            require_once('includes/db.php');

                            $carouselQuery = "SELECT * FROM konten ORDER BY tanggal DESC LIMIT 3";
                            $carouselResult = mysqli_query($conn, $carouselQuery);
                            $isActive = true;

                            while ($carouselRow = mysqli_fetch_assoc($carouselResult)) {
                                $carouselTitle = $carouselRow['judul'];
                                $carouselImage = $carouselRow['foto'];
                                $carouselId = $carouselRow['id'];

                                ?>
                                <div class="carousel-item <?php if ($isActive)
                                    echo 'active'; ?>">
                                    <a href="#contentCard<?php echo $carouselId; ?>" data-toggle="collapse">
                                        <img src="img/<?php echo $carouselImage; ?>" class="d-block w-100"
                                            alt="<?php echo $carouselTitle; ?>" style="max-height: 400px;">
                                    </a>
                                    <div class="carousel-caption">
                                        <h3>
                                            <?php echo $carouselTitle; ?>
                                        </h3>
                                    </div>
                                </div>
                                <?php
                                $isActive = false;
                            }


                            ?>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        </div>
    <?php } ?>
    <!-- End Home -->

    <!-- Dynamic Content from Database -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center"><b> Information</b></h1>
                <?php
                require_once('includes/db.php');


                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $query = "SELECT * FROM konten WHERE judul LIKE '%$search%' OR deskripsi LIKE '%$search%' ORDER BY tanggal DESC";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card mb-3">
                            <img src="img/' . $row['foto'] . '" class="card-img-top" alt="Activity Image">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['judul'] . '</h5>
                                <p class="card-text short-text">' . substr($row['deskripsi'], 0, 300) . '...</p>
                                <p class="card-text full-text" style="display: none;">' . $row['deskripsi'] . '</p>
                                <a href="#" class="read-more">Read More</a>
                                <p class="card-text"><small class="text-muted">Date: ' . $row['tanggal'] . '</small></p>
                            </div>
                        </div>';
                }

                mysqli_close($conn);
                ?>
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var cards = document.querySelectorAll(".card");

            setTimeout(function () {
                cards.forEach(function (card) {
                    card.classList.add("card-show");
                });
            }, 300);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var readMoreLinks = document.querySelectorAll(".read-more");

            readMoreLinks.forEach(function (link) {
                link.addEventListener("click", function (event) {
                    event.preventDefault();

                    var cardText = link.parentNode;
                    var fullText = cardText.querySelector(".full-text");
                    var shortText = cardText.querySelector(".short-text");

                    if (fullText.style.display === "none" || fullText.style.display === "") {
                        fullText.style.display = "inline";
                        shortText.style.display = "none";
                        link.textContent = "Read Less";
                    } else {
                        fullText.style.display = "none";
                        shortText.style.display = "inline";
                        link.textContent = "Read More";
                    }
                });
            });
        });
    </script>
</body>

</html>