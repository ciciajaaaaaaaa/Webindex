<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Bengkel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0ffd6; /* Light green */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card-header, .card-footer {
            background-color: #fffdd0; /* Light yellow */
        }
        .btn-primary {
            background-color: #fffdd0;
            border-color: #fffdd0;
            color: #000;
        }
        .btn-primary:hover {
            background-color: #e0ffd6;
            border-color: #e0ffd6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h3 class="text-center">Data Penjualan Barang</h3>
                <h3 class="text-center">Mart Esi</h3>
                <?php
                // Load file koneksi.php
                include "koneksi.php";

                // Ambil data NIS yang dikirim oleh index.php melalui URL
                $invoice = $_GET['invoice'];

                // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
                $query = "SELECT * FROM jual WHERE invoice='$invoice'";
                $sql = mysqli_query($cnn, $query); // Eksekusi/Jalankan query dari variabel $query
                $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
                ?>
                <div class="card text">
                    <div class="card-header text-dark">
                        Form Ubah Spare Part
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_ubah.php?invoice=<?php echo $invoice; ?>" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="kodesparepart">Invoice</label>
                                <input type="text" class="form-control" id="invoice" name="invoice" placeholder="kode barang" value="<?php echo $data['invoice']; ?>" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_part">Nama Part</label>
                                <input type="text" class="form-control" id="nama_part" name="nama_part" placeholder="nama spare part" value="<?php echo $data['nama_part']; ?>">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="harga">Harga Part</label>
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Part" value="<?php echo $data['harga']; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="stock">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah" value="<?php echo $data['jumlah']; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_masuk">Total</label>
                                <input type="text" class="form-control" id="Total" name="total" value="<?php echo $data['Total']; ?>">
                            </div>
                            <input class="btn btn-primary" type="submit" value="Ubah">
                        </form>
                    </div>
                    <div class="card-footer text-dark">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script> 
    <script>
        $(document).ready(function() {
            $("#harga,#jumlah").keyup(function() {
                var harga = $("#harga").val();
                var jumlah = $("#jumlah").val();
                var total = parseInt(harga) * parseInt(jumlah);
                $("#Total").val(total);
            });
        });
    </script>  
</body>
</html>
