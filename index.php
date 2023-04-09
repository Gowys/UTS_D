<?php

include('function/functionRead.php');

$mahasiswa = readQuery("mahasiswa");
$prodi = readQuery("program_studi");
$ukm = readQuery("ukm");
$allTable = readSpecificQuery();

//Jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {
    //Pengujian data diedit atau disimpan baru
    if ($_GET['hal'] == "edit") {

        //Data akan diedit
        $edit = mysqli_query($conn, "UPDATE mahasiswa set
                                        nim = '$_POST[tnim]',
                                        nama = '$_POST[tnama]',
                                        gender = '$_POST[tgender]',
                                        alamat = '$_POST[talamat]',
                                        id_prodi = '$_POST[tprodi]',
                                        id_ukm = '$_POST[tukm]'
                                        WHERE id_mhs = '$_GET[id]'");

        if ($edit) { //Jika edit Sukses
            echo "<script>
                    alert('Edit data suksess!');
                    document.location='index.php';
                 </script>";
        } else { //Jika edit gagal
            echo "<script>
                    alert('Edit data gagal!');
                    document.location='index.php';
                 </script>";
        }
    } else {
        //Data akan disimpan baru
        $simpan = mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, gender, alamat, id_prodi, id_ukm)
                                          VALUES ('$_POST[tnim]',
                                                 '$_POST[tnama]',
                                                 '$_POST[tgender]',
                                                 '$_POST[talamat]',
                                                 '$_POST[tprodi]',
                                                 '$_POST[tukm]')");

        if ($simpan) { //Jika simpan Sukses
            echo "<script>
                    alert('Simpan data suksess!');
                    document.location='index.php';
                 </script>";
        } else { //Jika simpan gagal
            echo "<script>
                    alert('Simpan data gagal!');
                    document.location='index.php';
                 </script>";
        }
    }
}

//Pengujian Jika tombol Edit/Hapus diklik
if (isset($_GET['hal'])) {

    //Pengujian Edit Data
    if ($_GET['hal'] == "edit") {

        //Tampilkan Data yang akan diedit
        $tampil = mysqli_query($conn, "SELECT mahasiswa.nim, mahasiswa.nama, mahasiswa.gender, mahasiswa.alamat, program_studi.namaprodi, ukm.namaukm, program_studi.id_prodi, ukm.id_ukm FROM mahasiswa inner join program_studi on mahasiswa.id_prodi =    program_studi.id_prodi inner join ukm on mahasiswa.id_ukm = ukm.id_ukm where mahasiswa.id_mhs = '$_GET[id]'");
        $data1 = mysqli_fetch_array($tampil);
        if ($data1) {

            //Jika data1 ditemukan, maka data1 ditampung  ke dalam variabel
            $vnim = $data1['nim'];
            $vnama = $data1['nama'];
            $vgender = $data1['gender'];
            $valamat = $data1['alamat'];
            $vprodi = $data1['namaprodi'];
            $vukm = $data1['namaukm'];
            $id_prodi = $data1['id_prodi'];
            $id_ukm = $data1['id_ukm'];
        }
    } else if ($_GET['hal'] == "hapus") {

        //Persiapan Hapus data
        $hapus = mysqli_query($conn, "DELETE FROM mahasiswa where id_mhs = '$_GET[id]'");
        if ($hapus) {
            echo "<script>
                    alert('Hapus data Success!');
                    document.location='index.php';
                 </script>";
        }
    }
}

// Pencarian data
if (isset($_POST['bcari'])) {
    $keyword = $_POST['tcari'];

    $q = "SELECT mahasiswa.id_mhs, mahasiswa.nim, mahasiswa.nama, mahasiswa.gender,
        mahasiswa.alamat, program_studi.namaprodi, ukm.namaukm, program_studi.id_prodi, ukm.id_ukm FROM mahasiswa
        inner join program_studi on mahasiswa.id_prodi = program_studi.id_prodi
        inner join ukm on mahasiswa.id_ukm = ukm.id_ukm
        WHERE nim like '%$keyword%'
        or nama like'%$keyword%' or gender like'%$keyword%'
        or alamat like'%$keyword%' or namaprodi like'%$keyword%'
        or namaukm like'%$keyword%' ";
}

if (isset($_POST['bcari'])) {
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard mahasiswa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container">
        <!-- Awal Card Form -->

        <!-- Memasukkan Data -->
        <div class="card mt-5">
        <div class="card-header bg-secondary text-white">
                <form action="" method="POST">
                    <div class="d-flex justify-content-between">
                        <div class="my-auto">
                            Data Mahasiswa
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="my-auto">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn- mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form input Data mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>NIM</label>
                                        <input type="text" name="tnim" value="<?= @$vnim ?>" class="form-control" placeholder="Input NIM anda disini!" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="tnama" value="<?= @$vnama ?>" class="form-control" placeholder="Input Nama anda disini!" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="tgender">
                                            <option value="<?= @$vgender ?>"><?= @$vgender ?></option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="talamat" placeholder="Input Alamat anda disini"><?= @$valamat ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Program Studi</label>
                                        <select class="form-control" name="tprodi">
                                            <option value="<?= @$id_prodi ?>"><?= @$vprodi ?></option>
                                            <?php foreach ($prodi as $category) : ?>
                                                <option value="<?= $category['id_prodi']; ?>"><?= $category['namaprodi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>UKM</label>
                                        <select class="form-control" name="tukm">
                                            <option value="<?= @$id_ukm ?>"><?= @$vukm ?></option>
                                            <?php foreach ($ukm as $category) : ?>
                                                <option value="<?= $category['id_ukm']; ?>"><?= $category['namaukm']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Nomor</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Alamat</th>
                        <th>Program Studi</th>
                        <th>UKM</th>
                        <th>Aksi</th>
                    </tr>
                    <?php if (isset($_POST['bcari'])) : ?>
                        <?php
                        $no = 1;
                        $tampil = mysqli_query($conn, $q);
                        while ($data = mysqli_fetch_array($tampil)) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nim'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['gender'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['namaprodi'] ?></td>
                                <td><?= $data['namaukm'] ?></td>
                                <td>
                                    <a href="index.php?hal=edit&id=<?= $data['id_mhs'] ?>" > <img class="me-1" style="width: 28px;" src="images/edit (1).png" alt=""> </a>
                                    <a href="index.php?hal=hapus&id=<?= $data['id_mhs'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" ><img style="width: 28px;" src="images/delete.png" alt=""> </a>
                                </td>
                            </tr>
                        <?php endwhile; //penutup perulangan while 
                        ?>
                    <?php else : $no = 1; ?>
                        <?php foreach ($allTable as $cek) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $cek['nim'] ?></td>
                                <td><?= $cek['nama'] ?></td>
                                <td><?= $cek['gender'] ?></td>
                                <td><?= $cek['alamat'] ?></td>
                                <td><?= $cek['namaprodi'] ?></td>
                                <td><?= $cek['namaukm'] ?></td>
                                <td>
                                    <a href="index.php?hal=edit&id=<?= $cek['id_mhs'] ?>"> <img class="me-1" style="width: 28px;" src="images/edit (1).png" alt=""> </a>
                                    <a href="index.php?hal=hapus&id=<?= $cek['id_mhs'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" ><img style="width: 28px;" src="images/delete.png" alt=""> </a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    <?php endif; ?>
                </table>

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