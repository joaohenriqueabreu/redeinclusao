<?php
App::uses('AppController', 'Controller');
/**
 * Perguntas Controller
 *
 * @property Pergunta $Pergunta
 */
class PerguntasController extends AppController {

	var $uses = array('Pergunta', 'Questionario', 'TiposPergunta', 'Alternativa', 'Opcao', 'Resposta');


    public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('atualiza_ordem');
	}

	public function index(){
		$this->Pergunta->recursive = -1;
		$this->set("perguntas",$this->paginate('Pergunta'));
	}

	public function view($id = null) {
		$this->Pergunta->id = $id;
		if (!$this->Pergunta->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		$this->set('pergunta', $this->Pergunta->read(null, $id));
	}

	public function add($idQuestionario=null){
		if(!empty($this->data)):
			if($this->Pergunta->save($this->data['Pergunta'])){
				$perguntaId = $this->Pergunta->getInsertId();
				$dados = array('questionario_id'=>$this->data['Pergunta']['questionario_id'],'pergunta_id'=>$perguntaId);
				if(isset($this->data['Alternativa']) && is_array($this->data['Alternativa'])){
					foreach($this->data['Alternativa'] as $key=>$alternativa){
						$this->request->data['Alternativa'][$key] = am($alternativa,$dados);
					}
					$this->Alternativa->saveAll($this->data['Alternativa']);
				}
				if(isset($this->data['Opcao']) && is_array($this->data['Opcao'])){
					foreach($this->data['Opcao'] as $key=>$opcao){
						$this->request->data['Opcao'][$key] = am($opcao,$dados);
					}
					$this->Opcao->saveAll($this->data['Opcao']);
				}
			    $this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('controller'=>'questionarios', 'action'=>'view', $idQuestionario));
			}else{
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		endif;
		$this->set("questionarios",$this->Questionario->find('list'));
		$this->set("tiposPerguntas",$this->TiposPergunta->find('list', array('order'=>array('nome'))));
		$this->set("idQuestionario",$idQuestionario);
	}

	public function edit($idPergunta=null,$idQuestionario=null){
		if (!$idPergunta && empty($this->data)) {
			throw new NotFoundException(__('Cadastro inválido.'));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Pergunta->save($this->data)) {
				$dados = array('questionario_id'=>$this->data['Pergunta']['questionario_id'],'pergunta_id'=>$this->data['Pergunta']['id']);
				if(isset($this->data['Alternativa']) && is_array($this->data['Alternativa'])){
					foreach($this->data['Alternativa'] as $key=>$alternativa){
						$this->request->data['Alternativa'][$key] = am($alternativa,$dados);
					}
					$this->Alternativa->saveAll($this->data['Alternativa']);
				}
				if(isset($this->data['Opcao']) && is_array($this->data['Opcao'])){
					foreach($this->data['Opcao'] as $key=>$opcao){
						$this->request->data['Opcao'][$key] = am($opcao,$dados);
					}
					$this->Opcao->saveAll($this->data['Opcao']);
				}
			    $this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('controller'=>'questionarios', 'action'=>'view', $this->data['Pergunta']['questionario_id']));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		if (empty($this->data)) {
			$this->request->data = $this->Pergunta->read(null, $idPergunta);
		}
		$this->set("questionarios",$this->Questionario->find('list'));
		$this->set("tiposPerguntas",$this->TiposPergunta->find('list'));
	}

    public function salva(){
        $this->autoRender = false;
        $this->Pergunta->create();
        if ($this->Pergunta->save($this->request->data)) {
            return 1;
        }else{
            return 0;
        }
    }

	public function deleteOpcao($id=null){
		$this->layout=false;
		$this->autoRender=false;
		$id=base64_decode($id);
		$this->Opcao->delete($id);
	}

	public function deleteAlternativa($id=null){
		$this->layout=false;
		$this->autoRender=false;
		$id=base64_decode($id);
		$this->Alternativa->delete($id);
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Pergunta->id = $id;
		if (!$this->Pergunta->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
        $pergunta = $this->Pergunta->find('first', array('fields'=>'questionario_id', 'conditions'=>array('id'=>$id), 'recursive'=>-1));
		if ($this->Pergunta->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('controller'=>'questionarios', 'action' => 'view', $pergunta['Pergunta']['questionario_id']));
		}
		$this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}

    public function atualiza_ordem(){
      $this->autoRender = false;
      $saveAll = true;
      foreach($this->request->data['Pergunta'] as $pergunta => $dados){
         if(!$this->Pergunta->updateAll(array('Pergunta.ordem'=>$dados), array('Pergunta.id'=>$pergunta))) {
              $saveAll = false;
          }
        }
      if($saveAll == true){
        echo 1;
      }else{
        echo 0;
      }
    }
}
