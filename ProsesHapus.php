<?php
include 'koneksi.php';
$id = $_GET["id"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM barang WHERE id='$id' ";
    $hasil_query = mysqli_query($Koneksi, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($Koneksi).
       " - ".mysqli_error($Koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
    }