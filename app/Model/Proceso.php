<?php
// app/Model/User.php
App::uses('AppModel', 'Model');

class Proceso extends AppModel {
  //Permitir un único numero de proceso
  public $validate = array(
      'numero_proceso' => array(
          'required' => array(
              'rule' => 'isUnique',
              'message' => 'Este número de proceso ya existe en la base de datos'
          )
      )
    );

    public $belongsTo = array(
      'Sede' => array(
                'className' => 'Sede',
                  'foreignKey' => 'id_sede'
            ),

      'User' => array(
                'className' => 'User',
                 'foreignKey' => 'id_usuario_creacion'
            ),
    );
}
?>
