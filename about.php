<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="navbar.css">

</head>
<body>

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
    <!-- Close Header -->

    <!-- Start Banner Hero -->
    <section class="bg-light w-100">
        <div class="container">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-lg-6 text-start my-auto">
                    <h1 class="h2 py-2  typo-space-line">About Us</h1>
                    <p>
                    Selamat datang di situs pendaftaran UKM Mahasiswa, kami adalah platform online yang memudahkan mahasiswa untuk mendaftar ke berbagai UKM yang tersedia di kampus .. . Kami menyediakan layanan pendaftaran UKM yang cepat, mudah, dan terintegrasi dengan sistem kampus ... 
                    </p>
                </div>
                <div class="col-lg-6 my-auto d-flex justify-content-end">
                    <img class="" src="images/About/About.svg">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->


    <!-- Start Team Member -->
    <section class="container py-5">
        <div class="row pt-5 pb-3 d-lg-flex">

            <div class=" col-lg-4">
                <h2 class="h2 py-2 typo-space-line">Our Team</h2>
                <p style="text-align: justify;">
                Tim kami terdiri dari mahasiswa yang aktif di UKM dan memiliki pengalaman dalam pengelolaan kegiatan organisasi. Kami berdedikasi untuk membantu mahasiswa untuk menemukan UKM yang sesuai dengan minat dan bakat mereka serta meningkatkan kemampuan dan pengalaman selama kuliah. Jangan ragu untuk menghubungi kami jika Anda membutuhkan bantuan dalam proses pendaftaran UKM. Selamat bergabung dengan komunitas UKM kampus!
                </p>
            </div>

            <div class=" col-lg-8 row justify-content-around">
                <div class="col-md-4  text-center">
                    <img class="rounded-circle p-4" src="images/berka.jpg" alt="Card image" style="width: 100%; height: auto; background-size:cover ;">
                    <div class="text-center pt-4 text-muted light-300">
                        <span class="fw-bold">Berka Ridha Rahmainingtias</span>
                        <p>Developer</p>
                    </div>
                </div>
                <div class="col-md-4  text-center">
                    <img class="rounded-circle p-4" src="images/About/gerly.jpeg" alt="Card image" style="width: 100%; height: auto; background-size:cover ;">
                    <div class="text-center pt-4 text-muted light-300">
                        <span class="fw-bold">M. Geryl Faturrohman</span>
                        <p>Developer</p>
                    </div>
                </div><div class="col-md-4  text-center">
                    <img class="rounded-circle p-4" src="images/About/Hugo.jpg" alt="Card image" style="width: 100%; height: auto; background-size:cover ;">
                    <div class="text-center pt-4 text-muted light-300">
                        <span class="fw-bold">Hugo Abigael Bayu Randityo</span>
                        <p>Developer</p>
                    </div>
                </div><div class="col-md-4  text-center">
                    <img class="rounded-circle p-4" src="images/About/raihan1.jpg" alt="Card image" style="width: 100%; height: auto; background-size:cover ;">
                    <div class="text-center pt-4 text-muted light-300">
                        <span class="fw-bold">Raihan Qatrunada</span>
                        <p>Developer</p>
                    </div>
                </div><div class="col-md-4  text-center">
                    <img class="rounded-circle p-4" src="images/About/Rifa.jpg" alt="Card image" style="width: 100%; height: auto; background-size:cover ;">
                    <div class="text-center pt-4 text-muted light-300">
                        <span class="fw-bold">Rifa Aulia Risyanti</span>
                        <p>Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Team Member -->

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
    <script src="https://kit.fontawesome.com/ee460a84af.js" crossorigin="anonymous"></script>
</body>

</html>