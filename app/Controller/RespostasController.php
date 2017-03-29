<?php
App::uses('AppController', 'Controller');

class RespostasController extends AppController {

	public function index() {
		$this->Resposta->recursive = 0;
		$this->set('respostas', $this->paginate());
	}

	public function view($id = null) {
		$this->Resposta->id = $id;
		if (!$this->Resposta->exists()) {
			throw new NotFoundException(__('Invalid resposta'));
		}
		$this->set('resposta', $this->Resposta->read(null, $id));
	}

	public function add() {
        $this->layout = 'ajax';
	}

	public function edit($id = null) {
		$this->layout = 'ajax';
		$this->request->data = $this->Resposta->read(null, $id);
	}

    public function salva(){
        $this->autoRender = false;
        $this->Resposta->create();
        if ($this->Resposta->save($this->request->data)) {
            return 1;
        }else{
            return 0;
        }
    }

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Resposta->id = $id;
		if (!$this->Resposta->exists()) {
			throw new NotFoundException(__('Resposta inválida'));
		}
        $resposta = $this->Resposta->find('first', array('fields'=>'pergunta_id', 'conditions'=>array('id'=>$id), 'recursive'=>-1));
		if ($this->Resposta->delete()) {
			$this->Session->setFlash(__('Resposta removida com sucesso'));
			$this->redirect(array('controller'=>'perguntas', 'action' => 'view', $resposta['Resposta']['pergunta_id'], 2));
		}
		$this->Session->setFlash(__('Resposta não removida'));
		$this->redirect(array('action' => 'index'));
	}
}
