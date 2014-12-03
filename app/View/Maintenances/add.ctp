<div class="maintenances form">
<?php $this->set('title_for_layout', 'Agregar mantenimiento'); ?>
<?php echo $this->Form->create('Maintenance'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Mantenimiento'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array(
            'label' => 'Usuario solicitante: ',
            'type' => 'select',
            'empty'   => ('Seleccione una opción'),
        ));
		echo $this->Form->input('dossier_id', array(
            'label' => 'Expediente vehículo: ',
            'type' => 'select',
            'empty'   => ('Seleccione una opción'),
        ));
		echo $this->Form->input('maintenancetype_id', array(
            'label' => 'Tipo de mantenimiento: ',
            'empty'   => ('Seleccione una opción'),
        ));
		echo $this->Form->input('descripcion', array(
            'label' => 'Descripción: ',
            'placeholder'=>'Describir la razón del mantenimiento',
            'type' => 'textarea',
            'size'=>250,
        ));
		echo $this->Form->input('fecha_mantenimiento', array(
            'label' => 'Fecha mantenimiento: ',
            'type' => 'text',
            'placeholder'=>'aaaa/mm/dd',
        ));
		echo $this->Form->input('fecha_solicitud', array(
            'label' => 'Fecha solictud: ',
            'type' => 'text',
            'placeholder'=>'aaaa/mm/dd',
        ));

        echo '<div class="input">';
        echo $this->Form->end(__('Agregar'));
        echo '</div>';
        ?>
	</fieldset>
</div>