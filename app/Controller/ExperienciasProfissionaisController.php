<?php
App::uses('AppController', 'Controller');
/**
 * ExperienciasProfissionais Controller
 *
 * @property ExperienciasProfissional $ExperienciasProfissional
 */
class ExperienciasProfissionaisController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ExperienciasProfissional->recursive = 0;
		$this->set('experienciasProfissionais', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ExperienciasProfissional->id = $id;
		if (!$this->ExperienciasProfissional->exists()) {
			throw new NotFoundException(__('Invalid experiencias profissional'));
		}
		$this->set('experienciasProfissional', $this->ExperienciasProfissional->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExperienciasProfissional->create();
			if ($this->ExperienciasProfissional->save($this->request->data)) {
				$this->Session->setFlash(__('The experiencias profissional has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The experiencias profissional could not be saved. Please, try again.'));
			}
		}
		$candidatos = $this->ExperienciasProfissional->Candidato->find('list');
		$this->set(compact('candidatos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ExperienciasProfissional->id = $id;
		if (!$this->ExperienciasProfissional->exists()) {
			throw new NotFoundException(__('Invalid experiencias profissional'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ExperienciasProfissional->save($this->request->data)) {
				$this->Session->setFlash(__('The experiencias profissional has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The experiencias profissional could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ExperienciasProfissional->read(null, $id);
		}
		$candidatos = $this->ExperienciasProfissional->Candidato->find('list');
		$this->set(compact('candidatos'));
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
		$this->ExperienciasProfissional->id = $id;
		if (!$this->ExperienciasProfissional->exists()) {
			throw new NotFoundException(__('Invalid experiencias profissional'));
		}
		if ($this->ExperienciasProfissional->delete()) {
			$this->Session->setFlash(__('Experiencias profissional deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Experiencias profissional was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
