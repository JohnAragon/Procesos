<!-- Vista de info del usuario -->
<div class="users form">
  <h3>Nombre: <?php echo $user['User']['username']?></h3>
  <h3>Tipo de Usuario: <?php echo $user['Roles']['nombre_rol']?></h3>
  <h3>Creado: <?php echo $user['User']['created']?></h3>
  <h3>Modificado: <?php echo $user['User']['modified']?></h3>
  <?php echo $this->Html->link('Volver', array('controller' => 'users', 'action' => 'index'));?>

</div>
