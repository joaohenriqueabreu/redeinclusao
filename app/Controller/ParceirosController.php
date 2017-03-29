<?php
App::uses('AppController', 'Controller');
App::uses('UtilHelper', 'View/Helper');
/**
 * Clientes Controller
 *
 * @property Parceiro $Parceiro
 */
class ParceirosController extends AppController {

    public function beforeFilter() {
		parent::beforeFilter();
        $conditions = array();
        if(isset($this->params->query['Conditions']) && !empty($this->params->query['Conditions'])){
            $conditions = $this->params->query['Conditions'];
        }
        $this->DataTable->settings = array(
            'Parceiro' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'columns' => array(
                    'categoria',
                    'nome' => array('label' => 'Nome'),
                    'telefone_1' => array('label' => 'Telefone(s)'),
                    'ativo',
                    'Ações' => null
                ),
                'fields' => array('id', 'telefone_2')
            ),
        );
	}

/**
 * index method
 *
 * @return void
 */

	public function index($tipo = null) {
        $this->DataTable->setViewVar('Parceiro');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function view($id = null) {
		$this->Parceiro->id = $id;
		if (!$this->Parceiro->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->set('parceiro', $this->Parceiro->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Parceiro->create();
            $this->request->data['Parceiro']['user_id'] = $this->Session->read('Auth.User.id');
            if(!empty($this->request->data['Parceiro']['cpf'])){
                $this->request->data['Parceiro']['cpf_cnpj'] = $this->request->data['Parceiro']['cpf'];
            }
            if(!empty($this->request->data['Parceiro']['cnpj'])){
                $this->request->data['Parceiro']['cpf_cnpj'] = $this->request->data['Parceiro']['cnpj'];
            }
			if ($this->Parceiro->save($this->request->data)) {
			    $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'view', $this->Parceiro->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Parceiro->id = $id;
		if (!$this->Parceiro->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            if(!empty($this->request->data['Parceiro']['cpf'])){
                $this->request->data['Parceiro']['cpf_cnpj'] = $this->request->data['Parceiro']['cpf'];
            }
            if(!empty($this->request->data['Parceiro']['cnpj'])){
                $this->request->data['Parceiro']['cpf_cnpj'] = $this->request->data['Parceiro']['cnpj'];
            }
			if ($this->Parceiro->save($this->request->data)) {
			    $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$this->request->data = $this->Parceiro->read(null, $id);
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
		$this->Parceiro->id = $id;
		if (!$this->Parceiro->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->Parceiro->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		    $this->redirect(array('action' => 'index?ativo='.$_GET['ativo']));
		}
		$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index?ativo='.$_GET['ativo']));
	}
}