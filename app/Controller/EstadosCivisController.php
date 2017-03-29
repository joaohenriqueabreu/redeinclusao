<?php
App::uses('AppController', 'Controller');
/**
 * EstadosCivis Controller
 *
 * @property EstadosCivil $EstadosCivil
 */
class EstadosCivisController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EstadosCivil->recursive = 0;
		$this->set('estadosCivis', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EstadosCivil->id = $id;
		if (!$this->EstadosCivil->exists()) {
			throw new NotFoundException(__('Estado civil inválido.'));
		}
		$this->set('estadosCivil', $this->EstadosCivil->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EstadosCivil->create();
			if ($this->EstadosCivil->save($this->request->data)) {
				$this->Session->setFlash(__('Estado civil salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
		        $this->Session->setFlash(__('Estado civil não salvo. Por favor, tente novamente.'));
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
		$this->EstadosCivil->id = $id;
		if (!$this->EstadosCivil->exists()) {
			throw new NotFoundException(__('Estado civil inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EstadosCivil->save($this->request->data)) {
				$this->Session->setFlash(__('Estado civil salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
		        $this->Session->setFlash(__('Estado civil não salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->EstadosCivil->read(null, $id);
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
		$this->EstadosCivil->id = $id;
		if (!$this->EstadosCivil->exists()) {
			throw new NotFoundException(__('Estado civil inválido.'));
		}
		if ($this->EstadosCivil->delete()) {
			$this->Session->setFlash(__('Estado civil removido'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Estado civil não removido. Por favor, tente novamente.'));
		$this->redirect(array('action' => 'index'));
	}
}                                                     
