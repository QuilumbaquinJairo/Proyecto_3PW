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


  	$this->Cell(35,10,'Telefono',1,0,'C',0);
    $this->Cell(30,10,'Ruc',1,0,'C',0);
    $this->Cell(40,10,'Nombre',1,1,'C',0);

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

$consulta = "SELECT * FROM proveedores";
$resultado = $db->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {

    $nombre = utf8_decode($row['nombre']);
    $telefono = utf8_decode($row['telefono']);
    $ruc = utf8_decode($row['ruc']);

    $pdf->Cell(20);
    $pdf->Cell(35,10,$telefono,1,0,'C',0);
    $pdf->Cell(30,10,$ruc,1,0,'C',0);
    $pdf->MultiCell(40,10,$nombre,1,'C',0);

}


	$pdf->Output();
?>