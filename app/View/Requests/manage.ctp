<?php $this->set('title_for_layout', 'Gestión de solicitudes'); ?>
<div class="requests form">
<?php echo $this->Form->create('Request'); ?>
	<fieldset>
		<legend><?php echo __('Gestión de solicitud'); ?></legend>
	<?php
		echo $this->Form->input('id');
        echo $this->Form->input('fecha_solicitud', array(
            'label' => 'Fecha Solicitud: ',
            'placeholder'=>'aaaa-mm-dd',
            'type' => 'text',
            'error' => false,
            'id' => 'select_date',
            'required'=>'true',
            'disabled' => 'disabled'
        ));
        echo $this->Form->input('dossier_id', array(
            'label' => 'Expediente del vehículo: ',
            'type'    => 'select',
            'required'=>'true',
            'empty'   => ('Seleccione una opción'),
            'disabled' => 'disabled'
        ));
        echo $this->Form->input('telefono', array(
            'label' => 'Telefono: ',
            'placeholder'=>'Ej: ####-####',
            'disabled' => 'disabled'
        ));
		echo $this->Form->input('user_id', array(
            'label' => 'Usuario solicitante: ',
            'type'    => 'select',
            'required'=>'true',
            'empty'   => ('Seleccione una opción'),
            'disabled' => 'disabled'
        ));
		
		echo $this->Form->input('fecha_inicio', array(
            'label' => 'Desde el dia: ',
            'placeholder'=>'aaaa-mm-dd',
            'type' => 'text',
            'error' => false,
            'id' => 'select_date2',
            'required'=>'true',
            'disabled' => 'disabled'
        ));
		echo $this->Form->input('fecha_fin', array(
            'label' => 'Hasta el dia: ',
            'placeholder'=>'aaaa-mm-dd',
            'type' => 'text',
            'error' => false,
            'id' => 'select_date3',
            'required'=>'true',
            'disabled' => 'disabled'
        ));
		echo $this->Form->input('hora_inicio', array(
            'type' => 'text',
            'id' => 'hora_inicio',
            'disabled' => 'disabled'
        ));
		echo $this->Form->input('hora_fin', array(
            'type' => 'text',
            'id' => 'hora_fin',
            'disabled' => 'disabled'
        ));
		echo $this->Form->input('descripcion', array(
            'label' => 'Descripción: ',
            'placeholder'=>'Indique concretamente la misión a realizar',
            'type' => 'textarea',
            'size'=>250,
            'disabled' => 'disabled'
        ));
		echo $this->Form->input('aprobado', array(
            'label' => 'Aprobado',
            'type' => 'select',
            'empty' => 'Seleccionar opción',
            'options' => array(
                '1'=>'Aprobada', 
                '2'=>'Rechazada'
            )));
		echo '<div style="width: 30px;padding-left: -50px;margin: 0 auto;">';
        echo $this->Form->input('anulado', array(
            'label' => 'Anular',
        ));
        echo '</div>';
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