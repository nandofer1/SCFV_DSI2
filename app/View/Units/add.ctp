<?php $this->set('title_for_layout', 'Agregar Unidad de Alcaldía'); ?>
<div class="users form">
    <fieldset>
    <legend><?php echo __('Agregar Unidad de Alcaldía'); ?></legend>
    <?php
	 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
	echo $this->Form->create('Unit'); // se le pone el nombre del modelo para el que se quiere generar el formulario
	echo $this->Form->input('unidad',  array('label'=>'Nombre de la Unidad: ','style'=>'width: 300px ; height: '));
	echo $this->Form->input('descripcion', array('label'=>'Descripcion de la Unidad: ', 'type' => 'textarea', 'style'=>'width: 300px; height:200px;'));
	echo '<div class="input"><br>';
	echo $this->Form->end('Guardar Unidad');
	echo '</div>';
	?>
    </fieldset>
</div>
