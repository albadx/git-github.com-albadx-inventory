<?php
  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $nama_db = "Inventory"; //nama database
  $Koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$Koneksi){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysqli_connect_error());
  }
?>