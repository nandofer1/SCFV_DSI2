<?php $this->set('title_for_layout', 'Voucher'); ?>
<div class="form">.
<h1 class="list-title">Vale de Gasolina</h1>
<div class="list-container">
  <table class="list">
      
       <tr><td>Id: </td><td><?php echo $fuelvoucher['Fuelvoucher']['id'];?></td></tr>
      <tr><td>Monto: </td><td><?php echo '$'.$fuelvoucher['Fuelvoucher']['monto'];?></td></tr>
      <tr><td>Fecha : </td><td><?php echo $fuelvoucher['Fuelvoucher']['fecha']; ?></td></tr>
      <tr><td>Tipo Combustible: </td><td><?php echo $fuelvoucher['Fuelvoucher']['tipo_combustible'];?></td></tr>
      <tr><td>Galones </td><td><?php echo $fuelvoucher['Fuelvoucher']['galones'];?></td></tr>
        <tr><td>Aceito </td><td><?php echo $fuelvoucher['Fuelvoucher']['aceite'];?></td></tr>
          <tr><td>N° Factura </td><td><?php echo $fuelvoucher['Fuelvoucher']['factura'];?></td></tr>
            <tr><td>Galones </td><td><?php if ($fuelvoucher['Fuelvoucher']['galones']==0): 
                echo 'Sin Usar en vehiculo';
            else:
                
                echo '<b>Utilizado</b>';
            endif;
?></td></tr>
	
</div>

</table>
</div>
</div>
	