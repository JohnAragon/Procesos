<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Usuario'); ?></legend>
        <?php echo $this->Form->input('username',array('label'=>'Usuario', 'class'=>'form-control'));
        echo $this->Form->input('password',array('label'=>'Contraseña', 'class'=>'form-control'));
        echo $this->Form->input('id_rol', (array('label'=>'Rol','options'=>$roles,'empty'=>'Seleccione el rol','required'=>'required', 'class'=>'form-control')));
    ?>
    </fieldset>

    <br>
    <?php echo $this->Form->button('Agregar Usuario', array('type'=>'submit', 'class'=>'btn btn-success'));
      echo $this->Html->link('Volver',  array(
                  'controller' => 'users',
                  'action' => 'index'),
                  array('type'=>'button',
                  'class'=>'btn btn-primary'));
     echo $this->Form->end();
    ?>
</div>
