<?php
App::uses('AppController', 'Controller');
/**
 * ClientesHistoricos Controller
 *
 * @property ClientesHistorico $ClientesHistorico
 */
class ClientesHistoricosController extends AppController {
    var $uses = array('ClientesHistorico');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClientesHistorico->recursive = 0;
		$this->set('candidatosHistoricos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ClientesHistorico->id = $id;
		if (!$this->ClientesHistorico->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));          
		}
		$this->set('candidatosHistorico', $this->ClientesHistorico->read(null, $id));
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
	    $this->request->data = $this->ClientesHistorico->read(null, $id);
	}

    public function salva(){
        $this->autoRender = false;
		if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['ClientesHistorico']['acao'] == 'add'){
                $this->request->data['ClientesHistorico']['user_id'] = $this->Session->read('Auth.User.id');
			    $this->ClientesHistorico->create();
            }else{
		        $id = $this->request->data['ClientesHistorico']['id'];
                $this->ClientesHistorico->id = $id;
                if(isset($this->request->data['ClientesHistorico']['remover_arquivo']) and $this->request->data['ClientesHistorico']['remover_arquivo'] == 1){
                    $dir = $this->pathWebroot.'files/clientes_historico/arquivo/'.$id;
                    $anexo = $dir.'/'.$this->request->data['ClientesHistorico']['nome_arquivo'];
                    if(file_exists($anexo)){
                      $this->rrmdir($dir);
                      $this->request->data['ClientesHistorico']['arquivo'] = NULL;
                    }
                }
            }
			if($this->ClientesHistorico->save($this->request->data)) {
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
		$this->ClientesHistorico->id = $id;
		if (!$this->ClientesHistorico->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->ClientesHistorico->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		    $this->redirect($_SERVER['HTTP_REFERER']);
		}
		$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect($_SERVER['HTTP_REFERER']);
    }
}