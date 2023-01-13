<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
?>
<!DOCTYPE html>
<html>
<head><title>Sistem Inventory Berbasis Web</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
</head>
  <body>
    <center><h1>Data Barang</h1><center>
    <center><a href="TambahBarang.php">+ &nbsp; Tambah Barang</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Merek</th>
          <th>Nomor Seri</th>
          <th>Tanggal Masuk </th>
          <th>Catatan</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
      </thead>
    <tbody>
   
  
      <?php
        // jalankan query untuk menampilkan semua data diurutkan.
      $Batas = 10;
      $Halaman = isset($_GET['Halaman']) ? 
        (int) $_GET['Halaman'] : 1;
      $HalamanAwal = ($Halaman > 1) ? ($Halaman * $Batas) - $Batas : 0;
      $Previous = $Halaman - 1;
      $Next = $Halaman + 1;
       // $query = "SELECT * FROM barang ORDER BY id ASC";
       // $result = mysqli_query($Koneksi, $query);
      $data = mysqli_query($Koneksi, "select * from barang");
      $JumlahData = mysqli_num_rows($data);
      $TotalHalaman = ceil($JumlahData / $Batas);
      $DataBarang = mysqli_query($Koneksi, "select * from barang limit $HalamanAwal,$Batas ");
        //mengecek apakah ada error ketika menjalankan query
         /*  if(!$result){
          die ("Query Error: ".mysqli_errno($Koneksi).
           " - ".mysqli_error($Koneksi));
        } */
        //buat perulangan untuk element tabel dari data mahasiswa
        $no = $HalamanAwal+1; //variabel untuk membuat nomor urut
        // hasil query akan disimpan dalam variabel $data dalam bentuk array
        // kemudian dicetak dengan perulangan while
        while($row = mysqli_fetch_assoc($DataBarang))
        {
      ?>
       <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $row['NamaBarang']; ?></td>
          <td><?php echo $row['Merek']; ?></td>
          <td><?php echo $row['NomorSeri']; ?></td>
          <td><?php echo $row['TanggalMasuk']; ?></td>
          <td><?php echo substr($row['Catatan'], 0, 20); ?>...</td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['Gambar']; ?>" style="width: 120px;"></td>
          <td>
              <a href="EditBarang.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="ProsesHapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
       // $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
    <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($Halaman > 1){ echo "href='?Halaman=$Previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$TotalHalaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?Halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($Halaman < $TotalHalaman) { echo "href='?Halaman=$Next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
  </body>
</html>