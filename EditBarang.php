<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'Koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM barang WHERE id='$id'";
    $result = mysqli_query($Koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($Koneksi).
         " - ".mysqli_error($Koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sistem Inventory Berbasis Web</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Barang <?php echo $data['NamaBarang']; ?></h1>
      <center>
      <form method="POST" action="ProsesEdit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama Barang</label>
          <input type="text" name="NamaBarang" value="<?php echo $data['NamaBarang']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Merek</label>
         <input type="text" name="Merek" value="<?php echo $data['Merek']; ?>" />
        </div>
        <div>
          <label>Nomor Seri</label>
         <input type="text" name="NomorSeri" value="<?php echo $data['NomorSeri']; ?>" />
        </div>
        <div>
          <label>Tanggal Masuk</label>
         <input type="Date" name="TanggalMasuk" value="<?php echo $data['TanggalMasuk']; ?>" />
        </div>
        <div>
          <label>Catatan</label>
         <input type="text" name="Catatan" value="<?php echo $data['Catatan']; ?>"/>
        </div>
        <div>
          <label>Gambar Barang</label>
          <img src="Gambar/<?php echo $data['Gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="Gambar" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>