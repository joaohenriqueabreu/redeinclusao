<?php
App::uses('AppController', 'Controller');
/**
 * UnidadesMedidas Controller
 *
 * @property UnidadesMedida $UnidadesMedida
 * @property PaginatorComponent $Paginator
 */
class UnidadesMedidasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UnidadesMedida->recursive = 0;
		$this->set('unidadesMedidas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UnidadesMedida->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$options = array('conditions' => array('UnidadesMedida.' . $this->UnidadesMedida->primaryKey => $id));
		$this->set('unidadesMedida', $this->UnidadesMedida->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UnidadesMedida->create();
			if ($this->UnidadesMedida->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Cadastro não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->UnidadesMedida->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UnidadesMedida->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Cadastro não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('UnidadesMedida.' . $this->UnidadesMedida->primaryKey => $id));
			$this->request->data = $this->UnidadesMedida->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UnidadesMedida->id = $id;
		if (!$this->UnidadesMedida->exists()) {
			throw new NotFoundException(__('Cadastro inválido.')); 
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UnidadesMedida->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Cadastro não removido. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
