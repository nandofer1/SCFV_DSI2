<?php $this->set('title_for_layout', 'Agregar tipo de usuario'); ?>
<div class="users form">
<?php echo $this->Form->create('UserType'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Tipo de Usuario'); ?></legend>
        <?php 
        echo $this->Form->input('tipo_usuario', array('label' => 'Tipo de Usuario: '));
        echo '<div class="input">';
        echo $this->Form->end(__('Agregar'));
        echo '</div>';
    ?>
    </fieldset>

</div>