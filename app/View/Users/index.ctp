<div>

  <?php echo $this->Html->link('Agregar usuario', array('controller' => 'users', 'action' => 'add'));?>

      <table>
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
              <td><?php echo $user['User']['role'];?></td>
              <td><?php echo $user['User']['created'];?></td>
              <td>
                  <?php echo $this->Html->link('Ver', array('controller' => 'users', 'action' => 'view', $user['User']['id']));?>
                  <?php echo $this->Html->link('Editar',array('controller' => 'users', 'action' => 'edit', $user['User']['id']));?>
                  <?php echo $this->Form->postLink('Borrar',array('controller' => 'users', 'action' => 'delete', $user['User']['id']),
                    array('escape' => false),
                    '¿Está seguro?. Borrará todos los registros del usuario'
                  );?>
              </td>
          </tr>
        <?php  endforeach; ?>
        </tbody>
      </table>


</div>
