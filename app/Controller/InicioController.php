<?php

App::uses('AppController', 'Controller');

class InicioController extends AppController {

  public $helpers = array("Html", "Form", "Js");

    //Verificar permisos de usuario
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    // Paginar procesos creados
    public function index() {

      	$this->layout='menu_layout';

    }


}
