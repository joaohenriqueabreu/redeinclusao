<?php

App::uses('AppController', 'Controller');

/**
 * Tarefas Controller
 *
 */
class TarefasController extends AppController {

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
        $this->Tarefa->recursive = 0;
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
        $options = array('conditions' => array('Tarefa.' . $this->Tarefa->primaryKey => $id));
        $this->set('tarefa', $this->Tarefa->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($cliente = null, $levantamento = null, $ata = null) {
        $this->layout = 'ajax';
        if (isset($_GET['cliente'])) {
            $cliente = $_GET['cliente'];
        }

        if (isset($_GET['ata'])) {
            $ata = $_GET['ata'];
            $nome_ata = $this->Ata->find('first', array('fields' => 'titulo', 'conditions' => array('Ata.id' => $ata)));
        }

        if (isset($_GET['ata_candidato'])) {
            $ata_candidato = $_GET['ata_candidato'];
        } else {
            $ata_candidato = null;
        }

        $colaboradores = $this->Tarefa->Colaborador->find('list', array('conditions' => array('Colaborador.ativo' => 'S'), 'order' => 'Colaborador.nome'));
        $this->set(compact('colaboradores', 'levantamento', 'cliente', 'ata', 'ata_candidato', 'nome_ata'));
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
        $options = array('conditions' => array('Tarefa.' . $this->Tarefa->primaryKey => $id));
        $this->request->data = $this->Tarefa->find('first', $options);
        $colaboradores = $this->Tarefa->Colaborador->find('list', array('conditions' => array('Colaborador.ativo' => 'S'), 'order' => 'Colaborador.nome'));
        $this->set(compact('colaboradores'));
    }

    /**
     * save method
     *
     * @return void
     */
    public function salva() {
        $this->autoRender = false;
//        $this->envia_alerta_tarefa(303, 'N');
//        exit();
        if ($this->request->is('post') || $this->request->is('put')) {
            
            if ($this->request->data['Tarefa']['acao'] == 'add') {
                
                
                $dados_arquivo = array();

				if(count($this->request->data['Tarefa']['anexo']) > 0){
					$dados_arquivo = $this->request->data['Tarefa']['anexo'];
					//$this->request->data['Acao']['anexo'] = $this->request->data['Acao']['anexo']['name'];
				}		
                
                
                $this->request->data['Tarefa']['user_id'] = $this->Session->read('Auth.User.id');
                $this->request->data['Tarefa']['anexo'] = $this->request->data['Tarefa']['anexo']['name'];
                $this->Tarefa->create();
            } else {

              //  print_r($this->request->data);
              //  exit;

                $id = $this->request->data['Tarefa']['id'];
                $this->Tarefa->id = $id;
                if (isset($this->request->data['Tarefa']['remover_anexo']) and $this->request->data['Tarefa']['remover_anexo'] == 1) {
                    $dir = $this->pathWebroot . 'files/tarefa/anexo/' . $id;
                    $anexo = $dir . '/' . $this->request->data['Tarefa']['nome_anexo'];
                    if (file_exists($anexo)) {
                        $this->rrmdir($dir);
                        $this->request->data['Tarefa']['anexo'] = NULL;
                    }
                }else{
                   // $this->request->data['Tarefa']['anexo'] = $this->request->data['Tarefa']['anexo']['name'];
                    $this->request->data['Tarefa']['dir'] = $this->request->data['Tarefa']['id'];

                    $id = $this->request->data['Tarefa']['id'];
                    
                    $dados_arquivo = array();

					if(count($this->request->data['Tarefa']['anexo']) > 0 && !empty($this->request->data['Tarefa']['anexo']['name'])){
						$dados_arquivo = $this->request->data['Tarefa']['anexo'];
						$this->request->data['Tarefa']['anexo'] = $this->request->data['Tarefa']['anexo']['name'];
					}	                   

                    if(count($dados_arquivo) > 0){

					$dir = WWW_ROOT.'files/tarefa/anexo/'.$id;
					$anexo = $dir.'/'.$dados_arquivo['name'];
					
					if (!is_dir($dir)) {
						mkdir($dir, 0777);
					}

					if (move_uploaded_file($dados_arquivo['tmp_name'], $anexo)){
						$tarefa = $this->Tarefa->find('first', array('conditions' => array('Tarefa.id' => $id)));
                        
                        if(!empty($tarefa['Tarefa']['anexo'])){
                        
                            $diretorio = $dir."/".$tarefa['Tarefa']['anexo'];
                            
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

            if ($this->Tarefa->save($this->request->data)) {
               // print_r($this->request->data);
               // exit;

                if ($this->request->data['Tarefa']['acao'] == 'add') {
                   /* $id = $this->Tarefa->id;
                    $this->request->data['Tarefa']['dir'] = $id;
                    $dir = $this->pathWebroot.'files/tarefa/anexo/'.$id;
                    $anexo = $dir.'/'.$this->request->data['Tarefa']['anexo'];

                    $this->Tarefa->id=$id;
                    $this->Tarefa->saveField("dir",$id);


                    if(file_exists($anexo)){ 
                        $this->rrmdir($dir);
                        $this->request->data['Tarefa']['arquivo'] = NULL;
                    }*/
                    if(count($dados_arquivo) > 0){

					$id = $this->Tarefa->id;	

					$this->Tarefa->id=$id;
					$this->Tarefa->saveField("dir",$id);					

					$dir = WWW_ROOT.'files/tarefa/anexo/'.$id;
					$anexo = $dir.'/'.$dados_arquivo['name'];
					
					if (!is_dir($dir)) {
						mkdir($dir, 0777);
					}

					if (move_uploaded_file($dados_arquivo['tmp_name'], $anexo)){
						
					}else{
						$this->Session->setFlash(__('Não foi possível fazer upload do arquivo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
					}
				}

                    $this->envia_alerta_tarefa($this->Tarefa->id, 'N');

                } else {
                    if (!empty($this->request->data['Tarefa']['user_id'])) {
                        if ($this->request->data['Tarefa']['status_atual'] <> $this->request->data['Tarefa']['status']) {
                            if ($this->request->data['Tarefa']['status'] == 'F') {
                                $this->envia_alerta_tarefa($this->Tarefa->id, 'F');
                            } else {
                                $this->envia_alerta_tarefa($this->Tarefa->id, 'A');
                            }
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
        $this->Tarefa->id = $id;
        if (!$this->Tarefa->exists()) {
            throw new NotFoundException(__('Cadastro inválido.'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Tarefa->delete()) {
            $this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect('/tarefas/minhas_tarefas');
    }

    public function minhas_tarefas() {
        $tarefasColaborador = $this->Tarefa->find('all', array(
            'conditions' => array(
                'Tarefa.colaborador_id' => $this->Session->read('Auth.User.colaborador_id'))));
        $this->set(compact('tarefasColaborador'));
    }

    public function plano_acao($cliente = null) {
        $this->layout = 'pdf';
        $tarefas = $this->Tarefa->find('all', array('conditions' => array('Tarefa.cliente_id' => $cliente)));
        $this->set(compact('tarefas'));
    }

    public function tarefas_equipe() {
        if (isset($_GET['colaborador_id'])) {
            $tarefasColaborador = $this->Tarefa->find('all', array('conditions' => array('Tarefa.colaborador_id' => $_GET['colaborador_id'])));
            $this->set(compact('tarefasColaborador'));
        }
        $colaboradores = $this->Tarefa->Colaborador->find('list', array('conditions' => array('Colaborador.ativo' => 'S'), 'order' => 'Colaborador.nome'));
        $this->set(compact('colaboradores'));
    }

}
