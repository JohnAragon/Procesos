<?php

App::uses('AppController', 'Controller');

class ProcesosController extends AppController {

  public $helpers = array("Html", "Form", "Js");

    //Verificar permisos de usuario
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','edit','login','logout');
    }

    // Paginar procesos creados
    public function index() {

        $this->Proceso->recursive = 0;
        $this->paginate = array(
        'limit' => 10, // elementos por pagina
        //'conditions' => $condiciones, // arreglo con del filtro de url, si esta vacio esta hace un find all
        'order' => array('Proceso.created' => 'desc')//orden
    );
        $this->set('procesos', $this->paginate());
    }

    // Ver info proceso
    public function view($id = null) {
        $this->Proceso->id = $id;
        if (!$this->Proceso->exists()) {
            throw new NotFoundException(__('Proceso no encontrado'));
        }
        //Trae los datos del proceso
        $this->set('proceso', $this->Proceso->findById($id));
    }

    //Creación del procesos
    public function add() {
        //incluir tabla de sedes
          Controller::loadModel('Sede');
         $this->set('sedes',  $this->Sede->find('list',array('fields' => array('Sede.nombre_sede'))));
        //Tomar los datos enviados por el formulario
        if ($this->request->is('post')) {
            //crear el proceso y incluirlo en la bd
            $this->Proceso->create();
            $this->Proceso->set('id_usuario_creacion',$this->Auth->user('id'));
            if ($this->Proceso->save($this->request->data)) {
                $this->Session->setFlash(__('El proceso ha sido guardado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El proceso no ha sido guardado.Intente nuevamente')
            );
        }

    }

    //Editar el proceso
    public function edit($id = null) {
      //incluir tabla de sedes
        Controller::loadModel('Sede');
       $this->set('sedes',  $this->Sede->find('list',array('fields' => array('Sede.nombre_sede'))));
        //Verificar el id del proceso
        $this->Proceso->id = $id;
        if (!$this->Proceso->exists()) {
            throw new NotFoundException(__('Proceso no encontrado'));
        }
        //Tomar los datos enviados por el formulario
        if ($this->request->is('post') || $this->request->is('put')) {
          //alamcenarlo en la bd
            if ($this->Proceso->save($this->request->data)) {
                $this->Session->setFlash(__('Los datos del proceso han sido modificados'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('Los datos del proceso pudierson ser modificados.')
            );
        } else {
            //Traer los datos del id del proceso
            $this->request->data = $this->Proceso->findById($id);

        }
    }

    //Borrar procesos
    public function delete($id = null) {
        //Solo permitir método post
        $this->request->allowMethod('post');

        $this->Proceso->id = $id;
        if (!$this->Proceso->exists()) {
            throw new NotFoundException(__('Proceso no encontrado'));
        }
        if ($this->Proceso->delete()) {
            $this->Session->setFlash(__('El proceso ha sido eliminado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El proceso no ha sido eliminado'));
        return $this->redirect(array('action' => 'index'));
    }

}
