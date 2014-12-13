<?php $this->set('title_for_layout', 'Edición de solicitudes'); ?>
<div class="requests form">
<?php echo $this->Form->create('Request'); ?>
	<fieldset>
		<legend><?php echo __('Actualizar solicitud'); ?></legend>
	<?php
		echo $this->Form->input('id');
        echo $this->Form->input('fecha_solicitud', array(
            'label' => 'Fecha Solicitud: ',
            'placeholder'=>'aaaa-mm-dd',
            'type' => 'text',
            'required' => 'true',
            'error' => false,
            'id' => 'select_date',
        ));
        echo $this->Form->input('dossier_id', array(
            'label' => 'Expediente del vehículo: ',
            'required' => 'true',
            'type'    => 'select',
        ));
        echo $this->Form->input('telefono', array(
            'label' => 'Telefono: ',
            'required' => 'true',
            'placeholder'=>'Ej: ####-####',
            'size'=> 9,
        ));
		echo $this->Form->input('user_id', array(
            'label' => 'Usuario solicitante: ',
            'required' => 'true',
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
            'type' => 'text',
            'required' => 'true',
            'id' => 'hora_inicio',
        ));
		echo $this->Form->input('hora_fin', array(
            'type' => 'text',
            'required' => 'true',
            'id' => 'hora_fin',
        ));
		echo $this->Form->input('descripcion', array(
            'label' => 'Descripción: ',
            'required' => 'true',
            'placeholder'=>'Indique concretamente la misión a realizar',
            'type' => 'textarea',
            'size'=>250,
        ));
		echo '<div class="input">';
        echo $this->Form->end(__('Guardar'));
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