<?php
//Conexión a la base de datos
$db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(20);
    // Título
    $this->Cell(70,10,'Reporte de Ordenes De Produccion ',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(20);


    $this->Cell(30,10,'Cantidad',1,0,'C',0);
	 $this->Cell(60,10,'Producto',1,1,'C',0);
  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

$consulta = "SELECT * FROM ordenes";
$resultado = $db->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {

    $producto = utf8_decode($row['producto']);
    $cantidad = utf8_decode($row['cantidad']);

    $pdf->Cell(20);


    $pdf->Cell(30,10,$cantidad,1,0,'C',0);
    $pdf->MultiCell(60,10,$producto,1,'C',0);
} 


	$pdf->Output();
?>