<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

  public $helpers = array("Html", "Form", "Js");

    //Verificar permisos de usuario
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','edit','login','logout');
        $this->Auth->authError = "Por favor inicie sesión.";
    }
    //logiin de usuarios
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Usuario o contraseña invalido, intente nuevamente.'));
        }
    }

    //Cierre de sesión
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    // Paginar usuarios creados
    public function index() {
        $this->layout='menu_layout';
        $this->User->recursive = 0;
        $this->paginate = array(
          'limit' => 10, // elementos por pagina
          //'conditions' => $condiciones, // arreglo con del filtro de url, si esta vacio esta hace un find all
          'order' => array('User.created' => 'desc')
        );
        $this->set('users', $this->paginate());
    }

    // Ver info usuario
    public function view($id = null) {
        $this->layout='menu_layout';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        $this->set('user', $this->User->findById($id));
    }

    //Creación de usuario
    public function add() {
        $this->layout='menu_layout';
        //Traer listado de roles
        Controller::loadModel('Roles');
        $this->set('roles',  $this->Roles->find('list',array('fields' => array('Roles.nombre_rol'))));
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido creado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El no usuario no ha sido creado.Intente nuevamente')
            );
        }
    }

    //Editar el usuario
    public function edit($id = null) {
        $this->layout='menu_layout';
        //Traer listado de roles
        Controller::loadModel('Roles');
          $this->set('roles',  $this->Roles->find('list',array('fields' => array('Roles.nombre_rol'))));
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario Invalido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Los datos han sido modificados'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('Los datos no pudierson ser modificados.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    //Borrar usuarios
    public function delete($id = null) {
        //Solo permitir método post
        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('El usuario ha sido eliminado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El usuario no ha sido eliminado'));
        return $this->redirect(array('action' => 'index'));
    }

}
