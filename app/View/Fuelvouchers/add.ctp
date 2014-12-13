<?php $this->set('title_for_layout', 'Agregar vale de combustible'); ?>
<div class="fuelvouchers form">
<?php echo $this->Form->create('Fuelvoucher'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Vale de Combustible'); ?></legend>
	<?php
		echo $this->Form->input('monto',array('type'=>'number','step'=>'0.1','label'=>'Monto: $','style'=>'width: 100px;','required'=>'true','placeholder'=>'$'));
		echo $this->Form->input('fecha', array(
            'label' => 'Fecha Vale: ',
            'placeholder'=>'año-mes-dia',
            'type' => 'text',
            'error' => false,
            'id' => 'fecha_vale',
            'required'=>'true',
        ));
		echo $this->Form->input('tipo_combustible',array('required'=>'true'));
		echo $this->Form->input('galones',array('type'=>'number','label'=>'N° Galones: ','style'=>'width: 100px ; height: 2em;','maxlength'=>'4','required'=>'true'));
		echo $this->Form->input('aceite',array('type'=>'number','label'=>'Aceite: ','style'=>'width: 100px ; height: 2em;','maxlength'=>'4','required'=>'true'));
		echo $this->Form->input('factura',array('type'=>'number','label'=>'N° de Factua: ','style'=>'width: 100px ; height: 2em;','required'=>'true'));
                echo $this->Form->input('gastado',array('type'=>'hidden','value'=>0));
	?>
	
  
<?php
  echo '<div class="input"><br>';
echo $this->Form->end('Guardar'); 
echo '</div>';
?>
                </fieldset>
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
