<?php
require('fpdf\fpdf.php');
require_once('ajax\conexion.php');
$conexion = new conexion();
$conexion->conectar();
$id = $_GET["id"];
$query = "SELECT alumno.rut_alumno as RUTA, alumno.n_alumno as NOMA, alumno.app_alumno AS APA, alumno.apm_alumno AS AMA,
docente.rut_docente as RUTD, docente.n_docente as NODO, docente.app_docente AS APD, docente.apm_docente AS AMD, docente.depto_docente AS DEPTO,
certificado.diagnostico as DIAG, detalle_certificado.fecha_justificada AS JUSTIFI ,detalle_certificado.unidad AS UNIDAD , certificado.reposo AS REPOSO, detalle_certificado.actividad AS ACTIVI ,certificado.fecha_emision as INICIO
FROM alumno, docente, certificado, detalle_certificado
WHERE alumno.rut_alumno = certificado.n_alumno AND docente.rut_docente = detalle_certificado.det_profesor
AND certificado.id_certificado = detalle_certificado.det_certificado AND detalle_certificado.id_detalle = '$id'";
$valores = $conexion->mysqli->query($query);
$val = $valores->fetch_object();
$fechaemision = $val->INICIO;
$newDate1 = date("d/m/Y", strtotime($fechaemision));
$Fechajustificada = $val->JUSTIFI;
$newDate2 = date("d/m/Y", strtotime($Fechajustificada));
$fpdf = new FPDF();
$fpdf->AddPage('Portrait', 'Letter');
$fpdf->SetFont('Arial', 'B', 12);
$fpdf->Image('img\header_pdf.png', 67, 5,);
$fpdf->Ln(30);
$fpdf->Cell(205, 5, utf8_decode('JUSTIFICATIVO DE INASISTENCIA'), 0, 0, 'C');
$fpdf->ln();
$fpdf->Cell(205, 5, utf8_decode('DE ESTUDIANTES DE ENFERMERÍA'), 0, 0, 'C');
$fpdf->SetFont('Arial', '', 12);
$fpdf->ln(16);
$fpdf->Cell(30, 5, utf8_decode('Académico: '.$val->NODO." ".$val->APD." ".$val->AMD));
$fpdf->ln();
$fpdf->Cell(30, 5, utf8_decode('Del departamento de: '.$val->DEPTO));
$fpdf->ln();
$fpdf->ln();
$fpdf->MultiCell(200, 5, utf8_decode("Comunico a usted qué, el/la estudiante de nuestra carrera:"));
$fpdf->Cell(30, 5, utf8_decode($val->NOMA." ".$val->APA." ".$val->AMA));
$fpdf->ln(9);
$fpdf->Cell(30, 5, utf8_decode('Presentó justificativo de inasistencia a Dirección de Escuela.'));
$fpdf->ln();
$fpdf->Cell(30, 5, 'Fecha de emision del certificado: '.$newDate1);
$fpdf->ln(15);
$fpdf->Cell(30, 5, utf8_decode('Ausentandose a la(s) siguiente(s) actividad(es) académica(s): '));
$fpdf->ln();
$fpdf->Cell(30, 5, utf8_decode('Actividad justificada: '.$val->ACTIVI));
$fpdf->ln();
$fpdf->Cell(30, 5, utf8_decode('Unidad: '.$val->UNIDAD));
$fpdf->ln();
$fpdf->Cell(30, 5, utf8_decode('Con fecha: '.$newDate2));
$fpdf->ln();
$fpdf->ln();
$fpdf->Image('img\firma_direccion.PNG', 5, 150,);
$fpdf->Cell(30, 5, utf8_decode('Por lo que agradeceré fijar fecha de recuperación de actividades evaluativas, según corresponda.'));
$fpdf->OutPut( 'D','Justificacion_'.$val->NOMA." ".$val->APA." ".$val->AMA."-".$val->UNIDAD."-".$val->JUSTIFI.'.PDF' );
//$fpdf->OutPut('D', 'justificacion_'.$val->NOMA." ".$val->APA." ".$val->AMA."-".$val->UNIDAD."-".$val->JUSTIFI.'.PDF');
?>
