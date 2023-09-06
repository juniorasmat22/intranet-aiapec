
<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{

 // Función personalizada para establecer metaetiquetas
 function SetMetaTags($title, $author, $subject, $keywords) {
    $this->SetTitle($title);
    $this->SetAuthor($author);
    $this->SetSubject($subject);
    $this->SetKeywords($keywords);
}
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
    // $this->Cell(30,10,"Concurso ABC",0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Image('fpdf/logo_academia_color.png',160,8,33);
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
    $this->Image('fpdf/logo_academia_color.png',10,280,33);
    $this->Image('fpdf/logo_academia_color.png',160,280,33);
}
}


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Poppins-Bold','',17);
$pdf->Cell(80);
$pdf->Cell(30,10,mb_convert_encoding('Ficha de Inscripción Aiapaec', 'ISO-8859-1', 'UTF-8'),0,0,'C');

$pdf->SetFont('Poppins-Bold','',10);
$pdf->Ln(7);

// Convierte el dato BLOB en una imagen base64
$imagenBase64 = base64_encode($mi_estudiante->resultado->fotoEstudiante);
// Agrega la imagen al PDF

$pdf->Image('data:image/jpeg;base64,' . $imagenBase64, 20, 85, 60,0,'JPEG');
$pdf->SetFont('Poppins-Bold','',15);
$pdf->SetXY(30,65);
$pdf->Cell(22,2,mb_convert_encoding("Código :  ", 'ISO-8859-1', 'UTF-8'));
$pdf->SetFont('Poppins','',15);
$pdf->SetXY(60,65);
$pdf->Cell(22,2,mb_convert_encoding(sprintf("%05d", $mi_estudiante->resultado->idEstudiante), 'ISO-8859-1', 'UTF-8'));
$pdf->SetFont('Poppins-Bold','',15);
$pdf->SetXY(90,70);
$pdf->Cell(30,10,"D.N.I :  ",0,0);
$pdf->SetXY(90,90);
$pdf->Cell(30,10,"Apellidos :  ",0,0);
$pdf->SetXY(90,110);
$pdf->Cell(30,10,"Nombres: ",0,0);
$pdf->SetXY(90,130);
$pdf->Cell(30,10,"Nivel : ",0,0);
$pdf->SetXY(90,150);
$pdf->Cell(30,10,"Grado : ",0,0);
$pdf->SetXY(90,170);
$pdf->Cell(30,10,"Apoderado : ",0,0);
$pdf->SetFont('Poppins','',15);
$pdf->SetXY(95,83);
$pdf->Cell(20,2,mb_convert_encoding($mi_estudiante->resultado->numerodocumentoEstudiante , 'ISO-8859-1', 'UTF-8'));
$pdf->SetXY(95,103);
$pdf->Cell(20,2,mb_convert_encoding(ucwords($mi_estudiante->resultado->apellidoEstudiante) , 'ISO-8859-1', 'UTF-8'));
$pdf->SetXY(95,123);
$pdf->Cell(20,2,mb_convert_encoding(ucwords($mi_estudiante->resultado->nombresEstudiante) , 'ISO-8859-1', 'UTF-8'));
$pdf->SetXY(95,143);
$pdf->Cell(25,2,mb_convert_encoding($mi_nivel->resultado->descripcionNivel, 'ISO-8859-1', 'UTF-8'));
$pdf->SetXY(95,163);
$pdf->Cell(25,2,mb_convert_encoding( $mi_grado->resultado->descripcionGrado, 'ISO-8859-1', 'UTF-8'));
$pdf->SetXY(95,183);
$pdf->Cell(25,2,mb_convert_encoding( ucwords($mi_estudiante->resultado->apellidoApoderadoEstudiante)." ".ucwords($mi_estudiante->resultado->nombreApoderadoEstudiante), 'ISO-8859-1', 'UTF-8'));


$pdf->SetFont('Poppins','',10);
$pdf->SetXY(10,256);
$pdf->MultiCell(190,5,mb_convert_encoding("Ficha válida solo para el ".$mi_concurso->resultado->nombreConcurso.", evento a realizarce el día ". date("d/m/Y", strtotime($mi_concurso->resultado->fechaConcurso))." a las ". date("h:i A", strtotime($mi_concurso->resultado->horaConcurso))."\nDicho concurso tendra lugar en  ".$mi_concurso->resultado->lugarConcurso,'ISO-8859-1', 'UTF-8'),0);
// Establecer metaetiquetas
$title = "Intranet | Academia Aiapaec";
$author = "TI AIAPAEC";
$subject = "Intranet Academia Aiapaec";
$keywords = "Academia, Aiapaec, Trujillo, UNT";

$pdf->SetMetaTags($title, $author, $subject, $keywords);


//tablas
$pdf->Ln(10);
$pdf->Cell(15);

// Establecer cabeceras para descarga del archivo PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="documento.pdf"');
// Enviar el contenido del PDF al navegador
$pdf->Output($mi_estudiante->resultado->numerodocumentoEstudiante.'.pdf', 'D');
?>
