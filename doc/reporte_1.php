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
    $this->Cell(70,10,'Reporte de Productos ',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(20);

    $this->Cell(10,10,'id',1,0,'C',0);
    $this->Cell(65,10,'Nombre',1,0,'C',0);
	$this->Cell(15,10,'#',1,0,'C',0);
    $this->Cell(35,10,'Fabricante',1,0,'C',0);
    $this->Cell(30,10,'Fecha',1,1,'C',0);
  
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

$consulta = "SELECT * FROM productos";
$resultado = $db->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
	$id = utf8_decode($row['id']);
    $nombre = utf8_decode($row['nombre']);
    $cantidad = utf8_decode($row['cantidad']);
    $fabricante = utf8_decode($row['proveedor']);
    $fecha_elaboracion = utf8_decode($row['fecha_elaboracion']);

    $pdf->Cell(20);
    $pdf->Cell(10,10,$id,1,0,'C',0);
    $pdf->Cell(65,10,$nombre,1,0,'C',0);
    $pdf->Cell(15,10,$cantidad,1,0,'C',0);
    $pdf->Cell(35,10,$fabricante,1,0,'C',0);
    $pdf->Cell(30,10,$fecha_elaboracion,1,1,'C',0);
} 


	$pdf->Output();
?>