<?php

App::uses('AppController', 'Controller');

/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('index', 'view');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Group->recursive = 0;
        $this->set('groups', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Grupo inválido'));
        }
        $this->set('group', $this->Group->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Group->create();
            if ($this->Group->save($this->request->data)) {
                $this->Session->setFlash('Grupo salvo com sucesso!', 'default', [
                    'alert alert-success'], 'grupo');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Grupo não salvo. Por favor, tente novamente.', 'default', [
                    'alert alert-danger'], 'grupo');
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Grupo inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Group->save($this->request->data)) {
                $this->Session->setFlash('Grupo salvo com sucesso!', 'default', [
                    'alert alert-success'], 'grupo');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Grupo não salvo. Por favor, tente novamente.', 'default', [
                    'alert alert-danger'], 'grupo');
            }
        } else {
            $this->request->data = $this->Group->read(null, $id);
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
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Grupo inválido'));
        }
        if ($this->Group->delete()) {
            $this->removerAssociacoes($id);
            $this->Session->setFlash('Grupo removido com sucesso!', 'default', [
                'alert alert-success'], 'grupo');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Grupo não removido', 'default', [
            'alert alert-danger'], 'grupo');
        $this->redirect(array('action' => 'index'));
    }

    private function removerAssociacoes($groupId = null) {
        if ($groupId != null) {
            $this->Group->query('DELETE FROM groups_menus WHERE group_id = ' . $groupId);
        }
    }

}
