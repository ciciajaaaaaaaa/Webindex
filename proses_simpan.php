<?php
// Load file koneksi.php
include "koneksi.php";

// Check if form data is set
if (isset($_POST['invoice']) && isset($_POST['nama_part']) && isset($_POST['harga']) && isset($_POST['jumlah']) && isset($_POST['Total'])) {

    // Retrieve data from form and sanitize
    $invoice = mysqli_real_escape_string($cnn, $_POST['invoice']);
    $nama_part = mysqli_real_escape_string($cnn, $_POST['nama_part']);
    $harga = mysqli_real_escape_string($cnn, $_POST['harga']);
    $jumlah = mysqli_real_escape_string($cnn, $_POST['jumlah']);
    $Total = mysqli_real_escape_string($cnn, $_POST['Total']);

    // Check if the kodesparepart already exists
    $check_query = "SELECT * FROM jual WHERE invoice='$invoice'";
    $check_result = mysqli_query($cnn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Maaf, kode sparepart sudah ada.";
        echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    } else {
        // Prepare the query
        $query = "INSERT INTO jual (invoice, nama_part,harga, jumlah, Total) VALUES ('$invoice', '$nama_part', '$harga', '$jumlah', '$Total')";
        
        // Execute the query
        $sql = mysqli_query($cnn, $query);

        // Check if the query was successful
        if ($sql) {
            header("location: index.php");
        } else {
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
        }
    }
} else {
    echo "Maaf, semua data form harus diisi.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>
