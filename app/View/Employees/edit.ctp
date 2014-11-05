
<div class="users form">
    <fieldset>

    <legend><?php echo __('Modificar Empleado'); ?></legend>
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Employee',  array('action'=>'edit')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'text','label'=>'Nº De DUI','style'=>'width: 300px ; '));
echo $this->Form->input('departament_id', array(
    'label'=>'Departamento al que pertenece',
    'type'    => 'select',
    'options' => $Departamentos,
    'empty'   => ('Seleccione una opcion')
));
echo $this->Form->input('nombre',array('label'=>'Nombre Completo','style'=>'width: 300px;'));
echo $this->Form->input('apellidos',array('label'=>'Apellidos','style'=>'width: 300px; '));
echo $this->Form->label('Dirección');echo '<br>';
echo $this->Form->textarea('direccion',array('style'=>'width: 300px; height:200px;'));
echo $this->Form->input('correo',array('label'=>'Correo Electrónico','style'=>'width: 300px; '));
echo $this->Form->input('telefono',array('label'=>'Teléfono','style'=>'width: 300px; '));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Empleado');
echo '</div>';
?>
    </fieldset>
</div>