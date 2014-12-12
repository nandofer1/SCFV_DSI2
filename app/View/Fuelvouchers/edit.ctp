<div class="fuelvouchers form">
<?php echo $this->Form->create('Fuelvoucher'); ?>
	<fieldset>
		<legend><?php echo __('Edit Fuelvoucher'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('monto');
		echo $this->Form->input('fecha', array(
            'label' => 'Fecha Vale: ',
            'placeholder'=>'año-mes-dia',
            'type' => 'text',
            'error' => false,
            'id' => 'fecha_vale',
            'required'=>'true',
        ));
		echo $this->Form->input('tipo_combustible');
		echo $this->Form->input('galones');
		echo $this->Form->input('aceite');
		echo $this->Form->input('factura');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<script>
$(document).ready(function(){
    $("#fecha_vale").Zebra_DatePicker({
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
});
</script>
