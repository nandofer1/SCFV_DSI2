<?php //echo $this->Html->css('jquery-ui-1.9.2.custom'); ?>
<?php //echo $this->Html->script('jquery-ui-1.9.2.custom.min'); ?>
<div class="requests form">
<?php $this->set('title_for_layout', 'Solicitar vehículo'); ?>
<?php echo $this->Form->create('Request'); ?>
	<fieldset>
		<legend><?php echo __('Solicitar vehículo'); ?></legend>
	<?php
        echo $this->Form->input('fecha_solicitud', array(
            'label' => 'Fecha Solicitud: ',
            'placeholder'=>'aaaa-mm-dd',
            'type' => 'text',
            'error' => false,
            'id' => 'select_date',
            'required'=>'true',
        ));
        echo $this->Form->input('dossier_id', array(
            'label' => 'Placa del vehículo: ',
            'type'    => 'select',
            'empty'   => ('Seleccione una opción'),
        ));
        echo $this->Form->input('employee_id', array(
            'label' => 'Nombre del solicitante: ',
            'type'    => 'select',
            'empty'   => ('Seleccione una opción'),
        ));
        echo $this->Form->input('employee_id', array(
            'label' => 'Conductor: ',
            'type'    => 'select',
            'empty'   => ('Opcional'),
        ));
        echo $this->Form->input('unit_id', array(
            'label' => 'Unidad: ',
            'type'    => 'select',
            'empty'   => ('Seleccione una opción'),
        ));
        echo $this->Form->input('telefono', array(
            'label' => 'Telefono: ',
            'placeholder'=>'Ej: ####-####',
        ));
		echo $this->Form->input('user_id', array(
            'label' => 'Usuario solicitante: ',
            'type'    => 'select',
            'empty'   => ('Seleccione una opción'),
        ));
		
		echo $this->Form->input('fecha_inicio', array(
            'label' => 'Desde el dia: ',
            'placeholder'=>'aaaa-mm-dd',
            'type' => 'text',
            'error' => false,
            'id' => 'select_date2',
            'required'=>'true',
        )); 
		echo $this->Form->input('fecha_fin', array(
            'label' => 'Hasta el dia: ',
            'placeholder'=>'aaaa-mm-dd',
            'type' => 'text',
            'error' => false,
            'id' => 'select_date3',
            'required'=>'true',
        ));
		echo $this->Form->input('hora_inicio', array(
            'label' => 'Desde las: ',
            'type' => 'text',
            'id' => 'hora_inicio',
        ));
		echo $this->Form->input('hora_fin', array(
            'label' => 'Hasta las: ',
            'type' => 'text',
            'id' => 'hora_fin',
        ));
		echo $this->Form->input('descripcion', array(
            'label' => 'Descripción: ',
            'placeholder'=>'Indique concretamente la misión a realizar',
            'type' => 'textarea',
            'size'=>250,
        ));
		//echo $this->Form->input('aprobado');
		//echo $this->Form->input('anulado');
        echo '<div class="input">';
        echo $this->Form->end(__('Enviar solicitud'));
        echo '</div>';
        ?>
	</fieldset>

</div>

<script>
$(document).ready(function(){
    $('#select_date').Zebra_DatePicker({
        format: 'Y-m-d',
        direction: true,
        pair: $('#select_date2'),
        disabled_dates: ['* * * 0'],
        inside: false,
        show_select_today: 'Hoy',
        lang_clear_date: 'Limpiar fecha',
        days:['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
        months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
                'Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#select_date2").Zebra_DatePicker({
        format: 'Y-m-d',
        direction: true,
        pair: $('#select_date3'),
        disabled_dates: ['* * * 0'],
        inside: false,
        show_select_today: 'Hoy',
        lang_clear_date: 'Limpiar fecha',
        days:['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
        months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
                'Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#select_date3").Zebra_DatePicker({
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
    $("#hora_inicio").timePicker({
        startTime: "08:00",
        endTime: "17:00",
        show24Hours: false,
        separator: ':',
    });
    $("#hora_fin").timePicker({
        startTime: "08:00",
        endTime: "17:00",
        show24Hours: false,
        separator: ':',
    });
});
    
</script>
