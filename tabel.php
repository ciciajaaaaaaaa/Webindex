<?php
$dbname = 'db_jual';
$host = 'localhost';
$password = '';
$username = 'root';

// Koneksi Ke MySQL
$cnn = mysqli_connect($host, $username, $password, $dbname);

// Membuat Koneksi 
if (!$cnn) {
    die("Koneksi Failed: " . mysqli_connect_error());
}

// Membuat Tabel
$sql = "CREATE TABLE jual (
    invoice VARCHAR(10) NOT NULL,
    nama_part VARCHAR(25) NULL,
    harga INT NULL,
    jumlah INT NULL,
    Total INT NULL,
    CONSTRAINT pk_jual PRIMARY KEY (invoice)
)";

if (mysqli_query($cnn, $sql)) {
    echo "Table Berhasil di Buat";
} else {
    echo "Table Gagal di Buat: " . mysqli_error($cnn);
}

mysqli_close($cnn);
?>
