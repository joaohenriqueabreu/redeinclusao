<?php
App::uses('AppController', 'Controller');
/**
 * IndicadoresItens Controller
 *
 * @property IndicadoresItem $IndicadoresItem
 * @property PaginatorComponent $Paginator
 */
class IndicadoresItensController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public function beforeFilter() {
		parent::beforeFilter();
        $conditions = array();
        if(isset($this->params->query['Conditions']) && !empty($this->params->query['Conditions'])){
            $conditions = $this->params->query['Conditions'];
        }

        $this->DataTable->settings = array(
            'IndicadoresItem' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'order' => array('IndicadoresArea.nome asc', 'IndicadoresItem.nome asc'),
                'columns' => array(
                    'IndicadoresArea.nome' => array('label' => 'Área'),
                    'UnidadesMedida.nome' => array('label' => 'Medida'),
                    'IndicadoresItem.nome' => array('label' => 'Nome'),
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
        $this->DataTable->setViewVar('IndicadoresItem');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IndicadoresItem->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$options = array('conditions' => array('IndicadoresItem.' . $this->IndicadoresItem->primaryKey => $id));
		$this->set('indicadoresItem', $this->IndicadoresItem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IndicadoresItem->create();
            $this->request->data['IndicadoresItem']['ativo'] = 'S';
			if ($this->IndicadoresItem->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->IndicadoresItem->id));
			} else {
				$this->Session->setFlash(__('Cadastro não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$indicadoresAreas = $this->IndicadoresItem->IndicadoresArea->find('list', array('conditions' => array('ativo' => 'S')));
		$unidadesMedidas = $this->IndicadoresItem->UnidadesMedida->find('list', array('order' => 'nome'));
		$this->set(compact('indicadoresAreas', 'unidadesMedidas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->IndicadoresItem->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IndicadoresItem->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Cadastro não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('IndicadoresItem.' . $this->IndicadoresItem->primaryKey => $id));
			$this->request->data = $this->IndicadoresItem->find('first', $options);
		}
		$indicadoresAreas = $this->IndicadoresItem->IndicadoresArea->find('list', array('conditions' => array('ativo' => 'S')));
		$unidadesMedidas = $this->IndicadoresItem->UnidadesMedida->find('list', array('order' => 'nome'));
		$this->set(compact('indicadoresAreas', 'unidadesMedidas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->IndicadoresItem->id = $id;
		if (!$this->IndicadoresItem->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->IndicadoresItem->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Cadastro não removido. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
