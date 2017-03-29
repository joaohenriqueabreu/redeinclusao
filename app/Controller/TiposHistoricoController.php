<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP TiposHistoricoController
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class TiposHistoricoController extends AppController {

    public function index() {
        $tipos = $this->paginate($this->TiposHistorico);
        $this->set(compact('tipos'));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->TiposHistorico->save($this->request->data)) {
                $this->Session->setFlash('Tipo de histórico cadastrado com sucesso!', 'default', ['class' => 'alert alert-success'], 'tipos');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao cadastrar!', 'default', ['class' => 'alert alert-danger'], 'tipos');
        }
    }

    public function edit($id = null) {
        $tipo = $this->TiposHistorico->findById($id);
        if ($this->request->is(['post', 'put'])) {
            if ($this->TiposHistorico->save($this->request->data)) {
                $this->Session->setFlash('Tipo de histórico editado com sucesso!', 'default', ['class' => 'alert alert-success'], 'tipos');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao editar!', 'default', ['class' => 'alert alert-danger'], 'tipos');
        }
        $this->request->data = $tipo;
        $this->set(compact($tipo));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $tipo = $this->TiposHistorico->findById($id);
        if (!$tipo) {
            $this->Session->setFlash('Nenhum registro encontrado!', 'default', ['class' => 'alert alert-danger'], 'tipos');
            return;
        }
        if ($this->TiposHistorico->delete($id)) {
            $this->Session->setFlash('Tipo de histórico excluído com sucesso!', 'default', ['class' => 'alert alert-success'], 'tipos');
            return $this->redirect(['action' => 'index']);
        }
        $this->Session->setFlash('Erro ao excluir!', 'default', ['class' => 'alert alert-danger'], 'tipos');
    }

}
