<?php echo $this->Html->css('jquery-ui-1.9.2.custom'); ?>
<?php echo $this->Html->script('jquery-1.11.1.min'); ?>
<?php echo $this->Html->script('jquery-ui-1.9.2.custom.min'); ?>
<div class="requests form">
<?php $this->set('title_for_layout', 'Solicitar vehículo'); ?>
<?php echo $this->Form->create('Request'); ?>
	<fieldset>
		<legend><?php echo __('Solicitar vehiculo'); ?></legend>
	<?php
        echo $this->Form->input('fecha_solicitud', array(
            'label' => 'Fecha Solicitud: ',
            'placeholder'=>'aaaa-mm-dd',
            'type' => 'text',
            'error' => false,
            'id' => 'select_date',
            'required'=>'true',
        ));
        echo  '<center>';
        //echo $this->Html->div('datepicker fl pl460p pa',$this->Html->image('datepicker_calendar_icon.png'),array('id' => 'datepicker_img'));
        echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker')); 
        echo '</center>'; 
		
        echo $this->Form->input('dossier_id', array(
            'label' => 'Expediente del vehículo: ',
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
        echo  '<center>';
        echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker2')); 
        echo '</center>';  
		echo $this->Form->input('fecha_fin', array(
            'label' => 'Hasta el dia: ',
            'placeholder'=>'aaaa-mm-dd',
            'type' => 'text',
            'error' => false,
            'id' => 'select_date3',
            'required'=>'true',
        ));
        echo  '<center>';
        echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker3')); 
        echo '</center>'; 
		echo $this->Form->input('hora_inicio');
		echo $this->Form->input('hora_fin');
		echo $this->Form->input('descripcion', array(
            'label' => 'Descripción: ',
            'placeholder'=>'Indique concretamente la misión a realizar',
            'type' => 'textarea',
            'size'=>250,
        ));
		//echo $this->Form->input('aprobado');
		//echo $this->Form->input('anulado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<script>
$(document).ready(function(){
    $("#select_date").click(function(){
    
         $("#datepicker").datepicker(
            {
               dateFormat: 'yy-mm-dd',
               onSelect: function(dateText, inst){
                $('#select_date').val(dateText);
                 $("#datepicker").datepicker("destroy");
               }
            }
        );
    });
    $("#select_date2").click(function(){
         $("#datepicker2").datepicker(
            {
               dateFormat: 'yy-mm-dd',
               onSelect: function(dateText, inst){
                $('#select_date2').val(dateText);
                 $("#datepicker2").datepicker("destroy");
               }
            }
        );
    });
    $("#select_date3").click(function(){
         $("#datepicker3").datepicker(
            {
               dateFormat: 'yy-mm-dd',
               onSelect: function(dateText, inst){
                $('#select_date3').val(dateText);
                 $("#datepicker3").datepicker("destroy");
               }
            }
        );
    });
});
    
</script>
