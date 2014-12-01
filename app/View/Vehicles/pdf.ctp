<?php
//////////////////////////////////////////////////////////////////////////// 


$tbl = 
'<table cellspacing="0" cellpadding="1" cellspacing="1" border="0.5">
    <tr><td width="10px">Nº</td>
        <td width="40px"><b>Placa</b></td>
      <td><b>Tipo</b></td>
      <td width="60px"><b>Tarjeta de Circulación</b></td>
       <td width="60px"><b>Fecha de Tarjeta</b></td>
       <td width="30px"><b>Año</b></td>
       <td><b>Color</b></td>
       <td width="80px"><b>Motor</b></td>
       <td><b>Tipo de Gasolina</b></td>
       <td><b>Costo</b></td>
    </tr>';
  $i=1;     
 foreach($Vehiculos as $ks => $Vehiculo):
	//$herramientas.=  '<div class="herramienta">';
        $tbl.='<tr><td width="10px">'.$i.'</td>';
       
	$tbl.='<td width="40px">'.$Vehiculo['Vehicle']['id'].'</td>';
        
       // $tbl.='<td>'.$Vehiculo['Modell']['modelo'].'</td>';
         
       $tbl.='<td>'.$Vehiculo['Type']['tipo'].'</td>';
        
        $tbl.='<td>'.$Vehiculo['Vehicle']['tarjeta_circulacion'].'</td>';
        
        $tbl.='<td width="60px">'.$Vehiculo['Vehicle']['fecha_tarjeta'].'</td>';
        
        $tbl.='<td width="30px">'.$Vehiculo['Vehicle']['anio'].'</td>';
        
        $tbl.='<td>'.$Vehiculo['Vehicle']['color'].'</td>';
        
        $tbl.='<td>'.$Vehiculo['Vehicle']['motor'].'</td>';
        
        $tbl.='<td>'.$Vehiculo['Vehicle']['tipo_gasolina'].'</td>';
       $tbl.='<td>$'.$Vehiculo['Vehicle']['costo'].'</td></tr>';


$i=$i+1;
endforeach; 
$tbl.='</table>';
//$tbl.='<img src="C:\wamp\www\app\webroot\img\logo_alcaldia.png">';

     
$html = '<style>
h2{
    color: #F09A2E;
    font-weight: bold;
    padding: 10px 0;
}
.field_data{
      background-color: #F4F4F4;
    	border: 1px solid #AAAAAA;
	   padding-top: 10px;
		padding-bottom: 10px;
		padding-left: 10px;
		height: 20px;
                margin-left: 10px;
    }
    .tabla{
    width: 100%;
   border: 1px solid #000;

     }
</style>';


////////////////////////////////////// end Get course data //////////////////////////////////////

////////////////////////////////////// CakePHP interaction ////////////////////////////////////// 
App::import('Vendor', 'tcpdf', array('file' => 'tcpdf'.DS.'tcpdf.php'));
App::uses('CakeTime', 'Utility');
// Ver mÃ¡s timezones en http://en.wikipedia.org/wiki/List_of_IANA_time_zones
$date = CakeTime::convert(time(), new DateTimeZone('America/El_Salvador'));

$tcpdf = new TCPDF();
$tcpdf->SetAuthor("Cove-Control Vehicular");
$tcpdf->SetTitle('Listado de Vehiculos_'.$date);

$textfont = 'helvetica';
$tcpdf->SetAutoPageBreak( false );
$tcpdf->SetHeaderData('logo_alcaldia.png', 30,' Listado de Vehículos', 'Alcaldia Municipal de Ciudad Delgado');
//$tcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 004', PDF_HEADER_STRING);
// set header and footer fonts
$tcpdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$tcpdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$tcpdf->setHeaderFont(array($textfont,'',12));
$tcpdf->xheadercolor = array(150,0,0);
$tcpdf->xheadertext = 'Cove';
$tcpdf->xfootertext = 'Derechos reservados';

// add a page (required with recent versions of tcpdf)
$tcpdf->AddPage();

// Now you position and print your page content
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont, '', 10);

$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->writeHTML($tbl, true, false, true, false, '');

$filename = 'Listado de Vehiculos_'.$date.'.pdf';
echo $tcpdf->Output($filename, 'D');
?>
