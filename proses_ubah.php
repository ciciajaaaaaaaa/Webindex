<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data invoice yang dikirim oleh form_ubah.php melalui URL
$invoice = $_GET['invoice'];

// Ambil Data yang Dikirim dari Form dan lakukan sanitasi
$nama_part = mysqli_real_escape_string($cnn, $_POST['nama_part']);
$harga = mysqli_real_escape_string($cnn, $_POST['harga']);
$jumlah = mysqli_real_escape_string($cnn, $_POST['jumlah']);
$total = mysqli_real_escape_string($cnn, $_POST['total']); // Corrected key to 'total'

// Cek koneksi
if (!$cnn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk menampilkan data berdasarkan invoice yang dikirim
$query = "SELECT * FROM jual WHERE invoice='$invoice'";
$sql = mysqli_query($cnn, $query); // Eksekusi query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi query

// Proses ubah data ke Database
$query = "UPDATE jual SET nama_part='$nama_part', harga='$harga', jumlah='$jumlah', total='$total' WHERE invoice='$invoice'";
$sql = mysqli_query($cnn, $query); // Eksekusi query

if($sql) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: index.php"); // Redirect ke halaman index.php
} else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
    echo "<br>Error: " . mysqli_error($cnn); // Menampilkan kesalahan dari query
}

mysqli_close($cnn);
?>
