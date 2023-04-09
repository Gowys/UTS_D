<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="landingpage.css">
    <link rel="stylesheet" href="https://font.googleapis.com/css2?
    family=Roboto:wght@400;700&display=swap">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>
<header>
        <!-- Header -->
        <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="landingpage.php">
                <span class="text-dark h4"><img style="width: 44px;" src="images/kemah.png" alt=""> </span> <span class=" h5">Kemah</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav justify-content-end">
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="landingpage.php">Home</a>
                        </li>
                        <li class="nav-item mx-3">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Dashboard</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php">Mahasiswa</a></li>
                                    <li><a class="dropdown-item" href="prodi.php">Program Studi</a></li>
                                    <li><a class="dropdown-item" href="ukm.php">UKM</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <button><a href="login.php?logout=1">Log out</a></button>
                </div>
            </div>
        </div>
    </nav>
</header>
    <!-- Close Header -->

    <section>
        <div class="circle"></div>

        <div class="content">
            <div class="textBox">
                <h2>Diversity in action,<br>unity in <span>Purpose</span></h2>
                <p> Selamat datang di halaman utama Unit Kegiatan Mahasiswa (UKM) kami!
                    <br>Jelajahi aktivitas dan program UKM kami yang penuh dengan keberagaman dan keunikan.
                    <br>Bergabunglah dengan kami dan menjadi bagian dari komunitas UKM yang bersemangat.
                </p>
                <a href="#">Learn More</a>
            </div>
            <div class="imgBox">
                <img src="images/img1.png" class="starbucks">
            </div>
        </div>
        <ul class="thumb">
            <li><img src="images/img1.png" onclick="imgSlider('images/img1.png')" ;changeCircleColor('#017143')></li>
            <li><img src="images/img2.png" onclick="imgSlider('images/img2.png')" ;changeCircleColor('#eb7495')></li>
            <li><img src="images/img3.png" onclick="imgSlider('images/img3.png')" ;changeCircleColor('#d752b1')></li>
        </ul>
        <ul class="sci">
            <li><a href="#"><img src="images/facebook.png"></a></li>
            <li><a href="#"><img src="images/twitter.png"></a></li>
            <li><a href="#"><img src="images/instagram.png"></a></li>
        </ul>
        </div>
    </section>

    <script type="text/javascript">
        function imgSlider(anything) {
            document.querySelector('.starbucks').src = anything;
        }

        function changeCircleColor(color) {
            const circle = document.querySelector('.circle');
            circle.style.background = color;
        }
    </script>

    <?php
    include('layout/footer.php');
    ?>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="css/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fontawesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>