<div class="users form">
    <fieldset>

    <legend><?php echo __('Modificar Vehículo'); ?></legend>
    
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Vehicle',array('action'=>'edit')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'hidden','label'=>'Número de Placa','style'=>'width: 300px ;'));

echo $this->Form->input('modell_id', array(
    'label'=>'Modelo',
    'type'    => 'select',
    'options' => $Modelos,
    'empty'   => ('Seleccione una opcion'),
    'required'=>'true'
));
echo $this->Form->input('type_id', array(
    'label'=>'Tipo',
    'type'    => 'select',
    'options' => $Tipos,
    'empty'   => ('Seleccione una opcion'),
    'required'=>'true'
));

echo $this->Form->input('tarjeta_circulacion',array('label'=>'Tarjeta de Circulacion','style'=>'width: 300px;','required'=>'true','placeholder'=>'Placa+Año Ej:N33332013','pattern'=>'^N{1}\d{4}[1-2]{1}\d{3}$','maxlength'=>'9'));
echo $this->Form->input('fecha_tarjeta', array('label' => "Fecha de Tarjeta : ", 'type' => 'text', 
                                'error' => false , 'id' => 'select_date','required'=>'true'));
       echo  '<center>';
       
         echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker')); 
       echo '</center>';
echo $this->Form->input('anio',array('label'=>'Año','style'=>'width: 100px;','required'=>'true','placeholder'=>'Ej:2011 ,1999','pattern'=>'^([1-2]{1}[0-9]{3})$','maxlength'=>'4'));
echo $this->Form->input('color',array('label'=>'Color','style'=>'width: 300px; ','pattern'=>'^[a-zA-Záéíóúñ\s]*$','placeholder'=>'Solo texto','required'=>'true'));
echo $this->Form->input('motor',array('label'=>'Motor','style'=>'width: 300px; ','placeholder'=>'Alfanumérico , solo Mayúsculas','pattern'=>'^[A-Z0-9]*$','required'=>'true'));
echo $this->Form->input('chasisgrabado',array('label'=>'Chasis Grabado','style'=>'width: 300px;','placeholder'=>'Alfanumérico , solo Mayúsculas','pattern'=>'^[A-Z0-9]*$','required'=>'true'));
echo $this->Form->input('chasisvin',array('label'=>'Chasis vin?','style'=>'width: 300px;','placeholder'=>'Alfanumérico , solo Mayúsculas','required'=>'true','pattern'=>'^[A-Z0-9]*$'));
$TiposG=array('Diesel'=>'Diesel','Regular'=>'Regular','Super'=>'Super','Especial'=>'Especial');
echo $this->Form->input('tipo_gasolina', array(
    'label'=>'Tipo de Gasolina',
    'type'    => 'select',
    'options' => $TiposG,
    'empty'   => ('Seleccione una opcion'),
      'required'=>'true'
));
echo $this->Form->input('costo',array('type'=>'number','label'=>'Costo de Compra','style'=>'width: 100px;','required'=>'true','step'=>'0.2','placeholder'=>'Ej:4000.00'));
//echo $this->Form->label('Observaciones');
//echo $this->Form->textarea('observacion',array('style'=>'width: 300px; height:200px;'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Modificación de Vehículo');
echo '</div>';
?>
    </fieldset>
</div>