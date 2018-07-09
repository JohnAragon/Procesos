<div class="row">
    <div class="col-12">
      <?php echo $this->Html->link('Agregar usuario', array(
                    'controller' => 'users',
                    'action' => 'add'),
                    array('class'=>'btn btn-success',
                      'type'=>'button',
                      'escape'=> false)
                  );
      ?>
    </div>
    <br>
    <br>
      <div class="col-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Creado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php  foreach ($users as $user):  ?>
          <tr>
            <!--Visualizar usuarios paginados  -->
            <td><?php echo $user['User']['username'];?></td>
              <td><?php echo $user['Roles']['nombre_rol'];?></td>
              <td><?php echo $user['User']['created'];?></td>
              <td>
                  <?php echo $this->Html->link('Ver', array(
                    'controller' => 'users',
                    'action' => 'view', $user['User']['id']),
                    array('class'=>'btn btn-primary btn-sm',
                    'type'=>'button',
                    'escape'=>false)
                  );?>
                  <?php echo $this->Html->link('Editar',array(
                    'controller' => 'users',
                    'action' => 'edit', $user['User']['id']),
                    array('class'=>'btn btn-success btn-sm',
                    'type'=>'button',
                    'escape'=>false)
                  );?>
                  <?php echo $this->Form->postLink('Borrar',array(
                    'controller' => 'users',
                    'action' => 'delete', $user['User']['id']),
                    array('class'=>'btn btn-danger btn-sm',
                      'type'=>'button',
                      'escape'=>false),
                      '¿Está seguro?. Borrará todos los registros del usuario'
                  );?>
              </td>
          </tr>
        <?php  endforeach; ?>
        </tbody>
      </table>
      <?php
              //***********************************************************pagination section*********************************************************************
              echo $this->Paginator->first("<< ", array('class' => 'btn btn-default btn-sm'));
              if($this->Paginator->hasPrev()) {
                echo $this->Paginator->prev(" < ", array('class' => 'btn btn-default btn-sm'));
              }
              echo $this->Paginator->numbers(array('modulus' => 5,'first' => 2, 'last' => 2 ,'separator' => '','class' => 'btn btn-default btn-sm'));
              if($this->Paginator->hasNext()) {
                echo $this->Paginator->next(" > ", array('class' => 'btn btn-default btn-sm'));
              }
              echo $this->Paginator->last(" >>", array('class' => 'btn btn-default btn-sm'));
      ?>
    </div>
</div>
