<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) {

    $nama     = $_POST['nama'];
    $alamat  = $_POST['alamat'];
    $jk       = $_POST['jk'];
    $agama    = $_POST['agama'];
    $sekolah  = $_POST['sekolah'];

    // Prepared Statement (Best Practice)
    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss",
            $nama, $alamat, $jk, $agama, $sekolah
        );

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?status=sukses");
        } else {
            echo "Gagal menyimpan data.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Query gagal disiapkan.";
    }
} else {
    die("Akses dilarang.");
}
?>
