<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data NIS yang dikirim oleh index.php melalui URL
$invoice = $_GET['invoice'];
// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
$query = "SELECT * FROM jual WHERE invoice='".$invoice."'";
$sql = mysqli_query($cnn, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
// Cek apakah file fotonya ada di folder images

$query2 = "DELETE FROM jual WHERE invoice='".$invoice."'";
$sql2 = mysqli_query($cnn, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
// Jika Sukses, Lakukan :
header("location: index.php"); // Redirect ke halaman index.php
}else{
// Jika Gagal, Lakukan :
echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
?>