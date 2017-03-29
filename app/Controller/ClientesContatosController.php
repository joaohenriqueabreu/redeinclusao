<?php
App::uses('AppController', 'Controller');
/**
 * ClientesContatos Controller
 *
 * @property ClientesContato $ClientesContato
 */
class ClientesContatosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClientesContato->recursive = 0;
		$this->set('clientesContatos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ClientesContato->id = $id;
		if (!$this->ClientesContato->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->set('clientesContato', $this->ClientesContato->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	    $this->layout = 'ajax';
		$cargos = $this->ClientesContato->Cargo->find('list', array('order'=>array('Cargo.nome')));
		$this->set(compact('cargos'));
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
		$this->request->data = $this->ClientesContato->read(null, $id);
		$cargos = $this->ClientesContato->Cargo->find('list', array('order'=>array('Cargo.nome')));
		$this->set(compact('cargos'));
	}

    public function salva(){
        $this->autoRender = false;
		if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['ClientesContato']['acao'] == 'add'){
                $this->request->data['ClientesContato']['user_id'] = $this->Session->read('Auth.User.id');
			    $this->ClientesContato->create();
            }else{
		        $id = $this->request->data['ClientesContato']['id'];
                $this->ClientesContato->id = $id;
            }
			if($this->ClientesContato->save($this->request->data)) {
                return 1;
			} else {
				return 0;
			}
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
		$this->ClientesContato->id = $id;
		if (!$this->ClientesContato->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->ClientesContato->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		    $this->redirect($_SERVER['HTTP_REFERER']);
		}
		$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));      
		$this->redirect($_SERVER['HTTP_REFERER']);
	}
}
