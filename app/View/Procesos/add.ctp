<div class="proceso form">
<?php echo $this->Form->create('Proceso'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Proceso'); ?></legend>
        <?php echo $this->Form->input('numero_proceso',array(
          'label'=>'Numero de Proceso',
          'maxlength'=>8,
          'required'=>'required',
          'placeholder'=>'Ingrese el número de proceso'));
        echo $this->Form->input('created',array(
          'label'=>'Fecha de creación',
          'type'=>'date',
          'autocomplete'=>'true',
          'disabled'=>'true'));
        echo $this->Form->input('descripcion',array(
          'label'=>'Description',
          'type'=>'textarea',
          'maxlength'=>200,
          'required'=>'required',
          'placeholder'=>'Agregue la descripción del proceso(Max. 200 Caracteres)'));
        echo $this->Form->input('id_sede', (array(
          'label'=>'Sede',
          'options'=>$sedes,
          'empty'=>'Seleccione la sede',
          'required'=>'required')));
        echo $this->Form->input('presupuesto', (array(
          'label'=>'Presupuesto COP $',
          'type'=>'number','min'=>1,
          'required'=>'required',
          'placeholder'=>'Agregue la cantidad presupuestada')));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Agregar')); ?>
</div>
