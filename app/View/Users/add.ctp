<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Usuario'); ?></legend>
        <?php echo $this->Form->input('username',array('label'=>'Usuario'));
        echo $this->Form->input('password',array('label'=>'Contraseña'));
        echo $this->Form->input('id_rol', (array('label'=>'Rol','options'=>$roles,'empty'=>'Seleccione el rol','required'=>'required')));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Agregar')); ?>
</div>
