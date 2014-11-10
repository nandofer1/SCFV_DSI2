
<div class="users form">
    <fieldset>

    <legend><?php echo __('Reportar Salida de Camión Recolector'); ?></legend>
   
    <?php
   
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Trip'); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('dossier_id', array(
    'label'=>'Placa de Vehículo',
    'type'    => 'select',
    'options' => $Expedientes,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('fecha_inicio',array('label'=>'Fecha de Salida','style'=>'width: 100px; height:30px;'));
//echo $this->Form->input('fecha_fin',array('label'=>'Fecha de Regreso','value'=>'0000-00-00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('hora_inicio',array('label'=>'Hora de Salida','style'=>'width: 100px; height:30px;'));
//echo $this->Form->input('hora_fin',array('label'=>'Hora de Regreso','value'=>'00:00:00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('kilometraje_inicial',array('label'=>'Kilometraje Inicial','style'=>'width: 100px; height:30px;'));
//echo $this->Form->input('kilometraje_final',array('label'=>'Kilometraje Final','value'=>'00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('fuera',array('type'=>'hidden','value'=>'1','style'=>'width: 100px; height:30px;'));

echo $this->Form->input('motorista', array(
    'label'=>'Motorista',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));
echo $this->Form->input('Dui1', array(
    'label'=>'Tripulante 1',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));



echo $this->Form->input('Dui2', array(
    'label'=>'Tripulante 2',
    'type'    => 'select',
    'options' =>$Empleados,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('Dui3', array(
    'label'=>'Tripulante 3',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('Dui4', array(
    'label'=>'Tripulante 4',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('Dui5', array(
    'label'=>'Tripulante 5',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));
echo $this->Form->label('Comentario de Salida');echo'<br>';
echo $this->Form->textarea('comentario_salida',array('style'=>'width: 300px; height:200px;'));

//echo $this->Form->label('Comentario de Entrada');
//echo $this->Form->textarea('comentario_entrada',array('value'=>'No Disponible','style'=>'width: 300px; height:200px;'));
echo '<div class="input"><br>';
echo $this->Form->end('Registrar Salida de Vehículo');
echo '</div>';
?>
   

</fieldset>
</div>