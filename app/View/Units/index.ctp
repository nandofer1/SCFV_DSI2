<h1 class="list-title">Unidades de Alcaldía</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td>Nombre de Unidad</td>
        <td>Descripción</td>
        <td colspan="2">Acciones</td>
    </tr>  
    <?php
    foreach ($Unidad as $Unidades):?>
        <tr>
            <td><?php echo $Unidades['Unit']['unidad'];?></td>
            <td><?php echo $Unidades['Unit']['descripcion'];?></td>
            <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Unidades['Unit']['id']))    ?> </td>
            <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Unidades['Unit']['id']),
                     array('confirm'=>'Realmente Desea Eliminar esta Unidad?')
                     ); ?></td>
        </tr>
    <?php endforeach;?>
</table>
</div>
