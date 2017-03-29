<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP TurnosEscola
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class TurnosEscolaController extends AppController {

    public function index() {
        $turnos = $this->paginate($this->TurnosEscola);
        $this->set(compact('turnos'));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->TurnosEscola->save($this->request->data)) {
                $this->Session->setFlash('Turno cadastrado com sucesso!', 'default', ['class' => 'alert alert-success'], 'turnos');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao cadastrar!', 'default', ['class' => 'alert alert-danger'], 'turnos');
        }
    }

    public function edit($id = null) {
        $turno = $this->TurnosEscola->findById($id);
        if ($this->request->is(['post', 'put'])) {
            if ($this->TurnosEscola->save($this->request->data)) {
                $this->Session->setFlash('Turno editado com sucesso!', 'default', ['class' => 'alert alert-success'], 'turnos');
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash('Erro ao editar!', 'default', ['class' => 'alert alert-danger'], 'turnos');
        }
        $this->request->data = $turno;
        $this->set(compact($turno));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $turno = $this->TurnosEscola->findById($id);
        if (!$turno) {
            $this->Session->setFlash('Nenhum registro encontrado!', 'default', ['class' => 'alert alert-danger'], 'turnos');
            return;
        }
        if ($this->TurnosEscola->delete($id)) {
            $this->Session->setFlash('Turno excluído com sucesso!', 'default', ['class' => 'alert alert-success'], 'turnos');
            return $this->redirect(['action' => 'index']);
        }
        $this->Session->setFlash('Erro ao excluir!', 'default', ['class' => 'alert alert-danger'], 'turnos');
    }

}
