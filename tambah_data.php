<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Bengkel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-soft-blue {
            background-color: #b3cde0; /* Soft blue */
        }
        .text-soft-blue {
            color: #b3cde0;
        }
        .btn-soft-blue {
            background-color: #b3cde0;
            border-color: #b3cde0;
            color: black;
        }
        .btn-soft-blue:hover {
            background-color: #6497b1; /* Darker soft blue */
            border-color: #6497b1;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center text-soft-blue">Data Spare Part</h3>
        <h3 class="text-center text-soft-blue">Mart Esi</h3>

        <div class="card">
            <div class="card-header bg-soft-blue text-light">
                Form Tambah Data Mart Esi
            </div>
            <div class="card-body">
                <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="kodesparepart">Invoice</label>
                        <input type="text" class="form-control" id="invoice" name="invoice" placeholder="Kode Spare Part">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_part">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_part" name="nama_part" placeholder="Nama Spare Part">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="harga">Harga Part</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Part">
                    </div>
                    <div class="form-group mb-3">
                        <label for="stock">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah Barang">
                    </div>
                    <div class="form-group mb-3">
                        <label for="stock">Total</label>
                        <input type="text" class="form-control" id="Total" name="Total" placeholder="total  Barang">
                    </div>
                   
                    <div class="d-flex justify-content-between">
                        <input class="btn btn-secondary" type="reset" value="Cancel">
                        <input class="btn btn-soft-blue" type="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div class="card-footer bg-soft-blue text-light">
                Bengkel Blue Esi
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
