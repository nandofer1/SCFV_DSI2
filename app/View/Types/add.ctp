<div class="users form">
  <fieldset>
	  <legend><?php echo __('Agregar Tipo de Vehículo'); ?></legend>
	   <?php
		//UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
		echo $this->Form->create('Type'); // se le pone el nombre del modelo para el que se quiere generar el formulario
		echo $this->Form->input('tipo',  array('label'=>'Tipo: ','style'=>'width: 300px ; ','pattern'=>'^[a-zA-Záéíóúñ ]*$','placeholder'=>'','required'=>'true'));
		echo $this->Form->input('descripcion', array('label'=>'Descripcion: ', 'type' => 'textarea', 'style'=>'width: 300px; height:200px;', 'pattern'=>'/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{1,}$/i'));
		echo $this->Form->input('capacidad',array('label'=>'Capacidad: ','type'=>'text','style'=>'width: 300px;','required'=>'true'));
		echo '<div class="input"><br>';
		echo $this->Form->end('Guardar Tipo');
		echo '</div>';
		?>
  </fieldset>
</div>
