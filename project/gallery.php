<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - BPSDMP Kominfo Surabaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
    body {

        background: linear-gradient(to bottom, #63b6e7, #0f93da, #0c4b93);

        font-family: Arial, sans-serif;

    }

    .navbar {
        background-color: #343a40;
        /
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

    }

    .card img {
        transition: transform 0.3s ease;
    }

    .card img:hover {
        transform: scale(1.05);
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

    <!-- Galeri -->
    <div class="container mt-5">
        <div class="row">
            <?php
            require_once('includes/db.php');

            $query = "SELECT * FROM konten ORDER BY tanggal DESC";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="img/' . $row['foto'] . '" class="card-img-top" alt="Activity Image">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['judul'] . '</h5>
                                <p class="card-text">' . $row['tanggal'] . '</p>
                            </div>
                        </div>
                    </div>';
            }

            mysqli_close($conn);
            ?>
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