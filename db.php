<?php
$cnn = mysqli_connect('localhost','root');
if(mysqli_connect_errno()){
echo"koneksi ke sever gagal";
}
$sql = "CREATE DATABASE db_jual
"; 
if(mysqli_query($cnn, $sql))
{ echo "Database Berhasil dibuat"; 
} else{ echo "Gagal membuat Database :".mysqli_error($cnn); } 
mysqli_close($cnn);
?>