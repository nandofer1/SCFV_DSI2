<div class="users form">
    <fieldset>

    <legend><?php echo __('Modificar Herramienta'); ?></legend>
    

    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Tool',array('action'=>'edit')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'hidden'));
echo $this->Form->input('herramienta',  array('label'=>'Nombre de la Herramienta','style'=>'width: 300px ; '));
echo $this->Form->input('existencia',  array('type'=>'text','label'=>'Existencias','style'=>'width: 100px ; '));
echo $this->Form->label('Descripción');echo '<br>';
echo $this->Form->textarea('descripcion',array('style'=>'width: 300px; height:200px;'));
echo $this->Form->input('valor',array('label'=>'Valor $','type'=>'text','style'=>'width: 100px;'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Herramienta');
echo '</div>';
?>
    </fieldset>
</div>