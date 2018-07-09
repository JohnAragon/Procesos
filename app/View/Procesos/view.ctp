<!-- Vista de info del usuario -->
<div class="users form">
  <h3>Numero del proceso: <?php echo $proceso['Proceso']['numero_proceso']?></h3>

  <h1>Creado: <?php echo $proceso['Proceso']['created']?></h1>
  <h1>Modificado: <?php echo $proceso['Proceso']['modified']?></h1>
  <h1>Creado por: <?php echo $proceso['User']['username']?></h1>
  <h1>Descripcion:</h1>
    <br>
    <p> <?php echo $proceso['Proceso']['descripcion']?></p>
  <?php echo $this->Html->link('Volver', array('controller' => 'users', 'action' => 'index'));?>

</div>
