<?php
App::uses('AppController', 'Controller');
/**
 * PretensoesSalariais Controller
 *
 * @property PretensoesSalarial $PretensoesSalarial
 */
class PretensoesSalariaisController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PretensoesSalarial->recursive = 0;
		$this->set('pretensoesSalariais', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PretensoesSalarial->id = $id;
		if (!$this->PretensoesSalarial->exists()) {
			throw new NotFoundException(__('Invalid pretensoes salarial'));
		}
		$this->set('pretensoesSalarial', $this->PretensoesSalarial->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PretensoesSalarial->create();
			if ($this->PretensoesSalarial->save($this->request->data)) {
				$this->Session->setFlash(__('Pretensão salarial salva com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A pretensão salarial não foi salva. Por favor, tente novamente.'));
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
		$this->PretensoesSalarial->id = $id;
		if (!$this->PretensoesSalarial->exists()) {
			throw new NotFoundException(__('Pretensão salarial inválida.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PretensoesSalarial->save($this->request->data)) {
				$this->Session->setFlash(__('Pretensão salarial salva com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A pretensão salarial não foi salva. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->PretensoesSalarial->read(null, $id);
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
		$this->PretensoesSalarial->id = $id;
		if (!$this->PretensoesSalarial->exists()) {
			throw new NotFoundException(__('Pretensão salarial inválida.'));
		}
		if ($this->PretensoesSalarial->delete()) {
			$this->Session->setFlash(__('Pretensão salarial removida.'));
			$this->redirect(array('action' => 'index'));
		}
				$this->Session->setFlash(__('A pretensão salarial não foi removida. Por favor, tente novamente.'));    
		$this->redirect(array('action' => 'index'));
	}
}
