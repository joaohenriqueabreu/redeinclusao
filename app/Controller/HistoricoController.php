<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP HistoricoController
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class HistoricoController extends AppController {

    public function index() {
        $historicos = $this->paginate($this->Historico);
        $this->set(compact('historicos'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Historico']['data'] = $this->converterData($this->request->data['Historico']['data']);
            $this->request->data['Historico']['data'] .= ' ' . $this->request->data['Historico']['hora'];
            unset($this->request->data['Historico']['hora']);
            if ($this->Historico->save($this->request->data)) {
                $this->Session->setFlash('Histórico cadastrado com sucesso!', 'default', ['class' => 'alert alert-success'], 'historicos');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao cadastrar!', 'default', ['class' => 'alert alert-danger'], 'historicos');
        }
        $escolas = $this->Historico->Cliente->find('list', [
            'conditions' => ['tipo' => 'S']
        ]);
        $tiposHistorico = $this->Historico->TiposHistorico->find('list');
        $users = $this->Historico->User->find('list');
        $this->set(compact('tiposHistorico', 'users', 'escolas'));
    }

    public function edit($id = null) {
        $historico = $this->Historico->findById($id);
        if ($this->request->is(['post', 'put'])) {
            $this->request->data['Historico']['data'] = $this->converterData($this->request->data['Historico']['data']);
            $this->request->data['Historico']['data'] .= ' ' . $this->request->data['Historico']['hora'];
            unset($this->request->data['Historico']['hora']);
            if ($this->Historico->save($this->request->data)) {
                $this->Session->setFlash('Histórico editado com sucesso!', 'default', ['class' => 'alert alert-success'], 'historicos');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao editar!', 'default', ['class' => 'alert alert-danger'], 'historicos');
        }
        $tiposHistorico = $this->Historico->TiposHistorico->find('list');
        $users = $this->Historico->User->find('list');
        $escolas = $this->Historico->Cliente->find('list', [
            'conditions' => ['tipo' => 'S']
        ]);
        $this->request->data = $historico;
        $this->set(compact('tiposHistorico', 'users', 'escolas'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $historico = $this->Historico->findById($id);
        if (!$historico) {
            $this->Session->setFlash('Nenhum registro encontrado!', 'default', ['class' => 'alert alert-danger'], 'historicos');
            return;
        }
        if ($this->Historico->delete($id)) {
            $this->Session->setFlash('Histórico excluído com sucesso!', 'default', ['class' => 'alert alert-success'], 'historicos');
            return $this->redirect(['action' => 'index']);
        }
        $this->Session->setFlash('Erro ao excluir!', 'default', ['class' => 'alert alert-danger'], 'historicos');
    }

}
