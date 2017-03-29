<?php
App::uses('AppController', 'Controller');
/**
 * Opcoes Controller
 *
 * @property Opcao $Opcao
 */
class OpcoesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Opcao->recursive = 0;
		$this->set('opcoes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Opcao->id = $id;
		if (!$this->Opcao->exists()) {
			throw new NotFoundException(__('Invalid opcao'));
		}
		$this->set('opcao', $this->Opcao->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->layout = 'ajax';
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'ajax';
		$this->request->data = $this->Opcao->read(null, $id);
	}

    public function salva(){
        $this->autoRender = false;
        $this->Opcao->create();
        if ($this->Opcao->save($this->request->data)) {
            return 1;
        }else{
            return 0;
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
		$this->Opcao->id = $id;
		if (!$this->Opcao->exists()) {
			throw new NotFoundException(__('Invalid opcao'));
		}
		if ($this->Opcao->delete()) {
			$this->Session->setFlash(__('Opcao deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Opcao was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
