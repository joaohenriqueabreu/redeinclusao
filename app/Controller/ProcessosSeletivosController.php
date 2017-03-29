<?php
App::uses('AppController', 'Controller');
/**
 * ProcessosSeletivos Controller
 *
 * @property ProcessosSeletivo $ProcessosSeletivo
 */
class ProcessosSeletivosController extends AppController {

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
            'ProcessosSeletivo' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'order' => array('ProcessosSeletivo.id desc'),
                'columns' => array(
                    'Vaga.cliente_id'=> array('label' => 'Cliente'),
                    'Vaga.cargo' => array('label' => 'Cargo'),
                    'Candidato.nome' => array('label' => 'Candidato'),
                    'resultado'=>array('label'=>'Resultado'),
                    'Deficiências' => null,
                    'observacoes'=>array('label'=>'Observações', 'bSortable'=>false)
                ),
                'fields' => array('Vaga.deficiencia_auditiva', 'Vaga.deficiencia_fisica', 'Vaga.deficiencia_intelectual', 'Vaga.deficiencia_visual', 'Vaga.reabilitado'),
            ),
        );
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
       $this->DataTable->setViewVar(array('ProcessosSeletivo'));
	}


/**
 * index method
 *
 * @return void
 */
	public function candidatos_contratados() {
        $this->DataTable->setViewVar(array('Aprovados'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProcessosSeletivo->id = $id;
		if (!$this->ProcessosSeletivo->exists()) {
			throw new NotFoundException(__('Invalid processos seletivo'));
		}
		$this->set('processosSeletivo', $this->ProcessosSeletivo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProcessosSeletivo->create();
			if ($this->ProcessosSeletivo->save($this->request->data)) {
				$this->Session->setFlash(__('The processos seletivo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The processos seletivo could not be saved. Please, try again.'));
			}
		}
		$candidatos = $this->ProcessosSeletivo->Candidato->find('list');
		$vagas = $this->ProcessosSeletivo->Vaga->find('list');
		$this->set(compact('candidatos', 'vagas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	    $this->layout = 'ajax';
	    $this->request->data = $this->ProcessosSeletivo->read(null, $id);
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
		$this->ProcessosSeletivo->id = $id;
		if (!$this->ProcessosSeletivo->exists()) {
			throw new NotFoundException(__('Processo seletivo inválido'));
		}
		if ($this->ProcessosSeletivo->delete()) {
			$this->Session->setFlash(__('Candidato removido do processo seletivo'), 'default', array('class' => 'alert alert-success'));
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
		$this->Session->setFlash(__('O candidato não foi removido do processo seletivo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect($_SERVER['HTTP_REFERER']);
	}

    public function salva(){
        $this->autoRender = false;
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->ProcessosSeletivo->save($this->request->data)) {
                return 1;
			} else {
				return 0;
			}
		}
    }

    public function salva_candidato(){
		$this->autoRender = false;
        $dados['ProcessosSeletivo'] = array('candidato_id'=>$_POST['candidato'], 'vaga_id'=>$_POST['vaga']);
    	$this->ProcessosSeletivo->create();
    	if ($this->ProcessosSeletivo->save($dados)) {
    	    echo 1;
    	}else{
    	    echo 0;
    	}

    }
}
