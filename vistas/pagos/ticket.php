<?php

# Incluyendo librerias necesarias #

use controladores\CuotaControlador;

require "code128.php";

$pdf = new PDF_Code128('P', 'mm', array(80, 258));
$pdf->SetMargins(4, 10, 4);
$pdf->AddPage();

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Image('fpdf/logo_academia_color.png', 30, 2, 20);
$pdf->MultiCell(0, 5, utf8_decode(strtoupper("Academia Aiapaec S.A.C")), 0, 'C', false);
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(0, 5, utf8_decode("RUC: 20607080420"), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Direccion: Huallaga #364, Urb El Molino"), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Teléfono: 955119997"), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Email: contacto@academiaaiapaec.edu.pe"), 0, 'C', false);

$pdf->Ln(1);
$pdf->Cell(0, 5, utf8_decode("------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(5);
// Configura la zona horaria de Perú
date_default_timezone_set('America/Lima');
$fechaYHoraActual = date('Y-m-d H:i:s');
$pdf->MultiCell(0, 5, utf8_decode("Fecha: " . date("d/m/Y", strtotime($fechaYHoraActual)) . " " . date("h:i:s A")), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Vendedor(a) : " . $respuesta->resultado->cajeroPago), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Caja Nro: 1"), 0, 'C', false);
// $pdf->MultiCell(0,5,utf8_decode("Cajero: Carlos Alfaro"),0,'C',false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(0, 5, utf8_decode(strtoupper("Boleta de Venta Nro: " . $respuesta->resultado->idPago)), 0, 'C', false);
$pdf->SetFont('Arial', '', 9);

$pdf->Ln(1);
$pdf->Cell(0, 5, utf8_decode("------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(5);

$pdf->MultiCell(0, 5, utf8_decode("Cliente : " . ucwords($mi_estudiante->resultado->nombresEstudiante . " " . $mi_estudiante->resultado->apellidoEstudiante)), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Documento: " . $mi_estudiante->resultado->tipodocumentoEstudiante . "  " . $mi_estudiante->resultado->numerodocumentoEstudiante), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Teléfono: " . $mi_estudiante->resultado->celularEstudiante), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Dirección: " . $mi_estudiante->resultado->direccionEstudiante), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Fecha de Pago: " . date("d/m/Y h:i:s A", strtotime($respuesta->resultado->fechaPago))), 0, 'C', false);
$pdf->Ln(1);
$pdf->Cell(0, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(3);

# Tabla de productos #
$pdf->Cell(10, 5, utf8_decode("Cant."), 0, 0, 'C');
$pdf->Cell(19, 5, utf8_decode("Precio"), 0, 0, 'C');
$pdf->Cell(15, 5, utf8_decode("Desc."), 0, 0, 'C');
$pdf->Cell(28, 5, utf8_decode("Total"), 0, 0, 'C');

$pdf->Ln(3);
$pdf->Cell(72, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(3);


$detalle_pago = $mi_detalle->resultado;
$sub_total = 0;
$cantidad = count($detalle_pago);

/*----------  Detalles de la tabla  ----------*/
foreach ($detalle_pago as $detalle) {

    $cuota = new CuotaControlador();
    $cuota->entidad->idCuota = $detalle->idCuota;
    $mi_cuota = $cuota->modelo->get($cuota->entidad);
    if ($detalle->conceptoPago == 'Matrícula') {
        $pdf->MultiCell(0, 4, utf8_decode($mi_cuota->resultado->tipoCuota . " " . $mi_cuota->resultado->nroCuota . " Cuota"), 0, 'C', false);
        $pdf->Cell(10, 4, utf8_decode("1"), 0, 0, 'C');
        $pdf->Cell(19, 4, utf8_decode("S/.  " . number_format($mi_cuota->resultado->montoCuota, 2)), 0, 0, 'C');
        $pdf->Cell(19, 4, utf8_decode("S/.  " . number_format($mi_cuota->resultado->descuentoCuota, 2)), 0, 0, 'C');
        $pdf->Cell(28, 4, utf8_decode("S/.  " . number_format($mi_cuota->resultado->totalCuota, 2)), 0, 0, 'C');
        $pdf->Ln(4);
        $pdf->Ln(7);
    } else {
        if ($detalle->conceptoPago == 'Simulacros') {
            $pdf->MultiCell(0, 4, utf8_decode($mi_cuota->resultado->tipoCuota), 0, 'C', false);
        } else {
            if ($detalle->conceptoPago == 'Paquete Simulacros') {
                $pdf->MultiCell(0, 4, utf8_decode("Paquete de Simulacros"), 0, 'C', false);
                $pdf->Cell(10, 4, utf8_decode($cantidad), 0, 0, 'C');
                $pdf->Cell(19, 4, utf8_decode("S/.  " . number_format($mi_cuota->resultado->montoCuota, 2)), 0, 0, 'C');
                $pdf->Cell(19, 4, utf8_decode("S/.  " . number_format($mi_cuota->resultado->descuentoCuota, 2)), 0, 0, 'C');
                $pdf->Cell(28, 4, utf8_decode("S/.  " . number_format(($mi_cuota->resultado->montoCuota) * $cantidad, 2)), 0, 0, 'C');
                $pdf->Ln(4);
                $pdf->Ln(7);
                $sub_total=($mi_cuota->resultado->montoCuota) * $cantidad;
                break;
            } else {
                $pdf->MultiCell(0, 4, utf8_decode($mi_cuota->resultado->tipoCuota), 0, 'C', false);
                $pdf->Cell(10, 4, utf8_decode("1"), 0, 0, 'C');
                $pdf->Cell(19, 4, utf8_decode("S/.  " . number_format($mi_cuota->resultado->montoCuota, 2)), 0, 0, 'C');
                $pdf->Cell(19, 4, utf8_decode("S/.  " . number_format($mi_cuota->resultado->descuentoCuota, 2)), 0, 0, 'C');
                $pdf->Cell(28, 4, utf8_decode("S/.  " . number_format($mi_cuota->resultado->totalCuota, 2)), 0, 0, 'C');
                $pdf->Ln(4);
                $pdf->Ln(7);
            }
        }
    }
    $sub_total += ($mi_cuota->resultado->totalCuota);
}

/*----------  Fin Detalles de la tabla  ----------*/



$pdf->Cell(72, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');

$pdf->Ln(5);

# Impuestos & totales #
$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("SUBTOTAL"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode("+ " . "S/.  " . number_format($sub_total, 2)), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("IGV (18%)"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode("+ " . "S/.  " . number_format(0, 2)), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(72, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("TOTAL A PAGAR"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode("S/.  " . number_format($sub_total, 2)), 0, 0, 'C');

// $pdf->Ln(5);

// $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
// $pdf->Cell(22,5,utf8_decode("TOTAL PAGADO"),0,0,'C');
// $pdf->Cell(32,5,utf8_decode("$100.00 USD"),0,0,'C');

// $pdf->Ln(5);

// $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
// $pdf->Cell(22,5,utf8_decode("CAMBIO"),0,0,'C');
// $pdf->Cell(32,5,utf8_decode("$30.00 USD"),0,0,'C');

// $pdf->Ln(5);

// $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
// $pdf->Cell(22,5,utf8_decode("USTED AHORRA"),0,0,'C');
// $pdf->Cell(32,5,utf8_decode("$0.00 USD"),0,0,'C');

$pdf->Ln(10);

$pdf->MultiCell(0, 5, utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar este ticket ***"), 0, 'C', false);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 7, utf8_decode("Gracias por su compra"), '', 0, 'C');

$pdf->Ln(9);

# Codigo de barras #
$pdf->Code128(5, $pdf->GetY(), "COD000001V000" . $respuesta->resultado->idPago, 70, 20);
$pdf->SetXY(0, $pdf->GetY() + 21);
$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 5, utf8_decode("COD000001V000" . $respuesta->resultado->idPago), 0, 'C', false);

// Establecer metaetiquetas
$title = "Ticket | Academia Aiapaec";
$author = "T.I AIAPAEC";
$subject = "Intranet Academia Aiapaec";
$keywords = "Academia, Aiapaec, Trujillo, UNT";

$pdf->SetMetaTags($title, $author, $subject, $keywords);


# Nombre del archivo PDF #
$pdf->Output("I", "Ticket_Nro_" . $respuesta->resultado->idPago . ".pdf", true);
