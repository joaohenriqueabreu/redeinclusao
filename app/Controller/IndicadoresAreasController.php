<?php
App::uses('AppController', 'Controller');
/**
 * IndicadoresAreas Controller
 *
 * @property IndicadoresArea $IndicadoresArea
 * @property PaginatorComponent $Paginator
 */
class IndicadoresAreasController extends AppController {

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
		$this->IndicadoresArea->recursive = 0;
		$this->set('indicadoresAreas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IndicadoresArea->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$options = array('conditions' => array('IndicadoresArea.' . $this->IndicadoresArea->primaryKey => $id));
		$this->set('indicadoresArea', $this->IndicadoresArea->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IndicadoresArea->create();
			if ($this->IndicadoresArea->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->IndicadoresArea->id));
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
		if (!$this->IndicadoresArea->exists($id)) {
			throw new NotFoundException(__('Invalid indicadores area'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IndicadoresArea->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Cadastro não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('IndicadoresArea.' . $this->IndicadoresArea->primaryKey => $id));
			$this->request->data = $this->IndicadoresArea->find('first', $options);
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
		$this->IndicadoresArea->id = $id;
		if (!$this->IndicadoresArea->exists()) {
			throw new NotFoundException(__('Invalid indicadores area'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->IndicadoresArea->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Cadastro não removido. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
