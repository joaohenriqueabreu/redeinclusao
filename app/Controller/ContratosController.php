<?php
App::uses('AppController', 'Controller');
/**
 * Contratos Controller
 *
 * @property Contrato $Contrato
 */

App::import('Helper', 'Util');

class ContratosController extends AppController {

    public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('verifica_cnpj', 'datasCronograma');
        $conditions = array();
        if(isset($this->params->query['Conditions']) && !empty($this->params->query['Conditions'])){
            $conditions = $this->params->query['Conditions'];
        }
        $this->DataTable->settings = array(
            'Contrato' => array(
                'autoRender' => false,
                'autoData' => false,
                'order' => array('Contrato.inicio_vigencia desc'),
                'conditions' => $conditions,
                'columns' => array(
                    'Cliente.razao_social' => array('label' => 'Cliente'),
                    'data',
                    'inicio_vigencia' => array('label' => 'Vigência'),
                    'numero_cota' => array('label' => 'Nº de Cotas'),
                    'status',
                    'User.nome' => array('label' => 'Usuário' ),
                    'Ações' => null
                ),
                'fields' => array('id', 'termino_vigencia'),
            ),
        );
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->DataTable->setViewVar('Contrato');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        $this->layout = 'ajax';
		$this->Contrato->id = $id;
		$this->set('contrato', $this->Contrato->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($cliente = null) {
        $this->layout = 'ajax';
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
		$this->Contrato->id = $id;
		$this->request->data = $this->Contrato->read(null, $id);
    }

    public function salva(){
        $this->autoRender = false;
		if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['Contrato']['acao'] == 'add'){
                $this->request->data['Contrato']['user_id'] = $this->Session->read('Auth.User.id');
                $this->request->data['Contrato']['status'] = 'A';
			    $this->Contrato->create();
            }else{
		        $id = $this->request->data['Contrato']['id'];
                $this->Contrato->id = $id;
                if($this->request->data['Contrato']['status_atual'] <> $this->request->data['Contrato']['status']){
                    $this->request->data['Contrato']['data_troca_status'] = date('Y-m-d');
                }
                if(isset($this->request->data['Contrato']['remover_arquivo']) and $this->request->data['Contrato']['remover_arquivo'] == 1){
                    $dir = $this->pathWebroot.'files/contrato/anexo/'.$id;
                    $anexo = $dir.'/'.$this->request->data['Contrato']['nome_arquivo'];
                    if(file_exists($anexo)){
                      $this->rrmdir($dir);
                      $this->request->data['Contrato']['anexo'] = NULL;
                    }
                }
            }
			if($this->Contrato->save($this->request->data)) {
                return 1;
			} else {
				return 0;
			}
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
		$this->Contrato->id = $id;
		if (!$this->Contrato->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->Contrato->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso!'), 'default', array('class' => 'alert alert-success'));
		    $this->redirect($_SERVER['HTTP_REFERER']);
		}
		$this->Session->setFlash(__('Cadastro não removido.'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect($_SERVER['HTTP_REFERER']);
	}

    public function contratos_periodos(){
        if(!empty($_GET['data_inicio']) and !empty($_GET['data_prevista_termino'])){
            $util = new UtilHelper(new View());
            $this->paginate = array(
                    'conditions'=>array(
                        'Contrato.termino_vigencia >='=>$util->format_date2($_GET['data_inicio']),
                        'Contrato.termino_vigencia <='=>$util->format_date2($_GET['data_prevista_termino']),
                    ),
                    'order'=>array('Contrato.termino_vigencia'=>'desc'),
                    'recursive'=>0
                );
            $this->set('contratos', $this->paginate());
        }
    }
}