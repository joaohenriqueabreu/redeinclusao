<?php
App::uses('AppController', 'Controller');
/**
 * IndicadoresValores Controller
 *
 * @property IndicadoresValor $IndicadoresValor
 * @property PaginatorComponent $Paginator
 */
class IndicadoresValoresController extends AppController {

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
		$this->IndicadoresValor->recursive = 0;
		$this->set('indicadoresValores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IndicadoresValor->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$options = array('conditions' => array('IndicadoresValor.' . $this->IndicadoresValor->primaryKey => $id));
		$this->set('indicadoresValor', $this->IndicadoresValor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IndicadoresValor->create();
			if ($this->IndicadoresValor->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->IndicadoresValor->id));
			} else {
				$this->Session->setFlash(__('Cadastro não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$indicadoresItens = $this->IndicadoresValor->IndicadoresItem->find('list');
		$useres = $this->IndicadoresValor->User->find('list');
		$this->set(compact('indicadoresItens', 'useres'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->IndicadoresValor->exists($id)) {
			throw new NotFoundException(__('Invalid indicadores valor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IndicadoresValor->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Cadastro não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('IndicadoresValor.' . $this->IndicadoresValor->primaryKey => $id));
			$this->request->data = $this->IndicadoresValor->find('first', $options);
		}
		$indicadoresItens = $this->IndicadoresValor->IndicadoresItem->find('list');
		$useres = $this->IndicadoresValor->User->find('list');
		$this->set(compact('indicadoresItens', 'useres'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->IndicadoresValor->id = $id;
		if (!$this->IndicadoresValor->exists()) {
			throw new NotFoundException(__('Invalid indicadores valor'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->IndicadoresValor->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Cadastro não removido. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
