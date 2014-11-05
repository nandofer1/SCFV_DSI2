
<div class="users form">
    <fieldset>

    <legend><?php echo __('Agregar Marca de Vehículo'); ?></legend>
       
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Brand'); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('marca',  array('label'=>'Marca','style'=>'width: 300px ; '));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Marca');
echo '</div>'
?>
    </fieldset>
</div>