<?php
App::uses('AppController', 'Controller');
/**
 * Cargos Controller
 *
 * @property Cargo $Cargo
 */
class CargosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cargo->recursive = 0;
        $this->paginate = array('Cargo' => array('order' => array('Cargo.nome' => 'asc')));
		$this->set('cargos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Cargo->id = $id;
		if (!$this->Cargo->exists()) {
			throw new NotFoundException(__('Cargo inválido.'));
		}
		$this->set('cargo', $this->Cargo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cargo->create();
			if ($this->Cargo->save($this->request->data)) {
				$this->Session->setFlash(__('Cargo salvo com sucesso!'));
				$this->redirect(array('action' => 'view', $this->Cargo->id));
			} else {
				$this->Session->setFlash(__('Cargo não salvo. Por favor, tente novamente.'));
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
		$this->Cargo->id = $id;
		if (!$this->Cargo->exists()) {
			throw new NotFoundException(__('Cargo inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cargo->save($this->request->data)) {
				$this->Session->setFlash(__('Cargo salvo com sucesso!'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('Cargo não salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Cargo->read(null, $id);
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
		$this->Cargo->id = $id;
		if (!$this->Cargo->exists()) {
			throw new NotFoundException(__('Cargo inválido.'));
		}
		if ($this->Cargo->delete()) {
			$this->Session->setFlash(__('Cargo removido com sucesso!'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('\Cargo não removido.'));
		$this->redirect(array('action' => 'index'));
	}
}
