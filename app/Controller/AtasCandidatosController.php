<?php
App::uses('AppController', 'Controller');
/**
 * Atas Controller
 *
 * @property Ata $Ata
 * @property PaginatorComponent $Paginator
 */
class AtasCandidatosController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $uses = array('AtasCandidato', 'Colaborador');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AtasCandidato->recursive = 0;
		$this->set('atas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AtasCandidato->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$options = array('conditions' => array('AtasCandidato.' . $this->AtasCandidato->primaryKey => $id));
		$this->set('ata', $this->AtasCandidato->find('first', $options));
	}

	public function view_modal($id = null) {
	    $this->layout = 'ajax';
		$options = array('conditions' => array('AtasCandidato.' . $this->AtasCandidato->primaryKey => $id));
		$this->set('ata', $this->AtasCandidato->find('first', $options));
	}
/**
 * add method
 *
 * @return void
 */
	public function add($candidadoID = null) {
		if ($this->request->is('post')) {
			$this->AtasCandidato->create();
            $this->request->data['AtasCandidato']['user_id'] = $this->Session->read('Auth.User.id');
			if ($this->AtasCandidato->save($this->request->data)) {
                $tarefas = array();
                foreach($this->request->data['Tarefa'] as $key=>$dados){
                    if(!empty($dados['tarefa'])){
                      $tarefas[$key]['Tarefa'] = $dados;
                      $tarefas[$key]['Tarefa']['ata_candidato_id'] = $this->AtasCandidato->id;
                      if(empty($dados['status'])){
                        $tarefas[$key]['Tarefa']['status'] = 'P';
                      }
                    }
                }
                if(!empty($tarefas)){
			        $this->AtasCandidato->Tarefa->create();
			        $this->AtasCandidato->Tarefa->saveAll($tarefas);
                }
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->AtasCandidato->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
        $this->AtasCandidato->Candidato->recursive = -1;
		$this->set('candidato', $this->AtasCandidato->Candidato->find('first', array('fields' => array('Candidato.nome'), 'conditions' => array('Candidato.id'=>$candidadoID))));
        $colaboradores = $this->Colaborador->find('list', array('conditions'=>array('Colaborador.ativo'=>'S'), 'order'=>'Colaborador.nome'));
        $this->set(compact('colaboradores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AtasCandidato->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AtasCandidato->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->AtasCandidato->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('AtasCandidato.' . $this->AtasCandidato->primaryKey => $id));
			$this->request->data = $this->AtasCandidato->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $candidato = null) {
		$this->AtasCandidato->id = $id;
		if (!$this->AtasCandidato->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AtasCandidato->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller'=>'candidatos', 'action' => 'view', $candidato));
	}

    public function impressao($id = null){
        $this->layout = 'impressao';
		$options = array('conditions' => array('AtasCandidato.' . $this->AtasCandidato->primaryKey => $id));
		$this->set('ata', $this->AtasCandidato->find('first', $options));
    }
}
