<?php
// include connection file 
include "databaseconnect.php";
require('fpdf184/fpdf.php');

class PDF extends FPDF
{
   // Page header
function Header()
{
    
    // Logo

    $this->Image('logo/Solo.png',95,10,20);
    $this->Ln(10);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,20,'Solo Squad',0,0,'C');
    $this->Cell(50,20,'Clothing Store',0,0,'C');
    // Line break
    $this->Ln(40);

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Vinit Mohanbhai Dabhi - 8804874',0,0,'C');
}

}

// Initialize PDF object
ob_clean();

$pdf = new PDF();
$pdf->AddPage();

$result = mysqli_query($conn, "SELECT UserName, COUNT(*) AS OrderCount FROM OrderDetails GROUP BY UserName ORDER BY OrderCount DESC LIMIT 3");

// Print table header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, 'User Name', 1, 0);
$pdf->Cell(50, 10, 'Number of Orders', 1, 1);

// Print table rows
$pdf->SetFont('Arial', '', 12);
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(50, 10, $row['UserName'], 1, 0);
    $pdf->Cell(50, 10, $row['OrderCount'], 1, 1);
}

// Output PDF
$pdf->Output();
?>
