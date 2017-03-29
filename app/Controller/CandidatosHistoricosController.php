<?php
App::uses('AppController', 'Controller');
/**
 * CandidatosHistoricos Controller
 *
 * @property CandidatosHistorico $CandidatosHistorico
 */
class CandidatosHistoricosController extends AppController {
    var $uses = array('CandidatosHistorico');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CandidatosHistorico->recursive = 0;
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
		$this->CandidatosHistorico->id = $id;
		if (!$this->CandidatosHistorico->exists()) {
			throw new NotFoundException(__('Histórico inválido'));
		}
		$this->set('candidatosHistorico', $this->CandidatosHistorico->read(null, $id));
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
	    $this->request->data = $this->CandidatosHistorico->read(null, $id);
	}

    public function salva(){
        $this->autoRender = false;
		if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['CandidatosHistorico']['acao'] == 'add'){
                $this->request->data['CandidatosHistorico']['user_id'] = $this->Session->read('Auth.User.id');
			    $this->CandidatosHistorico->create();
            }else{
		        $id = $this->request->data['CandidatosHistorico']['id'];
                $this->CandidatosHistorico->id = $id;
                if(isset($this->request->data['CandidatosHistorico']['remover_arquivo']) and $this->request->data['CandidatosHistorico']['remover_arquivo'] == 1){
                    $dir = $this->pathWebroot.'files/candidatos_historico/arquivo/'.$id;
                    $anexo = $dir.'/'.$this->request->data['CandidatosHistorico']['nome_arquivo'];
                    if(file_exists($anexo)){
                      $this->rrmdir($dir);
                      $this->request->data['CandidatosHistorico']['arquivo'] = NULL;
                    }
                }
            }
			if($this->CandidatosHistorico->save($this->request->data)) {
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
		$this->CandidatosHistorico->id = $id;
		if (!$this->CandidatosHistorico->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));         
		}
		if ($this->CandidatosHistorico->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		    $this->redirect($_SERVER['HTTP_REFERER']);
		}
		$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
    }
}