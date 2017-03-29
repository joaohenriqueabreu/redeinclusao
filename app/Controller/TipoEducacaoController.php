<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP TipoEducacaoController
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class TipoEducacaoController extends AppController {

    public function index() {
        $educacoes = $this->paginate($this->TipoEducacao);
        $this->set(compact('educacoes'));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->TipoEducacao->save($this->request->data)) {
                $this->Session->setFlash('Educação cadastrado com sucesso!', 'default', ['class' => 'alert alert-success'], 'educacoes');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao cadastrar!', 'default', ['class' => 'alert alert-danger'], 'educacoes');
        }
    }

    public function edit($id = null) {
        $educacao = $this->TipoEducacao->findById($id);
        if ($this->request->is(['post', 'put'])) {
            if ($this->TipoEducacao->save($this->request->data)) {
                $this->Session->setFlash('Educação editado com sucesso!', 'default', ['class' => 'alert alert-success'], 'educacoes');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao editar!', 'default', ['class' => 'alert alert-danger'], 'educacoes');
        }
        $this->request->data = $educacao;
        $this->set(compact($educacao));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $educacao = $this->TipoEducacao->findById($id);
        if (!$educacao) {
            $this->Session->setFlash('Nenhum registro encontrado!', 'default', ['class' => 'alert alert-danger'], 'educacoes');
            return;
        }
        if ($this->TipoEducacao->delete($id)) {
            $this->Session->setFlash('Educação excluído com sucesso!', 'default', ['class' => 'alert alert-success'], 'educacoes');
            return $this->redirect(['action' => 'index']);
        }
        $this->Session->setFlash('Erro ao excluir!', 'default', ['class' => 'alert alert-danger'], 'educacoes');
    }

}
