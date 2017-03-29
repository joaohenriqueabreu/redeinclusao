<?php
App::uses('AppController', 'Controller');
/**
 * Colaboradores Controller
 *
 * @property Colaborador $Colaborador
 */
class ColaboradoresController extends AppController {


    public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('busca_colaboradores');
        $conditions = array();
        if(isset($this->params->query['Conditions']) && !empty($this->params->query['Conditions'])){
            foreach($this->params->query['Conditions'] as $field=>$value){
              if(!empty($value)){
                $conditions[$field] = $value;
              }
            }
        }
        $this->DataTable->settings = array(
            'Colaborador' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'columns' => array(
                    'nome',
                    'Cargo.nome' => array('label' => 'Cargo'),
                    'ativo',
                    'Ações' => null
                ),
                'fields' => array('id'),
            )
        );
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->DataTable->setViewVar('Colaborador');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Colaborador->id = $id;
		if (!$this->Colaborador->exists()) {
			throw new NotFoundException(__('Cadastrado inválido.'));
		}
		$this->set('colaborador', $this->Colaborador->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */

    public function add() {
		if ($this->request->is('post')) {
			$this->Colaborador->create();
			if ($this->Colaborador->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
        $cargos = $this->Colaborador->Cargo->find('list', array('order'=>'nome'));
		$this->set(compact('cargos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Colaborador->id = $id;
		if (!$this->Colaborador->exists()) {
			throw new NotFoundException(__('Cadastrado inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Colaborador->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$this->request->data = $this->Colaborador->read(null, $id);
		}
        $cargos = $this->Colaborador->Cargo->find('list', array('order'=>'nome'));
		$this->set(compact('cargos'));
	}

    public function salva(){
        $this->autoRender = false;
        $this->Colaborador->create();
        if ($this->Colaborador->save($this->request->data)) {
            return 1;
        }else{
            return 0;
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
		$this->Colaborador->id = $id;
		if (!$this->Colaborador->exists()) {
			throw new NotFoundException(__('Cadastrado inválido.'));
		}
		if ($this->Colaborador->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));  
		$this->redirect(array('action' => 'index'));
	}

    public function busca_colaboradores(){
        $this->autoRender = false;
        $this->Colaborador->recursive = -1;
        $colaboradores = $this->Colaborador->find('all', array(
                'conditions'=>array(
                    'Colaborador.nome LIKE'=>'%'.$_GET['q'].'%',
                    'Colaborador.ativo'=>'S',
                )
            )
        );
       $arr = array();
        foreach($colaboradores as $colaborador){
        	 $arr[] = array(
                'id'=>$colaborador['Colaborador']['id'],
                'nome'=>$colaborador['Colaborador']['nome']
             );
        }
        $json_response = json_encode($arr);
        if(isset($_GET["callback"])) {
        	$json_response = $_GET["callback"]."(".$json_response.")";
        }
        echo $json_response;
    }
}
