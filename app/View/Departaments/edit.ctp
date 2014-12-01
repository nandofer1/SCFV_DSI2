<div class="users form">
    <fieldset>

    <legend><?php echo __('Agregar Departamento'); ?></legend>


    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
    
echo $this->Form->create('Departament',array('action'=>'edit'));
echo $this->Form->input('id',array('type'=>'hidden'));// se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('management_id', array(
    'label'=>'Gerencia a la que pertenece',
    'type'    => 'select',
    'options' => $Gerencias,
    'empty'   => ('Seleccione una opcion'),
    'required'=>'true'
));

echo $this->Form->input('departamento',array('label'=>'Nombre del Departamemento','style'=>'width: 300px;','required'=>'true','pattern'=>'^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$','placeholder'=>'Solo texto'));
echo $this->Form->input('descripcion', array('label'=>'Descripcion de la Unidad: ', 'type' => 'textarea', 'style'=>'width: 300px; height:200px;'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Departamento');
echo '</div>';
?>
    </fieldset>
</div>
