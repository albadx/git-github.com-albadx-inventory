<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'Koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $NamaBarang    = $_POST['NamaBarang'];
  $Merek         = $_POST['Merek'];
  $NomorSeri     = $_POST['NomorSeri'];
  $TanggalMasuk  = $_POST['TanggalMasuk'];
  $Catatan       = $_POST['Catatan'];
  $Gambar        = $_FILES['Gambar']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($Gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $Gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['Gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $NamaGambarBaru = $angka_acak.'-'.$Gambar; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'Gambar/'.$NamaGambarBaru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE barang SET NamaBarang = '$NamaBarang', Merek = '$Merek', NomorSeri = '$NomorSeri', TanggalMasuk = '$TanggalMasuk', Catatan = '$Catatan', Gambar = '$NamaGambarBaru'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($Koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($Koneksi).
                             " - ".mysqli_error($Koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE barang SET NamaBarang = '$NamaBarang', Merek = '$Merek', NomorSeri = '$NomorSeri', TanggalMasuk = '$TanggalMasuk', Catatan = '$Catatan'";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($Koneksi, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($Koneksi).
                             " - ".mysqli_error($Koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }

 