<?php
App::uses('AppController', 'Controller');
/**
 * PerguntasLevantamentos Controller
 *
 * @property PerguntasLevantamento $PerguntasLevantamento
 * @property PaginatorComponent $Paginator
 */
class PerguntasLevantamentosController extends AppController {

    public function beforeFilter() {
		parent::beforeFilter();
        $conditions = array();
        if(isset($this->params->query['Conditions']) && !empty($this->params->query['Conditions'])){
            foreach($this->params->query['Conditions'] as $field=>$value){
              if(!empty($value)){
                $conditions[$field] = $value;
              }
            }
        }
        $this->DataTable->settings = array(
            'PerguntasLevantamento' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'order' => array('TiposPerguntasLevantamento.id'),
                'columns' => array(
                    'TiposPerguntasLevantamento.dimensao_imgi' => array('label' => 'Dimensão'),
                    'TiposPerguntasLevantamento.nome' => array('label' => 'Tipo'),
                    'PerguntasLevantamento.pergunta' => array('label' => 'Pergunta'),
                    'PerguntasLevantamento.peso' => array('label' => 'Peso'),
                    'PerguntasLevantamento.ativa' => array('label' => 'Ativa'),
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
	    $this->DataTable->setViewVar('PerguntasLevantamento');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PerguntasLevantamento->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$options = array('conditions' => array('PerguntasLevantamento.' . $this->PerguntasLevantamento->primaryKey => $id));
		$this->set('perguntasLevantamento', $this->PerguntasLevantamento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PerguntasLevantamento->create();
			if ($this->PerguntasLevantamento->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->PerguntasLevantamento->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$tiposPerguntasLevantamentos = $this->PerguntasLevantamento->TiposPerguntasLevantamento->find('list', array('order'=>'nome'));
		$this->set(compact('tiposPerguntasLevantamentos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PerguntasLevantamento->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PerguntasLevantamento->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->PerguntasLevantamento->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('PerguntasLevantamento.' . $this->PerguntasLevantamento->primaryKey => $id));
			$this->request->data = $this->PerguntasLevantamento->find('first', $options);
		}
		$tiposPerguntasLevantamentos = $this->PerguntasLevantamento->TiposPerguntasLevantamento->find('list', array('order'=>'nome'));
		$this->set(compact('tiposPerguntasLevantamentos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->PerguntasLevantamento->id = $id;
		if (!$this->PerguntasLevantamento->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->PerguntasLevantamento->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
