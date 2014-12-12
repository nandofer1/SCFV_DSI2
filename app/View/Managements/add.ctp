<?php $this->set('title_for_layout', 'Agregar Gerencia'); ?>
<div class="users form">
    <fieldset>

    <legend><?php echo __('Agregar Gerencia'); ?></legend>
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Management'); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('unit_id', array(
    'label'=>'Unidad a la que Pertenece',
    'type'    => 'select',
    'options' => $Unidades,
    'empty'   => ('Seleccione una opcion'),
    'required'=>'true'
));
echo $this->Form->input('gerencia',array('label'=>'Nombre de la Gerencia','style'=>'width: 300px;','required'=>'true','pattern'=>'^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$','placeholder'=>'Solo texto'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Gerencia');
echo '</div>';
?>
    </fieldset>
</div>