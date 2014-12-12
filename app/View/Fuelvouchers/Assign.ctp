<div class="users form">
    <?php $this->set('title_for_layout', 'Combustible'); ?>
	<fieldset>
	<legend><?php echo __('Usar Vale de Combustible en Vehículo'); ?></legend>
	<?php
        
 		//UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
		echo $this->Form->create('Voucher'); // se le pone el nombre del modelo para el que se quiere generar el formulario
		echo $this->Form->input('dossier_id', array(
    'label'=>'Placa de Vehículo',
    'type'    => 'select',
    'options' => $Expedientes,
    'empty'   => ('Seleccione una opcion'),
    'required'=>'true'
));
                echo $this->Form->input('fuelvoucher_id',array('type'=>'hidden','value'=>$id));
		echo '<div class="input"><br>';
		echo $this->Form->end('Asignar');
		echo '</div>'
	?>
  </fieldset>
</div>





