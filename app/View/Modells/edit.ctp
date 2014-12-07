<div class="users form">
	<fieldset>
	<legend><?php echo __('Modificar Modelo de Vehículo'); ?></legend>
	<?php
		echo $this->Form->create('Modell',array('action'=>'edit')); // se le pone el nombre del modelo para el que se quiere generar el formulario
		echo $this->Form->input('id',  array('type'=>'hidden'));
		
		echo $this->Form->input('brand_id', array(
	    'label'=>'Marca: ',
  	  'type'    => 'select',
    	'options' => $Marcas,
    	'empty'   => ('Seleccione una opcion'),
    	'required'=>'true'
		));
		
		echo $this->Form->input('type_id', array(
	    'label'=>'Tipo: ',
  	  'type'    => 'select',
    	'options' => $Tipos,
    	'empty'   => ('Seleccione una opcion'),
    	'required'=>'true'
		));	

		echo $this->Form->input('tipo_combustible', array(
	    'label'=>'Combustible: ',
  	  'type'    => 'select',
    	'options' => array('Gasolina' => 'Gasolina', 'Diesel' => 'Diesel'),
    	'empty'   => ('Seleccione una opcion'),
    	'required'=>'true'
		));		

		echo $this->Form->input('modelo', array(
			'label'=>'Modelo',
			'style'=>'width: 300px ;',
			'placeholder'=>'',
			'pattern'=>'^[A-Za-z0-9 ]*$',
			'required'=>'true'));
				
		echo '<div class="input">';
		echo $this->Form->end('Guardar Modelo');
		echo '</div>';
	?>
 	</fieldset>
</div>
