<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('fpdf/logo_academia_color.png',10,8,33);
    $this->AddFont('Poppins', '', 'Poppins-Light.php');
    $this->AddFont('Poppins-Bold', '', 'Poppins-Bold.php');
    // Arial bold 15
    $this->SetFont('Poppins-Bold','',15);
    //color de texto
    $this->SetTextColor(99, 20, 16);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Academia Preuniversitaria Aiapaec',0,0,'C');
    // Salto de línea
    $this->Ln();
// Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Concurso ABC',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Poppins','',10);
    // Número de página
    $this->Cell(0,10,mb_convert_encoding('Página ', 'ISO-8859-1', 'UTF-8').$this->PageNo().'/{nb}',0,0,'C');
}
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Poppins','',20);
$pdf->Cell(80);
$pdf->Cell(30,10,mb_convert_encoding('Ficha de Inscripción', 'ISO-8859-1', 'UTF-8'),0,0,'C');
$pdf->Cell(160);

$pdf->SetFont('Poppins','',10);
$pdf->Ln(7);
$pdf->SetXY(30,45);
$pdf->Cell(22,2,mb_convert_encoding("CÓDIGO :  ", 'ISO-8859-1', 'UTF-8'));
$pdf->Cell(20,2,mb_convert_encoding($_SESSION['idEstudiante'], 'ISO-8859-1', 'UTF-8') );
$pdf->Ln(7); 
// Convierte el dato BLOB en una imagen base64
$imagenBase64 = base64_encode($mi_estudiante->resultado->fotoEstudiante);
// Agrega la imagen al PDF
$pdf->Image("data:image/jpeg;base64," . $imagenBase64, 20, 50, 50, 0, 'PNG');
$pdf->SetFont('Poppins','',10);
$pdf->Ln(7);
$pdf->SetXY(80,55);
$pdf->Cell(22,2,"ESTUDIANTE :  ");
$pdf->Cell(20,2,mb_convert_encoding($_SESSION['name'], 'ISO-8859-1', 'UTF-8'));
$pdf->Ln(7); 
$pdf->SetXY(80,75);
$pdf->Cell(20,2,"SEDE: ");
$pdf->Cell(20,2,'TRUJILLO');
$pdf->Ln(7); 
$pdf->SetXY(80,85);
$pdf->Cell(25,2,"UNIDAD : ");
$pdf->Cell(25,2,mb_convert_encoding(strtoupper(0), 'ISO-8859-1', 'UTF-8'));
$pdf->Ln(7); 
$pdf->SetXY(80,95);
$pdf->Cell(25,2,"PROGRAMA : ");
$pdf->Cell(25,2,mb_convert_encoding(strtoupper(1), 'ISO-8859-1', 'UTF-8'));
$pdf->Ln(7);
$pdf->SetXY(80,105);
$pdf->Cell(25,2,mb_convert_encoding("MENCIÓN : ", 'ISO-8859-1', 'UTF-8'));
$pdf->Cell(25,2,mb_convert_encoding(strtoupper(2), 'ISO-8859-1', 'UTF-8'));
$pdf->Ln(7); 
$pdf->SetXY(80,115);
$pdf->Cell(25,2,"CICLO : ");
$pdf->Cell(25,2,mb_convert_encoding(strtoupper(3), 'ISO-8859-1', 'UTF-8'));
$pdf->Ln(7); 
$pdf->SetXY(80,125);
$pdf->Cell(25,2,"SEMESTRE : ");
$pdf->Cell(25,2,mb_convert_encoding(strtoupper(4), 'ISO-8859-1', 'UTF-8'));
$pdf->Ln(7); 
$pdf->Ln(10);
//tabla

$pdf->SetFontSize(10);
$pdf->SetFont('Arial','B',9); 
$pdf->SetFillColor(46, 92, 189);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(0,0,0);

$N=mb_convert_encoding("N°", 'ISO-8859-1', 'UTF-8');
$pdf->Cell(10,5,$N,1,0,'C',1);
$pdf->Cell(130,5,"CURSOS",1,0,'C',1);
$pdf->Cell(20,5,"CICLO",1,0,'C',1);
$pdf->Cell(20,5,mb_convert_encoding("CRÉDITOS", 'ISO-8859-1', 'UTF-8'),1,0,'C',1);


$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0,0,0);
$num=0;
// $cursos=$mi_detalle->resultado;
//     foreach ($cursos as $curso){
//     $num+=1;
//     $pdf->Cell(10,5,$num,1,0,'C',1);
//     $pdf->Cell(130,5,utf8_decode(strtoupper($curso->nombre)),1,0,'C',1);
//     $pdf->Cell(20,5,$curso->ciclo,1,0,'C',1);
//     $pdf->Cell(20,5,$curso->creditos,1,0,'C',1);

//     $pdf->Ln();
//     }

//  $pdf->Cell(160,5,utf8_decode("TOTAL DE CRÉDITOS"),1,0,'C',1);
//   $pdf->Cell(20,5,$suma_creditos->resultado[0]->suma,1,0,'C',1);

$pdf->Ln(10);
$pdf->Cell(15);
//$pdf->Cell(25,2,"TOTAL A PAGAR : ");
$pdf->Output();
?>
