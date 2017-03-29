<?php
App::uses('AppController', 'Controller');
/**
 * ClientesDocumentos Controller
 *
 * @property CandidatosDocumento $CandidatosDocumento
 */
class ClientesDocumentosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClientesDocumento->recursive = 0;
		$this->set('candidatosDocumentos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ClientesDocumento->id = $id;
		if (!$this->ClientesDocumento->exists()) {
			throw new NotFoundException(__('Invalid candidatos documento'));
		}
		$this->set('candidatosDocumento', $this->ClientesDocumento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($cliente = null) {
		if ($this->request->is('post')) {
			$this->ClientesDocumento->create();
            $this->request->data['ClientesDocumento']['user_id'] = $this->Session->read('Auth.User.id');
			if ($this->ClientesDocumento->save($this->request->data)) {
				$this->Session->setFlash(__('Documento salvo com sucesso'));
				$this->redirect(array('controller'=>'clientes', 'action' => 'view', $this->request->data['ClientesDocumento']['cliente_id']));
			} else {
				$this->Session->setFlash(__('Documento não salvo. Por favor, tente novamente!'));
			}
		}
		$cliente = $this->ClientesDocumento->Cliente->find('first', array('fields'=>array('id', 'razao_social'),'conditions'=>array('Cliente.id'=>$cliente), 'recursive'=>-1));
		$this->set('cliente', $cliente);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ClientesDocumento->id = $id;
		if (!$this->ClientesDocumento->exists()) {
			throw new NotFoundException(__('Documento inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClientesDocumento->save($this->request->data)) {
				$this->Session->setFlash(__('Documento salvo com sucesso!'));
				$this->redirect(array('controller'=>'clientes', 'action' => 'view', $this->request->data['ClientesDocumento']['cliente_id']));
			} else {
				$this->Session->setFlash(__('Documento não salvo. Por favor, tente novamente!'));
			}
		} else {
			$this->request->data = $this->ClientesDocumento->read(null, $id);
    		$cliente = $this->ClientesDocumento->Cliente->find('first', array('fields'=>array('id', 'razao_social'),'conditions'=>array('Cliente.id'=>$this->request->data['ClientesDocumento']['cliente_id']), 'recursive'=>-1));
    		$this->set('cliente', $cliente);
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
		$this->ClientesDocumento->id = $id;
		if (!$this->ClientesDocumento->exists()) {
			throw new NotFoundException(__('Documento inválido'));
		}
		if ($this->ClientesDocumento->delete()) {
			$this->Session->setFlash(__('Documento removido'));
		    $this->redirect($_SERVER['HTTP_REFERER']);
		}
		$this->Session->setFlash(__('Documento não removido'));
		$this->redirect($_SERVER['HTTP_REFERER']);
	}
}
