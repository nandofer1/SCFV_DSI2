<?php $this->set('title_for_layout', 'Editar mantenimiento'); ?>
<div class="maintenances form">
<?php echo $this->Form->create('Maintenance', array('action'=>'edit')); ?>
	<fieldset>
		<legend><?php echo __('Editar datos mantenimiento'); ?></legend>
	<?php
        echo $this->Form->input('id');
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
            'type' => 'fecha_mantenimiento',
        ));
		echo $this->Form->input('fecha_solicitud', array(
            'label' => 'Fecha solictud: ',
            'type' => 'text',
            'placeholder'=>'aaaa/mm/dd',
            'type' => 'fecha_solicitud',
        ));

        echo '<div class="input">';
        echo $this->Form->end(__('Editar'));
        echo '</div>';
        ?>
	</fieldset>
</div>

<script>
$(document).ready(function(){
    $("#fecha_mantenimiento").Zebra_DatePicker({
        format: 'Y-m-d',
        direction: true,
        disabled_dates: ['* * * 0'],
        inside: false,
        show_select_today: 'Hoy',
        lang_clear_date: 'Limpiar fecha',
        days:['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
        months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
                'Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#fecha_solicitud").Zebra_DatePicker({
        format: 'Y-m-d',
        direction: true,
        pair: $('#fecha_mantenimiento'),
        disabled_dates: ['* * * 0'],
        inside: false,
        show_select_today: 'Hoy',
        lang_clear_date: 'Limpiar fecha',
        days:['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
        months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
                'Septiembre','Octubre','Noviembre','Diciembre']
    });
});
</script>