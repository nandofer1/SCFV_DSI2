<?php $this->set('title_for_layout', 'Modificar herramienta'); ?>
<div class="users form">
    <fieldset>

    <legend><?php echo __('Modificar Herramienta'); ?></legend>
    

    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Tool',array('action'=>'edit')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'hidden'));
echo $this->Form->input('herramienta',  array('label'=>'Nombre de la Herramienta','style'=>'width: 300px ;','placeholder'=>'Solo texto','pattern'=>'^[A-Za-záéíóúÁÉÍÓÚñ\s]*$'));
echo $this->Form->input('existencia',  array('type'=>'number','label'=>'Existencias','style'=>'width: 100px ;','maxlength'=>'4'));
//echo $this->Form->label('Descripción');echo '<br>';
//echo $this->Form->textarea('descripcion',array('style'=>'width: 300px; height:200px;','pattern'=>'/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{1,}$/i','required'=>'true'));
	echo $this->Form->input('descripcion', array('label'=>'Descripcion: ', 'type' => 'textarea', 'style'=>'width: 300px; height:200px;','pattern'=>'/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{1,}$/i','required'=>'true'));
echo $this->Form->input('valor',array('type'=>'number','step'=>'0.2','label'=>'Valor $','type'=>'text','style'=>'width: 100px;','required'=>'true','placeholder'=>'$'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Herramienta');
echo '</div>';
?>
    </fieldset>
</div>
