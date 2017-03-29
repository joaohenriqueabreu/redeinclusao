<?php

App::uses('AppController', 'Controller');

/**

 * Vagas Controller

 *

 * @property Vaga $Vaga

 */

class VagasController extends AppController {

    var $status = array('A'=>'Ativa', 'C'=>'Cancelada', 'P'=>'Preenchida');
    var $sexo = array('A'=>'Ambos', 'M'=>'Masculino', 'F'=>'Feminino');
    var $uses = array('Vaga', 'Candidato');
    var $resultadoProcesso = array('NC'=>'Não Concluído', 'NCA'=>'Não Concluiu Avaliação', 'D'=>'Desistiu', 'R'=>'Reprovada', 'C'=>'Contratada');
    var $resultadoEtapasProcesso = array('NR'=>'Não Realizado', 'A'=>'Aprovada', 'NC'=>'Não Compareceu', 'R'=>'Reprovada');



    public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('verifica_cnpj');
        $conditions = array();
        if(isset($this->params->query['Conditions']) && !empty($this->params->query['Conditions'])){
            $conditions = $this->params->query['Conditions'];
        }
        $this->DataTable->settings = array(
            'Vaga' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'columns' => array(
                    'Cliente.razao_social' => array('label' => 'Cliente'),
                    'cargo',
                    'numero_vagas' => array('label' => 'Quantidade', 'orderable' => false),
                    'salario' => array('label' => 'Salário'),
                    'sexo' => array('orderable' => false),
                    'status' => array('orderable' => false),
                    'created' => array('label'=>'Inclusa em'),
                    'Ações' => null
                ),
                'fields' => array('id'),
            ),
            'ProcessosSeletivo' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'order' => array('ProcessosSeletivo.id desc'),
                'columns' => array(
                    'Candidato.nome'=>array('label'=>'Candidato'),
                    'entrevista_triagem'=>array('label'=>'Triagem', 'bSortable'=>false),
                    'entrevista_psicologica'=>array('label'=>'Psicológica', 'bSortable'=>false),
                    'entrevista_tecnica'=>array('label'=>'Técnica', 'bSortable'=>false),
                    'teste_psicologica'=>array('label'=>'Avaliação Psicológica', 'bSortable'=>false),
                    'exame_medico_admissional'=>array('label'=>'Exame Médico Admissional', 'bSortable'=>false),
                    'resultado'=>array('label'=>'Resultado'),
                    'observacoes'=>array('label'=>'Observações', 'bSortable'=>false),
                    'Ações' => null
                ),
                'fields' => array('id'),
            ),
            'Candidato' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'columns' => array(
                    'nome',
                    'data_nascimento' => array('label' => 'Nascimento'),
                    'telefone' => array('label' => 'Telefone(s)'),
                    'bairro',
                    'cidade',
                    'possui_deficiencia_auditiva'=>array('label'=>'Auditiva'),
                    'possui_deficiencia_fisica'=>array('label'=>'Fisíca'),
                    'possui_deficiencia_intelectual'=>array('label'=>'Intelectual'),
                    'possui_deficiencia_visual'=>array('label'=>'Visual'),
                    'Ações' => null
                ),
                'fields' => array('id', 'celular_1', 'cpf'),
            ),
        );
	}
/**
 * index method
 *
 * @return void
 */

	public function index($tipo = null) {
        $this->DataTable->setViewVar('Vaga');
	}

/**
 * index method
 *
 * @return void
 */

	public function ativas() {
        $vagas = $this->Vaga->find('all', array('conditions' => array('Vaga.status' => 'A')));
		$this->set('vagas', $vagas);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function view($id = null) {
        $this->DataTable->setViewVar(array('ProcessosSeletivo', 'Candidato'));
		$this->Vaga->id = $id;
		if (!$this->Vaga->exists()) {
			throw new NotFoundException(__('Vaga inválida'));
		}
        $vaga = $this->Vaga->read(null, $id);
        $conditions = array();

        $conditions['Candidato.possui_deficiencia_auditiva'] = $vaga['Vaga']['deficiencia_auditiva'];
        $conditions['Candidato.possui_deficiencia_fisica'] = $vaga['Vaga']['deficiencia_fisica'];
        $conditions['Candidato.possui_deficiencia_intelectual'] = $vaga['Vaga']['deficiencia_intelectual'];
        $conditions['Candidato.possui_deficiencia_visual'] = $vaga['Vaga']['deficiencia_visual'];
        if($vaga['Vaga']['reabilitado'] == 1){
            $conditions['Candidato.condicao_comprimento_cota'] = 'R';
        }
        $candidatosParticipantes = array();
        if(!empty($vaga['ProcessosSeletivo'])){
            foreach($vaga['ProcessosSeletivo'] as $processo){
                $candidatosParticipantes[$processo['candidato_id']] = $processo['candidato_id'];
            }
            $conditions['NOT'] = array('Candidato.id'=>$candidatosParticipantes);
        }
        $candidatos = $this->Candidato->find('count', array('conditions'=>$conditions, 'order'=>'nome', 'recursive'=>-1));
        $escolaridades = $this->Candidato->Escolaridade->find('list', array('order'=>'nome'));
		$pretensoesSalariais = $this->Candidato->PretensoesSalarial->find('all', array('order'=>array('inicial asc')));
        $cidadesGroup = $this->Candidato->find('all', array('fields'=>array('Candidato.cidade'), 'group'=>array('Candidato.cidade'), 'order'=>array('Candidato.cidade asc'), 'recursive'=>-1));
        $estadosCivis = $this->Candidato->EstadosCivil->find('list', array('order'=>array('nome')));
        $this->set('cidadesGroup', $cidadesGroup);
        $this->set('estadosCivis', $estadosCivis);
        $this->set('pretensoesSalariais', $pretensoesSalariais);
        $this->set('escolaridades', $escolaridades);
        $this->set('vaga', $vaga);
        $this->set('candidatos', $candidatos);
        $this->set('status', $this->status);
		$this->set('sexo', $this->sexo);
		$this->set('resultadoProcesso', $this->resultadoProcesso);
		$this->set('resultadoEtapasProcesso', $this->resultadoEtapasProcesso);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($cliente = null) {
		if ($this->request->is('post')) {
			$this->Vaga->create();
            $this->request->data['Vaga']['user_id'] = $this->Session->read('Auth.User.id');
            if(!empty($this->request->data['Vaga']['logradouro']) or !empty($this->request->data['Vaga']['cidade'])){
                $helper = new View($this);
                $address = $this->request->data['Vaga']['logradouro'].', '.$this->request->data['Vaga']['numero'].' - '.$this->request->data['Vaga']['bairro'].' - '.$this->request->data['Vaga']['cidade'].' - '.$this->request->data['Vaga']['uf'];
                $geocode = $helper->Util->gera_geocode($address);
                $this->request->data['Vaga']['geocode'] = $geocode;
            }
            $this->request->data['Vaga']['status'] = 'A';
			if ($this->Vaga->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'view', $this->Vaga->id));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
        if(!empty($cliente)){
		    $cliente = $this->Vaga->Cliente->find('first', array('fields'=>array('id', 'razao_social'),'conditions'=>array('Cliente.id'=>$cliente), 'recursive'=>-1));
    		$this->set(compact('cliente'));
        }else{
            $clientes = $this->Vaga->Cliente->find('list', array('conditions'=>array('Cliente.ativo'=>'S', 'Cliente.status'=>'E'), 'order'=>'Cliente.razao_social'));
    		$this->set(compact('clientes'));
        }
		$this->set('sexo', $this->sexo);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Vaga->id = $id;
		if (!$this->Vaga->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            if(!empty($this->request->data['Vaga']['logradouro']) or !empty($this->request->data['Vaga']['cidade'])){
                $helper = new View($this);
                $address = $this->request->data['Vaga']['logradouro'].', '.$this->request->data['Vaga']['numero'].' - '.$this->request->data['Vaga']['bairro'].' - '.$this->request->data['Vaga']['cidade'].' - '.$this->request->data['Vaga']['uf'];
                $geocode = $helper->Util->gera_geocode($address);
                $this->request->data['Vaga']['geocode'] = $geocode;
            }
			if ($this->Vaga->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'view', $this->request->data['Vaga']['id']));
			} else {
				$this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$this->request->data = $this->Vaga->read(null, $id);
		}
		$this->set(compact('clientes'));
		$this->set('sexo', $this->sexo);
 		$this->set('status', $this->status);
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
		$this->Vaga->id = $id;
		if (!$this->Vaga->exists()) {
			throw new NotFoundException(__('Cadastro inválido.'));
		}
		if ($this->Vaga->delete()) {
			$this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Vaga was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * pesquisa method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function pesquisa(){
        if($_GET){
            $this->DataTable->setViewVar('Vaga');
        }
    }

    public function export_excel($id = nul){
        $this->layout = 'excel';
		$this->Vaga->id = $id;
		if (!$this->Vaga->exists()) {
			throw new NotFoundException(__('Vaga inválida.'));
		}
        $vaga = $this->Vaga->read(null, $id);
 		$this->set('vaga', $vaga);
 		$this->set('arquvio', 'processo_seletivo');
        $this->set('status', $this->status);
		$this->set('sexo', $this->sexo);
		$this->set('resultadoProcesso', $this->resultadoProcesso);
		$this->set('resultadoEtapasProcesso', $this->resultadoEtapasProcesso);
    }

    function geo_localizacao(){
      $this->layout = 'maps';
    }

    public function maps_pontos($id = null, $ids = null){
        $this->autoRender = false;

        $vaga = $this->Vaga->read(null, $id);
        $conditions = array();
        if(!empty($ids)){
            $idsCandidatos = base64_decode($ids);
            $idsCandidatos = explode('#', $idsCandidatos);
            $conditions['Candidato.id'] = $idsCandidatos;
        }else{
          $conditions['Candidato.possui_deficiencia_auditiva'] = $vaga['Vaga']['deficiencia_auditiva'];
          $conditions['Candidato.possui_deficiencia_fisica'] = $vaga['Vaga']['deficiencia_fisica'];
          $conditions['Candidato.possui_deficiencia_intelectual'] = $vaga['Vaga']['deficiencia_intelectual'];
          $conditions['Candidato.possui_deficiencia_visual'] = $vaga['Vaga']['deficiencia_visual'];
        }

        if($vaga['Vaga']['reabilitado'] == 1){
            $conditions['Candidato.condicao_comprimento_cota'] = 'R';
        }
        $candidatos = $this->Candidato->find('all', array('conditions'=>$conditions, 'order'=>'nome', 'recursive'=>-1));
        $geocode = array();
        if(!empty($vaga['Vaga']['geocode'])):
          $code = explode(',', $vaga['Vaga']['geocode']);
          $geocode[] =
                array(
                    'Id'=>$vaga['Cliente']['id'],
                    'Tipo'=>0,
                    'Latitude'=>$code[0],
                    'Longitude'=>$code[1],
                    'Descricao'=>'<div style = "padding: 10px; display: table"><div style = "float: right; width: 280px"><div><b>'.$vaga['Cliente']['razao_social'].' - '.$vaga['Cliente']['cnpj'].'</b></div><div>Telefone(s): '.$vaga['Cliente']['telefone'].' '.$vaga['Cliente']['telefone_2'].'</div><div><a href="'.$this->base.'/Clientes/view/'.$vaga['Cliente']['id'].'/'.Inflector::slug($vaga['Cliente']['razao_social'], '-').'" target = "_blank">Mais Informações!</a></div></div></div>',
                );
        endif;
        foreach($candidatos as $candidato):
            if(!empty($candidato['Candidato']['geocode'])):

              $deficienciaHTML = '<b>Deficiências</b>: ';
              if($candidato['Candidato']['possui_deficiencia_auditiva'] == 1):
                $deficienciaHTML .= 'Auditiva: Sim';
                $deficienciaHTML .= ' - ';
              endif;
              if($candidato['Candidato']['possui_deficiencia_fisica'] == 1):
                $deficienciaHTML .= 'Fisica: Sim';
                $deficienciaHTML .= ' - ';
              endif;
              if($candidato['Candidato']['possui_deficiencia_intelectual'] == 1):
                $deficienciaHTML .= 'Intelectual: Sim ';
                $deficienciaHTML .= ' - ';
              endif;
              if($candidato['Candidato']['possui_deficiencia_visual'] == 1):
                $deficienciaHTML .= 'Visual: Sim';
                $deficienciaHTML .= ' - ';
              endif;
              if($candidato['Candidato']['necessita_ajudas_tecnicas'] == 1):
                $deficienciaHTML .= 'Necessita Ajudas Tecnicas: Sim ';
              endif;

              $code = explode(',', $candidato['Candidato']['geocode']);
              $geocode[] =
                  array(
                      'Id'=>$candidato['Candidato']['id'],
                      'Tipo'=>1,
                      'Latitude'=>$code[0],
                      'Longitude'=>$code[1],
                      'Descricao'=>'<div style = "padding: 10px; display: table"><div style = "float: right; width: 280px"><div><b>'.$candidato['Candidato']['nome'].' - '.$candidato['Candidato']['data_nascimento'].'</b></div><div><b>'.$candidato['Candidato']['logradouro'].' '.$candidato['Candidato']['numero'].'</b></div><div>'.$candidato['Candidato']['bairro'].'</div><div>'.$candidato['Candidato']['telefone'].' '.$candidato['Candidato']['celular_1'].'</div><div>'.$deficienciaHTML.'</div><div><a href="'.$this->base.'/Candidatos/view/'.$candidato['Candidato']['id'].'/'.Inflector::slug($candidato['Candidato']['nome'], '-').'" target = "_blank">Mais Informações!</a></div></div></div>',
                  );
            endif;
        endforeach;
        print_r(json_encode($geocode));
    }

}

