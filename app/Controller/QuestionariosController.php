<?php
App::uses('AppController', 'Controller');
/**
 * Questionarios Controller
 *
 * @property Questionario $Questionario
 */
class QuestionariosController extends AppController {


    public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('mostra_questionario');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Questionario->recursive = 0;
		$this->set('questionarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Questionario->id = $id;
		if (!$this->Questionario->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->set('questionario', $this->Questionario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Questionario->create();
			if ($this->Questionario->save($this->request->data)) {
			    $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'view', $this->Questionario->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Questionario->id = $id;
		if (!$this->Questionario->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Questionario->save($this->request->data)) {
			    $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$this->request->data = $this->Questionario->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Questionario->id = $id;
		if (!$this->Questionario->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->Questionario->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}

    public function mostra_questionario() {
        $this->layout = 'jquery';
        $this->Questionario->recursive = 2;
        $questionario = $this->Questionario->find('first', array('conditions'=>array('Questionario.id'=>$this->data['Questionario']['id'])));
        $this->set(compact('questionario'));
    }

}
