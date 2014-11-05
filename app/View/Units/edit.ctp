
<div class="users form">
    <fieldset>

    <legend><?php echo __('Modificar Unidad de Alcaldía'); ?></legend>
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Unit',array('action'=>'edit')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'hidden'));
echo $this->Form->input('unidad',  array('label'=>'Nombre de la Unidad','style'=>'width: 300px ; height: '));
echo $this->Form->label('Descripción');echo '<br>';
echo $this->Form->textarea('descripcion',array('style'=>'width: 300px; height:200px;'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Unidad');
echo '</div>';
?>
    </fieldset>
</div>