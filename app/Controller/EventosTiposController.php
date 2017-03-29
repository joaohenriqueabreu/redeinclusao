<?php
App::uses('AppController', 'Controller');
 
class EventosTiposController extends AppController {

	public function index() {
		$this->EventosTipo->recursive = 0;
		$this->set('tiposEventos', $this->paginate());
	}

	public function add() {
        if ($this->request->is('post')) {
            if ($this->EventosTipo->save($this->request->data)) {
                $this->Session->setFlash('Registro cadastrado com sucesso!', 'default', ['class' => 'alert alert-success'], 'tiposEvento');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao cadastrar!', 'default', ['class' => 'alert alert-danger'], 'tiposEvento');
        }
    }

    public function edit($id = null) {
        $tipoEvento = $this->EventosTipo->findById($id);
        if ($this->request->is(['post', 'put'])) {
            if ($this->EventosTipo->save($this->request->data)) {
                $this->Session->setFlash('Registro atualizado com sucesso!', 'default', ['class' => 'alert alert-success'], 'tiposEvento');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao editar!', 'default', ['class' => 'alert alert-danger'], 'tiposEvento');
        }
        $this->request->data = $tipoEvento;
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $tipoEvento = $this->EventosTipo->findById($id);
        if (!$tipoEvento) {
            $this->Session->setFlash('Nenhum registro encontrado!', 'default', ['class' => 'alert alert-danger'], 'tiposEvento');
            return;
        }
        if ($this->EventosTipo->delete($id)) {
            $this->Session->setFlash('Registro excluído com sucesso!', 'default', ['class' => 'alert alert-success'], 'tiposEvento');
            return $this->redirect(['action' => 'index']);
        }
        $this->Session->setFlash('Erro ao excluir!', 'default', ['class' => 'alert alert-danger'], 'tiposEvento');
    }
}