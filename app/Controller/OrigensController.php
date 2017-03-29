<?php
App::uses('AppController', 'Controller');
/**
 * Origens Controller
 *
 * @property Origem $Origem
 */
class OrigensController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Origem->recursive = 0;
		$this->set('origens', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Origem->id = $id;
		if (!$this->Origem->exists()) {
			throw new NotFoundException(__('Origem inválida.'));
		}
		$this->set('origem', $this->Origem->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Origem->create();
			if ($this->Origem->save($this->request->data)) {
				$this->Session->setFlash(__('Origem salva com sucesso.'));   
				$this->redirect(array('action' => 'index'));
			} else {
		        $this->Session->setFlash(__('Origem não salva. Por favor, tente novamente.'));
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
		$this->Origem->id = $id;
		if (!$this->Origem->exists()) {
			throw new NotFoundException(__('Origem inválida.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Origem->save($this->request->data)) {
				$this->Session->setFlash(__('Origem salva com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
		        $this->Session->setFlash(__('Origem não salva. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Origem->read(null, $id);
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
		$this->Origem->id = $id;
		if (!$this->Origem->exists()) {
				$this->Session->setFlash(__('Origem salva com sucesso.'));
		}
		if ($this->Origem->delete()) {
			$this->Session->setFlash(__('Origem removida.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Origem não removida. Por favor, tente novamente.'));
		$this->redirect(array('action' => 'index'));
	}
}
