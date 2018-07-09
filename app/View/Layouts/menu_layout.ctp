<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <?php echo $this->Html->meta('icon');?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Procesos | Inicio</title>

  <!-- Bootstrap -->
  <?php echo $this->Html->css('/css/bootstrap.min');?>


</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="#">Procesos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <?php
                echo $this->Html->link(
                '<span class="class="sr-only""> </span> Inicio ',
                array('controller' => 'Inicio', 'action' => 'index'),
                array('class'=>'nav-link','escape'=>false)
              );
              ?>

            </li>
            <li class="nav-item ">
              <?php
                echo $this->Html->link(
                '<span class="class="sr-only""> </span> Usuarios ',
                array('controller' => 'Users', 'action' => 'index'),
                array('class'=>'nav-link','escape'=>false)
              );
              ?>

            </li>
            <li class="nav-item">
              <?php
                echo $this->Html->link(
                '<span class="class="sr-only""> </span> Procesos ',
                array('controller' => 'Procesos', 'action' => 'index'),
                array('class'=>'nav-link','escape'=>false)
              );
              ?>
            </li>

          </ul>

        </div>
      </nav>
  <?php echo $this->Flash->render(); ?>
  <div class="container">
    <div class="main container">

        <!-- page content -->
        <div>

          <?php echo $this->fetch('content'); ?>
        </div>
        <!-- /page container -->

      </div>
      <!-- /main container -->

  </div>
    <!-- /container body -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        Procesos - 2018 </a>
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- jQuery -->
    <?php echo $this->Html->script('/js/jquery-3.3.1.js');?>
    <!-- Bootstrap -->
    <?php echo $this->Html->script('/js/bootstrap.min');?>



</body>
</html>
