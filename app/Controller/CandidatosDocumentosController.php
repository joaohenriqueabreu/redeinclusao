<?php
App::uses('AppController', 'Controller');
/**
 * CandidatosDocumentos Controller
 *
 * @property CandidatosDocumento $CandidatosDocumento
 */
class CandidatosDocumentosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CandidatosDocumento->recursive = 0;
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
		$this->CandidatosDocumento->id = $id;
		if (!$this->CandidatosDocumento->exists()) {
			throw new NotFoundException(__('Invalid candidatos documento'));
		}
		$this->set('candidatosDocumento', $this->CandidatosDocumento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($candidato = null) {
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
	    $this->request->data = $this->CandidatosDocumento->read(null, $id);
	}

    public function salva(){
        $this->autoRender = false;
		if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['CandidatosDocumento']['acao'] == 'add'){
                $this->request->data['CandidatosDocumento']['user_id'] = $this->Session->read('Auth.User.id');
			    $this->CandidatosDocumento->create();
            }else{
		        $id = $this->request->data['CandidatosDocumento']['id'];
                $this->CandidatosDocumento->id = $id;
                if(isset($this->request->data['CandidatosDocumento']['remover_arquivo']) and $this->request->data['CandidatosDocumento']['remover_arquivo'] == 1){
                    $dir = $this->pathWebroot.'files/candidatos_documento/arquivo/'.$id;
                    $anexo = $dir.'/'.$this->request->data['CandidatosDocumento']['nome_arquivo'];
                    if(file_exists($anexo)){
                      $this->rrmdir($dir);
                      $this->request->data['CandidatosDocumento']['arquivo'] = NULL;
                    }
                }
            }
			if($this->CandidatosDocumento->save($this->request->data)) {
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
		$this->CandidatosDocumento->id = $id;
		if (!$this->CandidatosDocumento->exists()) {
			throw new NotFoundException(__('Documento inválido'));
		}
		if ($this->CandidatosDocumento->delete()) {
			$this->Session->setFlash(__('Documento removido'));
		    $this->redirect($_SERVER['HTTP_REFERER']);
		}
		$this->Session->setFlash(__('Candidatos documento was not deleted'));
		$this->redirect($_SERVER['HTTP_REFERER']);
	}
}
