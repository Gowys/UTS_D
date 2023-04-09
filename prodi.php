<?php
$server = "localhost";
$user = "root";
$pass = "";
$database   = "akademik";

$koneksi = mysqli_connect($server, $user, $pass, $database);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
//Jika tombol simpan diklik
if (isset($_POST['csimpan'])) {

    //Pengujian data diedit atau disimpan baru
    if ($_GET['hal'] == "edit") {

        //Data akan diedit
        $edit = mysqli_query($koneksi, "UPDATE program_studi set
                                        namaprodi = '$_POST[tnamaprodi]',
                                        notelp = '$_POST[tnotelp]'
                                        WHERE id_prodi = '$_GET[id]'");
        if ($edit) { //Jika edit Sukses
            echo "<script>
                    alert('Edit data suksess!');
                    document.location='prodi.php';
                 </script>";
        } else { //Jika edit gagal
            echo "<script>
                    alert('Edit data gagal!');
                    document.location='prodi.php';
                 </script>";
        }
    } else {

        //Data akan disimpan baru
        $simpan = mysqli_query($koneksi, "INSERT INTO program_studi (namaprodi, notelp)
                                          VALUES ('$_POST[tnamaprodi]',
                                                 '$_POST[tnotelp]')");
        if ($simpan) { //Jika simpan Sukses
            echo "<script>
                    alert('Simpan data suksess!');
                    document.location='prodi.php';
                 </script>";
        } else { //Jika simpan gagal
            echo "<script>
                    alert('Simpan data gagal!');
                    document.location='prodi.php';
                 </script>";
        }
    }
}

//Pengujian Jika tombol Edit/Hapus diklik
if (isset($_GET['hal'])) {

    //Pengujian Edit Data
    if ($_GET['hal'] == "edit") {

        //Tampilkan Data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM program_studi WHERE id_prodi = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if ($data) {

            //Jika data ditemukan, maka data ditampung  ke dalam variabel
            $vnamaprodi = $data['namaprodi'];
            $vnotelp = $data['notelp'];
        }
    } else if ($_GET['hal'] == "hapus") {

        //Persiapan Hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM program_studi where id_prodi = '$_GET[id]'");
        if ($hapus) {
            echo "<script>
                    alert('Hapus data Success!');
                    document.location='prodi.php';
                 </script>";
        }
    }
}

// Pencarian data
if (isset($_POST['bcari'])) {
    $keyword = $_POST['tcari'];
    $q = "SELECT * FROM program_studi WHERE namaprodi like '%$keyword%'
                or notelp like'%$keyword%' order by id_prodi desc ";
} else {
    $q = "SELECT * from program_studi order by id_prodi desc";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard prodi</title>
    <link rel="stylesheet" href="https://font.googleapis.com/css2?
    family=Roboto:wght@400;700&display=swap">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="css/boxicon.min.css">


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

    <div class="container">


        <!-- Memasukkan Data -->
        <!-- <div class="col-10"> -->
        <div class="card mt-5">
            <div class="card-header bg-secondary text-white">
                <form action="" method="POST">
                    <div class="d-flex justify-content-between">
                        <div class="my-auto">
                            Data Prodi
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="my-auto">
                        <!-- Button trigger modal -->
                        <button name="Tambahdata" type="button" class="btn- mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Tambah Data
                        </button>
                    </div>
                    <div class="my-auto">
                        <form action="#" method="POST">
                            <div class="input-group py-1 mb-3">
                                <input name="tcari" type="text" class="form-control form-control rounded-pill rounded-end" id="email" placeholder="Input keyword">
                                <button name="bcari" class="btn btn-dark text-white btn-sm   px-3" type="submit">Cari</button>
                                <button name="breset" class="btn btn-warning text-dark btn-sm rounded-pill rounded-start px-3" type="submit">Reset</button>

                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form input Program Studi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>Nama Prodi</label>
                                        <input type="text" name="tnamaprodi" value="<?= @$vnamaprodi ?>" class="form-control" placeholder="Input nama prodi anda disini!" required>
                                    </div>
                                    <div class="form-group">
                                        <label>nomor telphone</label>
                                        <input type="text" name="tnotelp" value="<?= @$vnotelp ?>" class="form-control" placeholder="Input nomor anda disini!" required>
                                    </div>
                                    <!-- <div style="padding-top: 8px;">
                                        <button type="submit" class="btn btn-dark" name="csimpan"><ion-icon name="save-outline"></ion-icon></ion-icon></i></i></button>
                                        <button type="submit" class="btn btn-dark" name="creset"><ion-icon name="close-circle-outline"></ion-icon></ion-icon></button>
                                    </div> -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="csimpan" class="btn btn-primary">Simpan</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Program Studi</th>
                        <th>No telphone</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, $q);
                    while ($data = mysqli_fetch_array($tampil)) :

                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['namaprodi'] ?></td>
                            <td><?= $data['notelp'] ?></td>
                            <td>
                                <a href="prodi.php?hal=edit&id=<?= $data['id_prodi'] ?>" data-bs-toggle="modal" data-bs-target="#ubahData<?= $no ?>"><img class="me-1" style="width: 28px;" src="images/edit (1).png" alt=""></a>
                                <a href="prodi.php?hal=hapus&id=<?= $data['id_prodi'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')"><img style="width: 28px;" src="images/delete.png" alt=""></a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="ubahData<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form input Program Studi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="prodi.php?hal=edit&id=<?= $data['id_prodi'] ?>" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Prodi</label>
                                                <input type="text" name="tnamaprodi" value="<?= $data['namaprodi'] ?>" class="form-control" placeholder="Input nama prodi anda disini!" required>
                                            </div>
                                            <div class="form-group">
                                                <label>nomor telphone</label>
                                                <input type="text" name="tnotelp" value="<?= $data['notelp'] ?>" class="form-control" placeholder="Input nomor anda disini!" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="csimpan" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    <?php endwhile; //penutup perulangan while 
                    ?>
                </table>

            </div>
        </div>
    </div>
    <!-- Akhir Card Table-->
    </div>





    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="css/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fontawesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>