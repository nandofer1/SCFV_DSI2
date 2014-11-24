<?php
////////////////////////////////////// Get teacher data ////////////////////////////////////// 

$placa = $property['Dossier']['vehicle_id'];
$fecha_inicio = $property['Trip']['fecha_inicio'];
$fecha_fin=$property['Trip']['fecha_fin'];
$horai=$property['Trip']['hora_inicio'];
$hora_fin=$property['Trip']['hora_fin'];
$kmi=$property['Trip']['kilometraje_inicial'];
$kmf=$property['Trip']['kilometraje_final'];
$salida=$property['Trip']['comentario_salida'];
$entrada=$property['Trip']['comentario_entrada'];
$h=$Herramientas['Tool']['herramienta'];


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
</style>';

$html .= '<h2>Detalles de Viaje</h2>';
$html .= '<div class="viaje">';
$html .= '<div><strong>Placa de Vahículo</strong></div>';
$html .= '<div class="field_data">'.$placa . '</div>';
$html .= '<div><strong>Fecha de Inicio</strong></div>';
$html .= '<div class="field_data">'.$fecha_inicio . '</div>';
$html .= '<div><strong>Fecha de Regreso</strong></div>';
$html .= '<div class="field_data">'.$fecha_fin . '</div>';
$html .= '<div><strong>Hora de Inicio</strong></div>';
$html .= '<div class="field_data">'.$horai . '</div>';
$html .= '<div><strong>Hora de Regreso</strong></div>';
$html .= '<div class="field_data">'.$hora_fin . '</div>';
$html .= '<div><strong>Kilometraje inicial de la unidad</strong></div>';
$html .= '<div class="field_data">'.$kmi . '</div>';
$html .= '<div><strong>Kilometraje Final de la Unidad</strong></div>';
$html .= '<div class="field_data">'.$kmf. '</div>';
$html .= '<div><strong>Comentario de Salida</strong></div>';
$html .= '<div class="field_data">'.$salida . '</div>';
$html .= '<div><strong>Comentario de entrada</strong></div>';
$html .= '<div class="field_data">'.$entrada . '</div>';
$html .= '<div><strong>Herramientas Utilizadas</strong></div>';
$html .= '<div class="field_data">'.$h.'</div>';
$html .= '</div>';

//$html .= $courses;
////////////////////////////////////// end Get course data //////////////////////////////////////

////////////////////////////////////// CakePHP interaction ////////////////////////////////////// 
App::import('Vendor', 'tcpdf', array('file' => 'tcpdf'.DS.'tcpdf.php'));
App::uses('CakeTime', 'Utility');
// Ver mÃ¡s timezones en http://en.wikipedia.org/wiki/List_of_IANA_time_zones
$date = CakeTime::convert(time(), new DateTimeZone('America/Mexico_City'));

$tcpdf = new TCPDF();
$tcpdf->SetAuthor("Cove-Control Vehicular");
$tcpdf->SetTitle($property['Trip']['placa']);
$textfont = 'helvetica';
$tcpdf->SetAutoPageBreak( false );
$tcpdf->setHeaderFont(array($textfont,'',20));
$tcpdf->xheadercolor = array(150,0,0);
$tcpdf->xheadertext = 'Cove';
$tcpdf->xfootertext = 'Derechos reservados';

// add a page (required with recent versions of tcpdf)
$tcpdf->AddPage();

// Now you position and print your page content
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont, '', 10);
$tcpdf->writeHTML($html, true, false, true, false, '');
$filename = 'viaje'.$property['Trip']['id'].'_'.$date.'.pdf';
echo $tcpdf->Output($filename, 'D');
?>
