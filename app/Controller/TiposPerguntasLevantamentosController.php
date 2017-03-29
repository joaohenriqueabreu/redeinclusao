<?php
App::uses('AppController', 'Controller');
/**
 * TiposPerguntasLevantamentos Controller
 *
 * @property TiposPerguntasLevantamento $TiposPerguntasLevantamento
 * @property PaginatorComponent $Paginator
 */
class TiposPerguntasLevantamentosController extends AppController {

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
		$this->TiposPerguntasLevantamento->recursive = 0;
		$this->set('tiposPerguntasLevantamentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TiposPerguntasLevantamento->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$options = array('conditions' => array('TiposPerguntasLevantamento.' . $this->TiposPerguntasLevantamento->primaryKey => $id));
		$this->set('tiposPerguntasLevantamento', $this->TiposPerguntasLevantamento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TiposPerguntasLevantamento->create();
			if ($this->TiposPerguntasLevantamento->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->TiposPerguntasLevantamento->id));
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
		if (!$this->TiposPerguntasLevantamento->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TiposPerguntasLevantamento->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->TiposPerguntasLevantamento->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('TiposPerguntasLevantamento.' . $this->TiposPerguntasLevantamento->primaryKey => $id));
			$this->request->data = $this->TiposPerguntasLevantamento->find('first', $options);
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
		$this->TiposPerguntasLevantamento->id = $id;
		if (!$this->TiposPerguntasLevantamento->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TiposPerguntasLevantamento->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
