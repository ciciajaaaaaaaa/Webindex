<?php

// Include the FPDF library
require('library/fpdf.php');
include 'koneksi.php';

// Extend the FPDF class to add a header and footer
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('logo.jpg', 10, 6, 25); // Adjust the path and dimensions as needed
        // Set font
        $this->SetFont('Times', 'B', 12);
        // Store Name and Address
        $this->Cell(0, 10, 'Mart Esi Floryn', 0, 1, 'C');
        $this->Cell(0, 10, 'Jln. Simpatic Batu Taba Ampek Angkek', 0, 1, 'C');
        // Line break
        $this->Ln(10);
        // Draw a line
        $this->Line(10, 30, 200, 30);
        $this->Ln(5); // Additional line break for spacing
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Times italic 8
        $this->SetFont('Times', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create a new instance of the PDF class
$pdf = new PDF();
$pdf->AddPage();

// Add the date on the left
$pdf->SetFont('Times', '', 12);
$pdf->Cell(0, 10, 'Tanggal Input Data: ' . date('d-m-Y'), 0, 1, 'L');
$pdf->Ln(5); // Line break for spacing

// Add a title with larger font and bold
$pdf->SetFont('Times', 'B', 15);
$pdf->Cell(0, 10, 'DATA PENJUALAN BARANG', 0, 1, 'C');
$pdf->Ln(5); // Line break for spacing

// Set the font for the table header
$pdf->SetFont('Times', 'B', 11);
$pdf->SetFillColor(230, 230, 230); // Set a fill color for the header
$pdf->Cell(10, 7, 'NO', 1, 0, 'C', true);
$pdf->Cell(30, 7, 'INVOICE', 1, 0, 'C', true);
$pdf->Cell(50, 7, 'NAMA BARANG', 1, 0, 'C', true);
$pdf->Cell(30, 7, 'HARGA', 1, 0, 'C', true);
$pdf->Cell(30, 7, 'JUMLAH', 1, 0, 'C', true);
$pdf->Cell(30, 7, 'TOTAL', 1, 1, 'C', true);

// Set the font for the table body
$pdf->SetFont('Times', '', 10);

// Fetch data from the database and add it to the table
$no = 1;
$totalJumlah = 0;
$totalHarga = 0;
$lowStockItems = [];

$data = mysqli_query($cnn, "SELECT * FROM jual");
while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(30, 6, $d['invoice'], 1, 0);
    $pdf->Cell(50, 6, $d['nama_part'], 1, 0);
    $pdf->Cell(30, 6, number_format($d['harga'], 2, ',', '.'), 1, 0); // Format as currency
    $pdf->Cell(30, 6, $d['jumlah'], 1, 0);
    $pdf->Cell(30, 6, number_format($d['Total'], 2, ',', '.'), 1, 1); // Format as currency
    
    // Sum the totals
    $totalJumlah += $d['jumlah'];
    $totalHarga += $d['Total'];

    // Check for low stock items
    if ($d['jumlah'] < 5) {
        $lowStockItems[] = $d['nama_part'];
    }
}

// Add totals to the table
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(120, 7, 'Total', 1, 0, 'C', true);
$pdf->Cell(30, 7, $totalJumlah, 1, 0, 'C', true);
$pdf->Cell(30, 7, number_format($totalHarga, 2, ',', '.'), 1, 1, 'C', true);

// Add note for low stock items
if (!empty($lowStockItems)) {
    $pdf->Ln(10); // Line break for spacing
    $pdf->SetFont('Times', 'i', 10);
    $pdf->Cell(0, 10, 'Note: Item barang yang memiliki stok di bawah 5, silakan restock!!');
   
}


// Add space for the owner's signature
$pdf->Ln(20); // Line break for spacing
$pdf->SetFont('Times', '', 12);
$pdf->Cell(0, 10, 'Bukittinggi, ' . date('d-m-Y'), 0, 1, 'R');
$pdf->Ln(20); // Line break for spacing
$pdf->Cell(0, 10, '(__________________)', 0, 1, 'R');


// Output the PDF
$pdf->Output();

?>
