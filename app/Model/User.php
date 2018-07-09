<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
//hasheo de password
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

  //Tomar contraseña del usuario y encriptarla con BlowfishPasswordHasher
  public function beforeSave($options = array()) {
      if (isset($this->data[$this->alias]['password'])) {
          $passwordHasher = new BlowfishPasswordHasher();
          $this->data[$this->alias]['password'] = $passwordHasher->hash(
              $this->data[$this->alias]['password']
          );
      }
      return true;
  }

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'El nombre de usuario es requerido'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'La contraseña es obligatoria'
            )
        )
    );

  //Relación de roles
  public $belongsTo = array(
    'Roles' => array(
              'className' => 'Roles',
                'foreignKey' => 'id_rol'
          )
  );
}

?>
