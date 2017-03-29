<?php
App::uses('AppController', 'Controller');
/**
 * Atas Controller
 *
 * @property Ata $Ata
 * @property PaginatorComponent $Paginator
 */
class AtasController extends AppController {

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
        $colaborador = $this->Session->read('Auth.User.colaborador_id');
        $this->DataTable->settings = array(
            'Cliente' => array(
                'model' => 'Ata',
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'order' => array('data desc'),
                'columns' => array(
                    'Cliente.razao_social' => array('label' => 'Cliente'),
                    'tipo',
                    'titulo',
                    'data',
                    'User.nome' => array('label' => 'Cadastro por'),
                    'Ações' => null
                ),
                'fields' => array('id', 'termino'),
            ),
            'Interna' => array(
                'model' => 'Ata',
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'order' => array('data desc'),
                'columns' => array(
                    'tipo',
                    'titulo' => array('label' => 'Título'),    
                    'data',
                    'repsonsavel_contato' => array('label' => 'Contato'),
                    'User.nome' => array('label' => 'Criada por'),
                    'Ações' => null
                ),
                'joins' => array(array(
                                       'table' => 'atas_colaboradores',
                                        'alias' => 'AtasColaborador',
                                        'type' => 'INNER',
                                        'conditions' => array('Ata.id = AtasColaborador.ata_id', "AtasColaborador.colaborador_id = $colaborador")
                                       ),
                ),
                'fields' => array('id', 'termino', 'User.id'),
            ),
        );
	}

    public $uses = array('Ata', 'Colaborador');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ata->recursive = 0;
		$this->set('atas', $this->Paginator->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function clientes() {
        $this->DataTable->setViewVar('Cliente');
	}

/**
 * index method
 *
 * @return void
 */
	public function internas() {
        $this->DataTable->setViewVar('Interna');
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ata->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$options = array('conditions' => array('Ata.' . $this->Ata->primaryKey => $id));
		$this->set('ata', $this->Ata->find('first', $options));
	}

	public function view_interna($id = null) {
		if (!$this->Ata->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$options = array('conditions' => array('Ata.' . $this->Ata->primaryKey => $id));
		$this->set('ata', $this->Ata->find('first', $options));
	}

	public function view_modal($id = null) {
	    $this->layout = 'ajax';
		$options = array('conditions' => array('Ata.' . $this->Ata->primaryKey => $id));
		$this->set('ata', $this->Ata->find('first', $options));
	}

/**
 * add_interna method
 *
 * @return void
 */
	public function add_interna() {
		if ($this->request->is('post')) {
			
			$this->Ata->create();
            $this->request->data['Ata']['user_id'] = $this->Session->read('Auth.User.id');
            $this->request->data['Ata']['interna'] = 'S';

			$dados_arquivo = array();

			if(count($this->request->data['Ata']['arquivo']) > 0){
				$dados_arquivo = $this->request->data['Ata']['arquivo'];
				$this->request->data['Ata']['arquivo'] = $this->request->data['Ata']['arquivo']['name'];
			}
			
			if ($this->Ata->save($this->request->data)) {
				
				if(count($dados_arquivo) > 0){

					$id = $this->Ata->id;	

					$this->Ata->id=$id;
					$this->Ata->saveField("dir",$id);					

					$dir = WWW_ROOT.'files/ata/arquivo/'.$id;
					$anexo = $dir.'/'.$dados_arquivo['name'];
					
					if (!is_dir($dir)) {
						mkdir($dir, 0777);
					}

					if (move_uploaded_file($dados_arquivo['tmp_name'], $anexo)){
						
					}else{
						$this->Session->setFlash(__('Não foi possível fazer upload do arquivo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
					}
				}

                $tarefas = array();
                foreach($this->request->data['Tarefa'] as $key=>$dados){
                    if(!empty($dados['tarefa'])){
                      $tarefas[$key]['Tarefa'] = $dados;
                      $tarefas[$key]['Tarefa']['ata_id'] = $this->Ata->id;
                      $tarefas[$key]['Tarefa']['user_id'] = $this->Session->read('Auth.User.id');
                      if(empty($dados['status'])){
                        $tarefas[$key]['Tarefa']['status'] = 'P';
                      }
                    }
                }
                if(!empty($tarefas)){
			        $this->Ata->Tarefa->create();
			        $this->Ata->Tarefa->saveAll($tarefas);
                    $tarefas_ids = $this->Ata->Tarefa->inserted_ids; //contains insert_ids
                    foreach($tarefas_ids as $key => $tarefa){
                        $this->envia_alerta_tarefa($tarefa, 'N');
                    }
                }
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'view_interna', $this->Ata->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
        $colaboradores = $this->Colaborador->find('list', array('conditions'=>array('Colaborador.ativo'=>'S'), 'order'=>'Colaborador.nome'));
        $this->set(compact('colaboradores'));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ata->create();
            $this->request->data['Ata']['user_id'] = $this->Session->read('Auth.User.id');
			if ($this->Ata->save($this->request->data)) {
                $tarefas = array();
                foreach($this->request->data['Tarefa'] as $key=>$dados){
                    if(!empty($dados['tarefa'])){
                      $tarefas[$key]['Tarefa'] = $dados;
                      $tarefas[$key]['Tarefa']['ata_id'] = $this->Ata->id;
                      if(empty($dados['status'])){
                        $tarefas[$key]['Tarefa']['status'] = 'P';
                      }
                    }
                }
                if(!empty($tarefas)){
			        $this->Ata->Tarefa->create();
			        $this->Ata->Tarefa->saveAll($tarefas);
                }
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->Ata->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
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
		if (!$this->Ata->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ata->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->Ata->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Ata.' . $this->Ata->primaryKey => $id));
			$this->request->data = $this->Ata->find('first', $options);
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit_interna($id = null) {
		if (!$this->Ata->exists($id)) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$dados_arquivo = array();
			
			if(count($this->request->data['Ata']['arquivo']) > 0 && !empty($this->request->data['Ata']['arquivo']['name'])){ 
				$dados_arquivo = $this->request->data['Ata']['arquivo'];
				$this->request->data['Ata']['arquivo'] = $this->request->data['Ata']['arquivo']['name'];
			}
			
			$id = $this->request->data['Ata']['id'];
			$this->request->data['Ata']['dir'] = $this->request->data['Ata']['id'];

			if(count($dados_arquivo) > 0){						

					$dir = WWW_ROOT.'files/ata/arquivo/'.$id;
					$anexo = $dir.'/'.$dados_arquivo['name'];
					
					if (!is_dir($dir)) {
						mkdir($dir, 0777);
					}

					if (move_uploaded_file($dados_arquivo['tmp_name'], $anexo)){

					    $ata = $this->Ata->find('first', array('conditions' => array('Ata.id' => $id)));;
						
						if(!empty($ata['Ata']['arquivo'])){
							$diretorio = $dir."/".$ata['Ata']['arquivo'];
							if (file_exists($diretorio)) {
								unlink($diretorio);
							}
						}
						
					}else{
						$this->Session->setFlash(__('Não foi possível fazer upload do arquivo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
					}
				}		
			
			if ($this->Ata->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view_interna', $this->Ata->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Ata.' . $this->Ata->primaryKey => $id));
			$this->request->data = $this->Ata->find('first', $options);
		}
        $colaboradores = $this->Colaborador->find('list', array('order'=>'Colaborador.nome'));
        $this->set(compact('colaboradores'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $cliente = null) {
		$this->Ata->id = $id;
		if (!$this->Ata->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ata->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller'=>'clientes', 'action' => 'view', $cliente, '#'=>'atas'));
	}

	public function delete_interna($id = null) {
		$this->Ata->id = $id;
		if (!$this->Ata->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ata->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'internas'));
	}

    public function impressao($id = null){
        $this->layout = 'impressao';
		$options = array('conditions' => array('Ata.' . $this->Ata->primaryKey => $id));
		$this->set('ata', $this->Ata->find('first', $options));
    }
}
