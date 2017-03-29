<?php
App::uses('AppController', 'Controller');
/**
 * Escolaridades Controller
 *
 * @property Escolaridade $Escolaridade
 */
class EscolaridadesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Escolaridade->recursive = 0;
		$this->set('escolaridades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Escolaridade->id = $id;
		if (!$this->Escolaridade->exists()) {
			throw new NotFoundException(__('Escolaridade inválida'));
		}
		$this->set('escolaridade', $this->Escolaridade->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Escolaridade->create();
			if ($this->Escolaridade->save($this->request->data)) {
				$this->Session->setFlash(__('Escolaridade salva com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Escolaridade não salva. Por favor, tente novamente.'));
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
		$this->Escolaridade->id = $id;
		if (!$this->Escolaridade->exists()) {
			throw new NotFoundException(__('Escolaridade inválida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Escolaridade->save($this->request->data)) {
				$this->Session->setFlash(__('Escolaridade salva com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Escolaridade não salva. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Escolaridade->read(null, $id);
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
		$this->Escolaridade->id = $id;
		if (!$this->Escolaridade->exists()) {
			throw new NotFoundException(__('Escolaridade inválida'));
		}
		if ($this->Escolaridade->delete()) {
			$this->Session->setFlash(__('Escolaridade removida'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Escolaridade não removida'));
		$this->redirect(array('action' => 'index'));
	}
}
