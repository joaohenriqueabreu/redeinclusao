<?php

App::uses('AppController', 'Controller');

/**
 * RespostasLevantamentos Controller
 *
 * @property RespostasLevantamento $RespostasLevantamento
 * @property PaginatorComponent $Paginator
 */
class RespostasLevantamentosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->RespostasLevantamento->recursive = 0;
        $this->set('respostasLevantamentos', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($chave = null) {
        if (isset($this->params['ext']) and $this->params['ext'] == 'pdf') {
            $this->layout = 'pdf';
        } else {
            $this->layout = 'questionario';
        }
        $options = array('conditions' => array('RespostasLevantamento.chave' => $chave));
        $this->set('respostasLevantamento', $this->RespostasLevantamento->find('all', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($cliente) {
        if ($this->request->is('post')) {
            $respostas = array();
            $cliente = $this->request->data['RespostasLevantamento']['cliente_id'];
            $chave = $cliente . date('YmdHis');
            if (!empty($this->request->data['RespostasLevantamento']['Respostas'])) {
                foreach ($this->request->data['RespostasLevantamento']['Respostas'] as $tipo => $questao) {
                    list($pergunta, $resposta) = explode('#', $questao['resposta']);
                    if ($resposta <> '') {
                        $respostas[]['RespostasLevantamento'] = array('cliente_id' => $cliente,
                            'chave' => $chave,
                            'tipo_pergunta_levantamento_id' => $tipo,
                            'pergunta_levantamento_id' => $pergunta,
                            'resposta' => $resposta,
                            'user_id' => $this->Session->read('Auth.User.id'));
                    }
                }
            }
            if (!empty($respostas)) {
                $this->RespostasLevantamento->create();
                if ($this->RespostasLevantamento->saveAll($respostas)) {
                    $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'view', $chave));
                } else {
                    $this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
                }
            } else {
                $this->Session->setFlash(__('O Questionário deve ser preenchido para ser salvo.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        if (!empty($cliente)) {
            $cliente = $this->RespostasLevantamento->Cliente->find('first', array('fields' => array('Cliente.id', 'Cliente.razao_social'), 'conditions' => array('Cliente.id' => $cliente), 'recursive' => 0));
        }
        $perguntasLevantamentos = $this->RespostasLevantamento->PerguntasLevantamento->find('all', array('conditions' => array('PerguntasLevantamento.ativa' => 'S'), 'order' => array('TiposPerguntasLevantamento.nome asc', 'PerguntasLevantamento.peso desc'), 'recursive' => 0));
        $this->set(compact('cliente', 'perguntasLevantamentos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($chave = null) {
        if ($this->request->is('post') || $this->request->is('put')) {

            if (!empty($this->request->data['RespostasLevantamento']['Respostas'])) {
                $cliente = $this->request->data['RespostasLevantamento']['cliente_id'];
                $chave = $this->request->data['RespostasLevantamento']['chave'];
                $usuario = $this->request->data['RespostasLevantamento']['user_id'];
                $created = $this->request->data['RespostasLevantamento']['created'];
                foreach ($this->request->data['RespostasLevantamento']['Respostas'] as $tipo => $questao) {
                    list($id, $pergunta, $resposta) = explode('#', $questao['resposta']);
                    if (empty($id)) {
                        $id = NULL;
                    }
                    if ($resposta <> '') {
                        $respostas[]['RespostasLevantamento'] = array('id' => $id,
                            'cliente_id' => $cliente,
                            'chave' => $chave,
                            'tipo_pergunta_levantamento_id' => $tipo,
                            'pergunta_levantamento_id' => $pergunta,
                            'resposta' => $resposta,
                            'created' => $created,
                            'user_id' => $usuario);
                    }
                }
            }
            if (!empty($respostas)) {
                $this->RespostasLevantamento->create();
                //$this->RespostasLevantamento->deleteAll(array('RespostasLevantamento.chave' => $chave), false);
                if ($this->RespostasLevantamento->saveAll($respostas)) {
                    $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'view', $chave));
                } else {
                    $this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
                }
            } else {
                $this->Session->setFlash(__('O Questionário deve ser preenchido para ser salvo.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('RespostasLevantamento.chave' => $chave), 'recursive' => -1);
            $respostas = $this->RespostasLevantamento->find('all', $options);
        }
        $cliente = $this->RespostasLevantamento->Cliente->find('first', array('fields' => array('Cliente.id', 'Cliente.razao_social'), 'conditions' => array('Cliente.id' => $respostas[0]['RespostasLevantamento']['cliente_id']), 'recursive' => 0));
        $perguntasLevantamentos = $this->RespostasLevantamento->PerguntasLevantamento->find('all', array('conditions' => array('PerguntasLevantamento.ativa' => 'S'), 'order' => array('TiposPerguntasLevantamento.nome asc', 'PerguntasLevantamento.peso desc'), 'recursive' => 0));
        $this->set(compact('cliente', 'perguntasLevantamentos', 'respostas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($chave = null, $projeto = null) {
        if ($this->RespostasLevantamento->deleteAll(array('RespostasLevantamento.chave' => $chave), false)) {
            $this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('controller' => '', 'action' => 'view', $projeto));
    }

    public function grafico($cliente, $chave = null) {
        $this->layout = 'ajax';
        $conditions = array('RespostasLevantamento.cliente_id' => $cliente);
        if (!empty($chave)) {
            $conditions = array('RespostasLevantamento.chave' => $chave);
        }
        $primeiraChave = $this->RespostasLevantamento->find('first', array('fields' => array('RespostasLevantamento.chave'), 'conditions' => array('RespostasLevantamento.cliente_id' => $cliente), 'recursive' => -1));
        $this->RespostasLevantamento->filterBindings(array('Cliente'));
        $this->RespostasLevantamento->filterBindings(array('Tarefa'));
        $respostas = $this->RespostasLevantamento->find('all', array('conditions' => $conditions, 'recursive' => 0));
        $tiposPerguntas = $this->RespostasLevantamento->PerguntasLevantamento->TiposPerguntasLevantamento->find('all', array('order' => 'TiposPerguntasLevantamento.nome', 'recursive' => -1));
        $cliente = $this->RespostasLevantamento->Cliente->find('first', array('fields' => array('Cliente.razao_social'), 'conditions' => array('Cliente.id' => $cliente), 'recursive' => 0));
        $this->set(compact('respostas', 'tiposPerguntas', 'cliente', 'primeiraChave'));
    }

    /**
     * salva method
     *
     * @return void
     */
    public function salva() {
        $this->autoRender = false;
        $return = 1;
        foreach ($this->request->data['RespostasLevantamento'] as $questionario => $dados) {
        	$dados['validacao'] = str_replace("'", "\\'", $dados['validacao']);
        	
            if (!$this->RespostasLevantamento->updateAll(
                            array('RespostasLevantamento.validacao' => "'" . $dados['validacao'] . "'"), array('RespostasLevantamento.id' => $questionario)
                    )) {
                $return = 0;
            }
        }
        return $return;
    }

}
