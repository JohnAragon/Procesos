  <div>

  <?php echo $this->Html->link('Agregar proceso', array('controller' => 'procesos', 'action' => 'add'));?>

      <table>
        <thead>
          <tr>
            <th>Numero de proceso</th>
            <th>Sede</th>
            <th>Presupuesto</th>
            <th>Creado por</th>
            <th>Fecha de creación</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php  foreach ($procesos as $proceso):  ?>
          <tr>
            <!--Visualizar los procesos creados  -->
            <td><?php echo $proceso['Proceso']['numero_proceso'];?></td>
              <td><?php echo $proceso['Sede']['nombre_sede'];?></td>
              <td><?php echo "COP $ ".number_format($proceso['Proceso']['presupuesto'],3,',','.');?></td>
              <td><?php echo $proceso['User']['username'];?></td>
              <td><?php echo $proceso['Proceso']['created'];?></td>
              <td>
                  <?php echo $this->Html->link('Ver', array('controller' => 'procesos', 'action' => 'view', $proceso['Proceso']['id']));?>
                  <?php echo $this->Html->link('Editar',array('controller' => 'procesos', 'action' => 'edit', $proceso['Proceso']['id']));?>
                  <?php echo $this->Form->postLink('Borrar',array('controller' => 'procesos', 'action' => 'delete', $proceso['Proceso']['id']),
                    array('escape' => false),
                    '¿Está seguro de borrar este proceso?.'
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
