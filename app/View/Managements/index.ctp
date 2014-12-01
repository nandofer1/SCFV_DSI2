<h1 class="list-title">Gerencias</h1>
<div class="list-container">
    <table class="list">
        <tr>
            <th>Unidad a la que Pertenece</th>
            <th>Nombre de la Gerencia</th>
            <th colspan="2">Acciones</th>
        </tr>  
        <?php
        foreach ($Gerencias as $Gerencia):?>
        <tr>
            <td><?php echo $Gerencia['Unit']['unidad'];?></td>
            <td><?php echo $Gerencia['Management']['gerencia'];?></td>
            <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Gerencia['Management']['id']))    ?> </td>
            <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Gerencia['Management']['id']),
               array('confirm'=>'Realmente Desea Eliminar esta Gerencia?')
               ); ?></td>
           </tr>

       <?php endforeach;?>
   </table>
</div>
