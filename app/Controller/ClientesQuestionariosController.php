<?php

App::uses('AppController', 'Controller');
/**
 * ClientesQuestionarios Controller
 *
 * @property ClientesQuestionario $ClientesQuestionario
 */
class ClientesQuestionariosController extends AppController {
    var $uses = array('ClientesQuestionario', 'Questionario');

    public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('salva');
	}

	public function view($id = null) {
		$this->ClientesQuestionario->id = $id;
		if (!$this->ClientesQuestionario->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
        $this->ClientesQuestionario->recursive = 3;
		$this->set('clientesQuestionario', $this->ClientesQuestionario->read(null, $id));
	}

    public function imprimir($id = null) {
        $this->layout = 'ajax';
		$this->ClientesQuestionario->id = $id;
		if (!$this->ClientesQuestionario->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
        $this->ClientesQuestionario->recursive = 3;
		$this->set('clientesQuestionario', $this->ClientesQuestionario->read(null, $id));
	}

	public function add($id = null) {
        if ($this->request->is('post')) {
			$this->ClientesQuestionario->create();
            $this->request->data['ClientesQuestionario']['user_id'] =  $this->Session->read('Auth.User.id');
			if ($this->ClientesQuestionario->save($this->request->data)) {
                if(!empty($this->request->data['Resposta'])){
                    foreach($this->request->data['Resposta'] as $perguntaId => $resposta){
                        if(!empty($resposta['resposta'])){
                            $respostasOpcoes[]['RespostasCliente'] = array(
                                'cliente_questionario_id'=>$this->ClientesQuestionario->id,
                                'pergunta_id'=>$perguntaId,
                                'resposta'=>$resposta['resposta']
                            );
                        }
                    }
                }
                if(!empty($this->request->data['Opcao'])){
                    foreach($this->request->data['Opcao'] as $perguntaId => $respostas){
                        foreach($respostas as $resposta){
                            $respostasOpcoes[]['RespostasCliente'] = array(
                                'cliente_questionario_id'=>$this->ClientesQuestionario->id,
                                'pergunta_id'=>$perguntaId,
                                'opcao_id'=>$resposta['resposta']
                            );
                        }
                    }
                }

			    if(!empty($this->request->data['Alternativa'])){
                    foreach($this->request->data['Alternativa'] as $alternativaId => $alternativa){
                        foreach($alternativa['Opcao'] as $perguntaId => $opcoes){
                            foreach($opcoes as $opcao){
                                $respostasOpcoes[]['RespostasCliente'] = array(
                                    'cliente_questionario_id'=>$this->ClientesQuestionario->id,
                                    'pergunta_id'=>$perguntaId,
                                    'opcao_id'=>$opcao['resposta'],
                                    'alternativa_id'=>$alternativaId
                                );
                            }
                        }
                    }
                }
                if(!empty($respostasOpcoes)){
                    $this->ClientesQuestionario->RespostasCliente->saveAll($respostasOpcoes);
                }
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('controller'=>'clientes', 'action' => 'view', $this->request->data['ClientesQuestionario']['cliente_id']));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$questionarios = $this->Questionario->find('list', array('conditions'=>array('ativo'=>'S'), 'order'=>'titulo'));
        $this->set(compact('questionarios'));
	}

	public function edit($id = null) {
		$this->ClientesQuestionario->id = $id;
		if (!$this->ClientesQuestionario->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            if(!empty($this->request->data['Resposta'])){
                foreach($this->request->data['Resposta'] as $perguntaId => $resposta){
                    if(!empty($resposta['resposta'])){
                        $respostasOpcoes[]['RespostasCliente'] = array(
                            'cliente_questionario_id'=>$this->ClientesQuestionario->id,
                            'pergunta_id'=>$perguntaId,
                            'resposta'=>$resposta['resposta']
                        );
                    }
                }
            }

            if(!empty($this->request->data['Opcao'])){
                foreach($this->request->data['Opcao'] as $perguntaId => $respostas){
                    foreach($respostas as $resposta){
                        $respostasOpcoes[]['RespostasCliente'] = array(
                            'cliente_questionario_id'=>$this->ClientesQuestionario->id,
                            'pergunta_id'=>$perguntaId,
                            'opcao_id'=>$resposta['resposta']
                        );
                    }
                }
            }

            if(!empty($this->request->data['Alternativa'])){
                foreach($this->request->data['Alternativa'] as $alternativaId => $alternativa){
                    foreach($alternativa['Opcao'] as $perguntaId => $opcoes){
                        foreach($opcoes as $opcao){
                            $respostasOpcoes[]['RespostasCliente'] = array(
                                'cliente_questionario_id'=>$this->ClientesQuestionario->id,
                                'pergunta_id'=>$perguntaId,
                                'opcao_id'=>$opcao['resposta'],
                                'alternativa_id'=>$alternativaId
                            );
                        }
                    }
                }
            }
            if(!empty($respostasOpcoes)){
                $this->ClientesQuestionario->RespostasCliente->deleteAll(array('RespostasCliente.cliente_questionario_id'=>$id));
                if($this->ClientesQuestionario->RespostasCliente->saveAll($respostasOpcoes)){
        			$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                    $this->redirect(array('controller'=>'clientes', 'action' => 'view', $this->request->data['ClientesQuestionario']['cliente_id']));
                }else{
				    $this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
                }
            }
		} else {
            $this->ClientesQuestionario->recursive = 3;
			$this->request->data = $this->ClientesQuestionario->read(null, $id);
		}
	}

	public function delete($id = null, $cliente = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ClientesQuestionario->id = $id;
		if (!$this->ClientesQuestionario->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->ClientesQuestionario->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
            if(!empty($cliente)){
                $this->redirect(array('controller'=>'clientes', 'action' => 'view', $cliente));
            }else{
			    $this->redirect($_SERVER['HTTP_REFERER']);
            }
		}
		$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect($_SERVER['HTTP_REFERER']);
	}
}
