<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Cambiar Contraseña'); ?></legend>
        <?php 
        echo $this->Form->input('password', array('label' => 'Password: '));

        echo '<div class="input">';
        echo $this->Form->end(__('Cambiar'));
        echo '</div>';
    ?>
    </fieldset>

</div>
