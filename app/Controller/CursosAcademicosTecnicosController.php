<?php

App::uses('AppController', 'Controller');

/**

 * CursosAcademicosTecnicos Controller

 *

 * @property CursosAcademicosTecnico $CursosAcademicosTecnico

 */

class CursosAcademicosTecnicosController extends AppController {

    var $tipos = array('T'=>'Técnico', 'S'=>'Superior', 'P'=>'Pós-Graduação', 'Q'=>'Qualificação', 'O'=>'Outros');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CursosAcademicosTecnico->recursive = 0;
        $this->paginate = array('CursosAcademicosTecnico' => array('order' => array('CursosAcademicosTecnico.nome' => 'asc')));
		$this->set('cursosAcademicosTecnicos', $this->paginate());
        $tipos = $this->tipos;
		$this->set(compact('tipos'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CursosAcademicosTecnico->id = $id;
		if (!$this->CursosAcademicosTecnico->exists()) {
			throw new NotFoundException(__('Curso inválido.'));
		}
		$this->set('cursosAcademicosTecnico', $this->CursosAcademicosTecnico->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CursosAcademicosTecnico->create();
			if ($this->CursosAcademicosTecnico->save($this->request->data)) {
				$this->Session->setFlash(__('Curso salvo com sucesso!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cursos academicos tecnico could not be saved. Please, try again.'));
			}
		}
		$tipos = $this->tipos;
		$this->set(compact('tipos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CursosAcademicosTecnico->id = $id;
		if (!$this->CursosAcademicosTecnico->exists()) {
			throw new NotFoundException(__('Curso inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CursosAcademicosTecnico->save($this->request->data)) {
				$this->Session->setFlash(__('Curso salvo com sucesso!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Curso não salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->CursosAcademicosTecnico->read(null, $id);
		}
		$tipos = $this->tipos;
		$this->set(compact('tipos'));
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
 		$this->CursosAcademicosTecnico->id = $id;
 		if (!$this->CursosAcademicosTecnico->exists()) {
 			throw new NotFoundException(__('Curso inválido.'));
 		}
 		if ($this->CursosAcademicosTecnico->delete()) {
 			$this->Session->setFlash(__('Cursos academicos tecnico deleted'));
 			$this->redirect(array('action' => 'index'));
 		}
 		$this->Session->setFlash(__('Cursos academicos tecnico was not deleted'));
 		$this->redirect(array('action' => 'index'));
 	}

    public function busca_curso(){
        $this->autoRender = false;
        Configure::write('debug',0);
        $this->CursosAcademicosTecnico->recursive = -1;
        $cursos = $this->CursosAcademicosTecnico->find('all', array(
                'conditions'=>array(
                    'CursosAcademicosTecnico.nome LIKE'=>'%'.$_GET['term'].'%'
                )
            )
        );
       $arr = array();
        foreach($cursos as $curso){
        	 $arr[] = array(
                'value'=>$curso['CursosAcademicosTecnico']['id'],
                'label'=>$this->tipos[$curso['CursosAcademicosTecnico']['tipo']].' - '.$curso['CursosAcademicosTecnico']['nome']
             );
        }
        $json_response = json_encode($arr);
        if(isset($_GET["callback"])) {
        	$json_response = $_GET["callback"]."(".$json_response.")";
        }
        echo $json_response;
    }

 }
