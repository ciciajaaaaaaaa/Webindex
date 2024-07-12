<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Program Jual Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background: linear-gradient(to right, #FFB3BA, #FFDFBA, #FFFFBA, #BAFFC9, #BAE1FF); /* Pastel rainbow gradient */
      color: #4A4A4A; /* Dark grey text color */
    }
    .btn-success {
      background-color: #FFB3BA; /* Pastel red */
      border-color: #FFB3BA;
    }
    .btn-success:hover {
      background-color: #FFDFBA; /* Pastel orange */
      border-color: #FFDFBA;
    }
    .btn-primary {
      background-color: #BAE1FF; /* Pastel blue */
      border-color: #BAE1FF;
    }
    .btn-primary:hover {
      background-color: #BAFFC9; /* Pastel green */
      border-color: #BAFFC9;
    }
    .btn-danger {
      background-color: #FFDFBA; /* Pastel orange */
      border-color: #FFDFBA;
    }
    .btn-danger:hover {
      background-color: #FFB3BA; /* Pastel red */
      border-color: #FFB3BA;
    }
    .card {
      background-color: #FFFFFF; /* White background for cards */
      color: #4A4A4A; /* Dark grey text color */
      border: 1px solid #BAE1FF; /* Pastel blue border */
    }
    .card-header {
      background-color: #FFFFBA; /* Pastel yellow for header */
      color: #4A4A4A; /* Dark grey text color */
    }
    .card-footer {
      background-color: #FFFFBA; /* Pastel yellow for footer */
      color: #4A4A4A; /* Dark grey text color */
    }
    table {
      color: #4A4A4A; /* Dark grey text color for table */
    }
    th, td {
      border: 1px solid #BAE1FF; /* Pastel blue border */
    }
    h2 {
      color: #4A4A4A; /* Dark grey text color for heading */
    }
  </style>
</head>
<body>
  <h2 class="text-center">Data Barang</h2>
  <div class="container">
    <a href="tambah_data.php" class="btn btn-success mb-3">Tambah Data</a>
    <div class="card">
      <div class="card-header">Data Barang</div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="txtcari" placeholder="Masukan Kata Kunci">
            <button class="btn btn-primary btn-sm" type="submit" name="btncari">Cari</button>
            <button class="btn btn-danger btn-sm" type="reset" name="btnreset">Reset</button>
          </div>
          <a href="print_pdf.php" target="_blank" class="btn btn-success mb-3">PRINT DATA</a>
        </form>
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Invoice</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              include "koneksi.php";
              $q = "SELECT * FROM jual ORDER BY invoice DESC";
              if (isset($_POST['txtcari']) && !empty($_POST['txtcari'])) {
                $keyword = $_POST['txtcari'];
                $q = "SELECT * FROM jual WHERE invoice LIKE '%$keyword%' OR nama_part LIKE '%$keyword%' ORDER BY invoice DESC";
              }
              $tampil = mysqli_query($cnn, $q);
              while ($data = mysqli_fetch_array($tampil)) {
            ?>
            <tr>
              <td><?=$no++ ?></td>
              <td><?=$data['invoice'] ?></td>
              <td><?=$data['nama_part'] ?></td>
              <td><?=$data['harga']?></td>
              <td><?=$data['jumlah']?></td>
              <td><?=$data['Total']?></td>
              <td>
                <a href="form_ubah.php?invoice=<?=$data['invoice']?>" class="btn btn-warning btn-sm">Ubah</a>
                <a href="proses_hapus.php?invoice=<?=$data['invoice']?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data ini mau di hapus?')">Hapus</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer"></div>
    </div>
  </div>
  <!-- Akhir container -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
