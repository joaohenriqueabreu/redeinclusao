<?php

class MenusController extends AppController {

    var $name = 'Menus';

    function index() {
        $this->Menu->recursive = 1;
        $this->paginate = array('Menu' => array('order' => 'titulo'));

        $menusParent = $this->Menu->find('all', [
            'conditions' => ['parent' => 0]
        ]);

        foreach ($menusParent as $parent) {
            $menuParent[$parent['Menu']['id']] = $parent['Menu']['titulo'];
        }

        $this->set(compact('menuParent'));
        $this->set('menus', $this->paginate());
    }

    function add() {
        if (!empty($this->data)) {
            $this->Menu->create();
            if ($this->Menu->save($this->data)) {
                $this->Session->setFlash('Menu cadastrado com sucesso!', 'default', [
                    'class' => 'alert alert-success'], 'menu');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Menu não cadastrado. Por favor, tente novamente.', 'default', [
                    'class' => 'alert alert-danger'], 'menu');
            }
        }
        $groups = $this->Menu->Group->find('list', array('order' => array('name asc')));
        $parent = $this->Menu->find('list', array('conditions' => array('parent' => 0)), array('order' => array('titulo asc')));        
        $this->set(compact('groups', 'parent'));
    }

    function edit($id = null) {
        if (!$this->Menu->exists($id)) {
            throw new NotFoundException('Registro não encontrado!');
        }
        if ($this->request->is(['post', 'put'])) {
            $this->request->data['Menu']['id'] = $id;
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash('Menu atualizado com sucesso!', 'default', [
                    'class' => 'alert alert-success'], 'menu');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Menu não atualizado. Por favor, tente novamente.', 'default', [
                    'class' => 'alert alert-danger'], 'menu');
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Menu->read(null, $id);
        }
        
        $groups = $this->Menu->Group->find('list', array('order' => array('name asc')));
        $parent = $this->Menu->find('list', array('conditions' => array('parent' => 0)), array('order' => array('titulo asc')));
        $this->set(compact('groups', 'parent'));
    }

    public function delete($id = null) {

        $this->Menu->id = $id;
        if (!$this->Menu->exists()) {
            throw new NotFoundException(__('Menu inválido.'));
        }
        if ($this->Menu->delete()) {
            $this->Session->setFlash('Menu removido.', 'default', [
                'class' => 'alert alert-success'], 'menu');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Menu não removido.', 'default', [
            'class' => 'alert alert-danger'], 'menu');
        $this->redirect(array('action' => 'index'));
    }

}

?>