
<div class="users form">
    <fieldset>

    <legend><?php echo __('Modificar Tipo de Vehículo'); ?></legend>
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Type',array('action'=>'edit')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'hidden'));
echo $this->Form->input('tipo',  array('label'=>'Tipo','style'=>'width: 300px ;'));
echo $this->Form->label('Descripción');echo '<br>';
echo $this->Form->textarea('descripcion',array('style'=>'width: 300px; height:200px;'));
echo $this->Form->input('capacidad',array('label'=>'Capacidad','type'=>'text','style'=>'width: 100px;'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Tipo');
echo '</div>';
?>
    </fieldset>
</div>