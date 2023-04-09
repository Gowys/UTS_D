<?php 
    include('config.php');

    function readQuery($table)
    {
        global $conn;
        $query = "SELECT * FROM $table;";
        $result = mysqli_query($conn, $query);
        $records = [];
        while ($record = mysqli_fetch_assoc($result)) {
            $records[] = $record;
        }
        return $records;
    }

    function readSpecificQuery()
    {
        global $conn;
        $query = "SELECT mahasiswa.id_mhs, mahasiswa.nim, mahasiswa.nama, mahasiswa.gender, mahasiswa.alamat, program_studi.namaprodi, ukm.namaukm FROM mahasiswa inner join program_studi on mahasiswa.id_prodi = program_studi.id_prodi inner join ukm on mahasiswa.id_ukm = ukm.id_ukm;";
        $result = mysqli_query($conn, $query);
        $records = [];
        while ($record = mysqli_fetch_assoc($result)) {
            $records[] = $record;
        }
        return $records;
    }

    // function tambahData($data){
    //     global $conn;

    //     $nama = htmlspecialchars($data["judul_produk"]);
    //     $harga = htmlspecialchars($data["harga_produk"]);
    //     $deskripsi = htmlspecialchars($data["deskripsi_produk"]);
    //     $username = htmlspecialchars($data["username_produk"]);
    //     $password = htmlspecialchars($data["password_produk"]);
    //     $kategori = htmlspecialchars($data["kategori"]);
    //     $query = "INSERT INTO mahasiswa VALUES ('', '$harga', '$nama', '$deskripsi', '$foto1', '$foto2', '$foto3', '$username', '$password', '$kategori', 'Belum Diperiksa', 'Belum Terjual', $id)";
    //     mysqli_query($conn, $query);
        
    //     return mysqli_affected_rows($conn);$query = "INSERT INTO produk VALUES ('', '$harga', '$nama', '$deskripsi', '$foto1', '$foto2', '$foto3', '$username', '$password', '$kategori', 'Belum Diperiksa', 'Belum Terjual', $id)";
    //     mysqli_query($conn, $query);
        
    //     return mysqli_affected_rows($conn);
    // }

?>