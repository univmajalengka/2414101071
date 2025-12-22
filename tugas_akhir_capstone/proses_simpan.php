<?php
include 'koneksi.php';

$nama=$_POST['nama'];
$hp=$_POST['hp'];
$tanggal=$_POST['tanggal'];
$hari=$_POST['hari'];
$peserta=$_POST['peserta'];
$harga=$_POST['harga'];
$total=$_POST['total'];

mysqli_query($conn,"INSERT INTO pesanan VALUES(NULL,'$nama','$hp','$tanggal','$hari','$peserta',0,0,0,'$harga','$total')");
header("location:modifikasi_pesanan.php");
?>