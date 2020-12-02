<?php
require_once 'phpqrcode/qrlib.php';
require_once 'tfpdf/tfpdf.php';

$link = "https://licencias.coacalco.gob.mx";


$dirQR = 'pdf/';
if(!file_exists($dirQR)):
  mkdir($dirQR);
endif;

//CREATE PDF
$pdf=new tFPDF();
$title="PDF";


$nombre       = 'Abel Ramirez Quezada';
$folio        = '0980989892';
$autorizacion = 'Maikol';
$horario      ="21:09 a 21:10";
$catastral    = "KJ987987LKJ";
$rfc          = "RAQA0009IJ4";
$tGiro        = "Comida";
$giro         = "Garnachas";
$licencia     = "Una Licencia Chida";
$calle        = "Diputado Sergio Perez Tovar";
$noExterior   = "84";
$localDespacho= "Un local chido";
$colonia      = "San Pablo De Las Salinas";
$cp           = "54930";
$zona         = "Zona Chida";
$rMunicipal   = "SDJN989";
$aforo        = "Mi Aforo";
$sTotal       = "1232";
$sConstruida  = "9878";
$sSnConstruir = "897";
$cIncluidos   = "Unos 20";
$cAnexos      = "Como 10";
$dSolicitado  = "21";
$mSolicitado  = "09";
$aSolicitado  = "2000";
$dExpedido    = "21";
$mExpedido    = "09";
$aExpedido    = "2020";



$filename = $dirQR . $catastral . ".png";
$tamanio = 15;
$level = 'H';
$frameSize = 1;
$contenido = "$link/index.php?clave=$catastral";
QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

//Primera página
$pdf->AddPage();
$pdf->Image('coa.jpg','0','0','210','297','JPG'); 

$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',11);


$pdf->SetFont('Arial', '', 10);
$pdf->setTextColor(0, 0, 0);
$pdf->SetXY(20, 61);
$pdf->Cell(0, 0, $nombre);
$pdf->SetXY(15, 80);
$pdf->Cell(0, 0, $giro);
$pdf->SetXY(56, 107);
$pdf->Cell(0, 0, $horario);

$pdf->SetXY(41, 130);
$pdf->Cell(0, 0, $catastral);
$pdf->SetXY(41, 142);
$pdf->Cell(0, 0, $tGiro);
$pdf->SetXY(41, 154);
$pdf->Cell(0, 0, $calle);
$pdf->SetXY(41, 166);
$pdf->Cell(0, 0, $localDespacho);

$pdf->SetXY(137, 130);
$pdf->Cell(0, 0, $rfc);
$pdf->SetXY(137, 142);
$pdf->Cell(0, 0, $licencia);
$pdf->SetXY(137, 154);
$pdf->Cell(0, 0, $noExterior);
$pdf->SetXY(137, 166);
$pdf->Cell(0, 0, $colonia);

$pdf->SetXY(20, 179);
$pdf->Cell(0, 0, $cp);
$pdf->SetXY(55, 179);
$pdf->Cell(0, 0, $zona);
$pdf->SetFont('Arial', '', 7);
$pdf->SetXY(124, 179);
$pdf->Cell(0, 0, $rMunicipal);
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(175, 179);
$pdf->Cell(0, 0, $aforo);

$pdf->SetXY(108, 194);
$pdf->Cell(0, 0, $sTotal);
$pdf->SetXY(108, 204);
$pdf->Cell(0, 0, $sConstruida);
$pdf->SetXY(108, 214);
$pdf->Cell(0, 0, $sSnConstruir);
$pdf->SetXY(108, 224);
$pdf->Cell(0, 0, $cIncluidos . " Cajones");
$pdf->SetXY(108, 234);
$pdf->Cell(0, 0, $cAnexos . " Cajones");

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(170, 194);
$pdf->Cell(0, 0, $folio);
$pdf->Image($filename , 10, 240, 40 , 40,'PNG', '');

//Segunda página
$pdf->AddPage();
$pdf->Image('Formato2.jpg','0','0','210','297','JPG'); 
$pdf->SetFont('Arial','',10);

$pdf->SetXY(147, 168);
$pdf->Cell(0, 0, $dSolicitado);
$pdf->SetXY(167, 168);
$pdf->Cell(0, 0, $mSolicitado);
$pdf->SetXY(190, 168);
$pdf->Cell(0, 0, $aSolicitado);

$pdf->SetXY(162, 190);
$pdf->Cell(0, 0, $dExpedido);
$pdf->SetXY(18, 196);
$pdf->Cell(0, 0, $mExpedido);
$pdf->SetXY(47, 196);
$pdf->Cell(0, 0, $aExpedido);

$pdf->Output();
//$pdf->Output("I", "pdf/Cedula-$catastral.pdf");

//header('location: ./index.php?page=edit&id='. $id .'&success=true');
?>