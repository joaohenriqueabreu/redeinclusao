<?php
App::uses('AppController', 'Controller');
/**
 * Tarefas Controller
 *
 */
class AcoesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter() {        
        $this->loadModel('Ata');
        //$this->_setErrorLayout();
    }


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Acao->recursive = 0;
		$this->set('projetosProcessosAtividades', $this->Paginator->paginate());
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
		$options = array('conditions' => array('Acao.' . $this->Acao->primaryKey => $id));
		$this->set('tarefa', $this->Acao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($tarefa = null) {
	    $this->layout = 'ajax';
        $tarefa = $this->Acao->Tarefa->find('first', array('fields' => array('Tarefa.id', 'Tarefa.tarefa', 'Tarefa.ata_id'), 'conditions' => array('Tarefa.id' => $tarefa)));
        $colaboradores = $this->Acao->Colaborador->find('list', array('conditions'=>array('Colaborador.ativo'=>'S'), 'order'=>'Colaborador.nome'));
		$nome_ata = $this->Ata->find('first', array('fields' => 'titulo', 'conditions' => array('Ata.id' => $tarefa['Tarefa']['ata_id'])));			
		
		$this->set(compact('colaboradores', 'tarefa', 'nome_ata'));
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
		$options = array('conditions' => array('Acao.' . $this->Acao->primaryKey => $id));
		$this->request->data = $this->Acao->find('first', $options);
        $colaboradores = $this->Acao->Colaborador->find('list', array('conditions'=>array('Colaborador.ativo'=>'S'), 'order'=>'Colaborador.nome'));
		$nome_ata = $this->Ata->find('first', array('fields' => 'titulo', 'conditions' => array('Ata.id' => $this->request->data['Tarefa']['ata_id'])));					
        $this->set(compact('colaboradores', 'nome_ata'));
	}

/**
 * save method
 *
 * @return void
 */

    public function salva(){
        $this->autoRender = false;
		if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['Acao']['acao'] == 'add'){

				$dados_arquivo = array();

				if(count($this->request->data['Acao']['anexo']) > 0){
					$dados_arquivo = $this->request->data['Acao']['anexo'];
					//$this->request->data['Acao']['anexo'] = $this->request->data['Acao']['anexo']['name'];
				}				

                $this->request->data['Acao']['user_id'] = $this->Session->read('Auth.User.id');
				$this->request->data['Acao']['anexo'] = $this->request->data['Acao']['anexo']['name'];
			    $this->Acao->create();
            }else{
		        $id = $this->request->data['Acao']['id'];				
                $this->Acao->id = $id;
                if(isset($this->request->data['Acao']['remover_anexo']) and $this->request->data['Acao']['remover_anexo'] == 1){
                    $dir = $this->pathWebroot.'files/acao/anexo/'.$id;
                    $anexo = $dir.'/'.$this->request->data['Acao']['nome_anexo'];
                    if(file_exists($anexo)){
                      $this->rrmdir($dir);
                      $this->request->data['Acao']['anexo'] = NULL;
                    }
                }else{
					//$this->request->data['Acao']['anexo'] = $this->request->data['Acao']['anexo']['name'];
                    $this->request->data['Acao']['dir'] = $this->request->data['Acao']['id'];

                    $id = $this->request->data['Acao']['id'];

					$dados_arquivo = array();

					if(count($this->request->data['Acao']['anexo']) > 0 && !empty($this->request->data['Acao']['anexo']['name'])){
						$dados_arquivo = $this->request->data['Acao']['anexo'];
						$this->request->data['Acao']['anexo'] = $this->request->data['Acao']['anexo']['name'];
					}	                   

                    if(count($dados_arquivo) > 0){

					$dir = WWW_ROOT.'files/acao/anexo/'.$id;
					$anexo = $dir.'/'.$dados_arquivo['name'];
					
					if (!is_dir($dir)) {
						mkdir($dir, 0777);
					}

					if (move_uploaded_file($dados_arquivo['tmp_name'], $anexo)){
						$acao = $this->Acao->find('first', array('conditions' => array('Acao.id' => $id)));
						
						if(!empty($acao['Acao']['anexo'])){
							$diretorio = $dir."/".$acao['Acao']['anexo'];
							
							if (file_exists($diretorio)) {
								unlink($diretorio);
							}
						}
						
					}else{
						$this->Session->setFlash(__('Não foi possível fazer upload do arquivo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
					}
				}
				}
            }
			if($this->Acao->save($this->request->data)) {
				if ($this->request->data['Acao']['acao'] == 'add') {
                    
					
					/*$id = $this->Acao->id;
                    $this->request->data['Acao']['dir'] = $id;
                    $dir = $this->pathWebroot.'files/acao/anexo/'.$id;
                    $anexo = $dir.'/'.$this->request->data['Acao']['anexo'];

                    $this->Acao->id=$id;
                    $this->Acao->saveField("dir",$id);


                    if(file_exists($anexo)){ 
                        $this->rrmdir($dir);
                        $this->request->data['Acao']['arquivo'] = NULL;
                    }*/
					if(count($dados_arquivo) > 0){

					$id = $this->Acao->id;	

					$this->Acao->id=$id;
					$this->Acao->saveField("dir",$id);					

					$dir = WWW_ROOT.'files/acao/anexo/'.$id;
					$anexo = $dir.'/'.$dados_arquivo['name'];
					
					if (!is_dir($dir)) {
						mkdir($dir, 0777);
					}

					if (move_uploaded_file($dados_arquivo['tmp_name'], $anexo)){
						
					}else{
						$this->Session->setFlash(__('Não foi possível fazer upload do arquivo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
					}
				}


                }
                return 1;
			} else {
				return 0;
			}
		}
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Acao->id = $id;
		if (!$this->Acao->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Acao->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect('/tarefas/minhas_tarefas');
	}
}
