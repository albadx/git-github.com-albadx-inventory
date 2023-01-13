<?php
  include('Koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
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
        <h1>Tambah Barang</h1>
      <center>
      <form method="POST" action="ProsesTambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama Barang</label>
          <input type="text" name="NamaBarang" autofocus="" required="" />
        </div>
        <div>
          <label>Merek</label>
          <input type="text" name="Merek" autofocus="" required="" />
        </div>
        <div>
          <label>Nomor Seri</label>
          <input type="text" name="NomorSeri" autofocus="" required="" />
        </div>
        <div>
          <label>Tanggal Masuk</label>
          <input type="date" name="TanggalMasuk" autofocus="" required="" />
        </div>
        <div>
          <label>Catatan</label>
         <input type="text" name="Catatan" />
        </div>
         <label>Gambar</label>
         <input type="file" name="Gambar" required="" />
        </div>
        <div>
         <button type="Submit">Simpan </button>
        </div>
        </section>
      </form>
  </body>
</html>