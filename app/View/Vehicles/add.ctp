<div class="users form">
    <fieldset>

    <legend><?php echo __('Agregar Vehiculo'); ?></legend>
       
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Vehicle'); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'text','label'=>'Número de Placa','style'=>'width: 300px ;'));
echo $this->Form->input('modell_id', array(
    'label'=>'Modelo',
    'type'    => 'select',
    'options' => $Modelos,
    'empty'   => ('Seleccione una opcion')
));
echo $this->Form->input('type_id', array(
    'label'=>'Tipo',
    'type'    => 'select',
    'options' => $Tipos,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('tarjeta_circulacion',array('label'=>'Tarjeta de Circulacion','style'=>'width: 300px; '));
echo $this->Form->input('fecha_tarjeta',array('label'=>'Fecha de Tarjeta','style'=>'width: 300px;'));
echo $this->Form->input('anio',array('label'=>'Año','style'=>'width: 100px;'));
echo $this->Form->input('color',array('label'=>'Color','style'=>'width: 300px; '));
echo $this->Form->input('motor',array('label'=>'Motor','style'=>'width: 300px; '));
echo $this->Form->input('chasisgrabado',array('label'=>'Chasis Grabado','style'=>'width: 300px;'));
echo $this->Form->input('chasisvin',array('label'=>'Chasis vin?','style'=>'width: 300px;'));
$TiposG=array('Diesel'=>'Diesel','Regular'=>'Regular','Super'=>'Super','Especial'=>'Especial');
echo $this->Form->input('tipo_gasolina', array(
    'label'=>'Tipo de Gasolina',
    'type'    => 'select',
    'options' => $TiposG,
    'empty'   => ('Seleccione una opcion')
));
echo $this->Form->input('costo',array('type'=>'text','label'=>'Costo de Compra','style'=>'width: 100px;'));
echo $this->Form->label('Observaciones'); echo'<br>';
echo $this->Form->textarea('observacion',array('style'=>'width: 300px; height:200px;'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Vehículo');
echo '</div>';
?>

    </fieldset>
    </div>