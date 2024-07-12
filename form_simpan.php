<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Bengkel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h3 class="text-center">Data Penjualan Barang</h3>
    <h3 class="text-center">Mart Esi</h3>

    <div class="container">
        <div class="card text">
            <div class="card-header bg-primary text-light">
                Form Input Spare Part
            </div>
            <div class="card-body">
                <form action="proses_simpan.php" method="post">
                    <div class="form-group mb-3">
                        <label for="kodesparepart">Invoice</label>
                        <input type="text" class="form-control" id="invoice" name="invoice" placeholder="kode barang">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_part">Nama Part</label>
                        <input type="text" class="form-control" id="nama_part" name="nama_part" placeholder="nama barang">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="harga">Harga Barang</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="stock">jumlah Harga</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_masuk">Total</label>
                        <input type="date" class="form-control" id="Total" name="Total" placeholder="">
                    </div>
                    <input class="btn btn-primary" type="reset" value="Cancel">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>
            <div class="card-footer bg-primary text-light">
            </div>
        </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
