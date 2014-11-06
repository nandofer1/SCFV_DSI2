
<div class="users form">
    <fieldset>

    <legend><?php echo __('Modificar Viaje de Camión Recolector'); 
 //print_r($this->request->data['Trip']['id']) ;
    ?></legend>
   
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Trip',array('action'=>'mod')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'hidden','style'=>'width: 300px ;'));
echo $this->Form->input('dossier_id', array(
    'label'=>'Placa de Vehículo',
    'type'    => 'select',
    'options' => $Expedientes,
    'empty'   => ('Seleccione una opcion')
));
if($this->request->data['Trip']['fuera']==1):
    echo $this->Form->input('fecha_inicio',array('label'=>'Fecha de Inicio','style'=>'width: 100px; height:30px;'));
    echo $this->Form->input('hora_inicio',array('style'=>'width: 100px; height:30px;'));
    echo $this->Form->input('kilometraje_inicial',array('style'=>'width: 100px; height:30px;'));
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
    'type'=>'hidden',
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
echo $this->Form->label('Comentario de Salida');echo '<br>';
echo $this->Form->textarea('comentario_salida',array('style'=>'width: 300px; height:200px;'));
echo '<br>';

else:
echo $this->Form->input('fecha_inicio',array('label'=>'Fecha de Inicio','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('fecha_fin',array('label'=>'Fecha de Regreso','value'=>'0000-00-00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('hora_inicio',array('style'=>'width: 100px; height:30px;'));
echo $this->Form->input('hora_fin',array('label'=>'Hora de Regreso','value'=>'00:00:00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('kilometraje_inicial',array('style'=>'width: 100px; height:30px;'));
echo $this->Form->input('kilometraje_final',array('label'=>'Kilometraje Final','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('fuera',array('type'=>'hidden','style'=>'width: 100px; height:30px;'));

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
    'type'=>'hidden',
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
echo $this->Form->label('Comentario de Salida');echo '<br>';
echo $this->Form->textarea('comentario_salida',array('style'=>'width: 300px; height:200px;'));
echo '<br>';
echo '<br>';
echo $this->Form->label('Comentario de Entrada');echo '<br>';
echo $this->Form->textarea('comentario_entrada',array('style'=>'width: 300px; height:200px;'));
endif;
echo '<div class="input"><br>';
echo $this->Form->end('Modificar Datos de Viaje');
echo '</div>';
?>
     
</fieldset>
</div>