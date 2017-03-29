<?php

App::uses('AppController', 'Controller');

/**
 * Candidatos Controller
 *
 * @property Candidato $Candidato
 */
class CandidatosController extends AppController {

    var $tiposFormacoes = array('T' => 'Técnico', 'S' => 'Superior', 'P' => 'Pós-Graduação', 'Q' => 'Qualificação', 'O' => 'Outros');
    var $tipos = array('T' => 'Técnico', 'S' => 'Superior', 'P' => 'Pós-Graduação', 'Q' => 'Qualificação', 'O' => 'Outros');
    var $sexo = array('A' => 'Ambos', 'M' => 'Masculino', 'F' => 'Feminino');

    public function beforeFilter() {
        parent::beforeFilter();
        $conditions = array();
        $view = new View($this);
        $util = $view->loadHelper('Util');
        if (isset($this->params->query['Conditions']) && !empty($this->params->query['Conditions'])) {
            foreach ($this->params->query['Conditions'] as $field => $value) {
                if (!empty($value)) {
                    if ($field == 'sexo' and $value == 'A') {
                        $conditions['sexo'] = array('M', 'F');
                    } elseif ($field == 'inicio') {
                        $conditions['created >='] = $util->format_date2($value) . ' 00:00:00';
                    } elseif ($field == 'termino') {
                        $conditions['created <='] = $util->format_date2($value) . ' 23:59:59';
                    } else {
                        $conditions[$field] = $value;
                    }
                }
            }
        }

        $this->DataTable->settings = array(
            'Candidato' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'order' => ['nome asc'],
                'columns' => array(
                    'nome',
                    'telefone' => array('label' => 'Telefone(s)'),
                    'sexo',
                    'possui_deficiencia_auditiva' => array('label' => 'Auditiva'),
                    'possui_deficiencia_fisica' => array('label' => 'Fisíca'),
                    'possui_deficiencia_intelectual' => array('label' => 'Intelectual'),
                    'possui_deficiencia_visual' => array('label' => 'Visual'),
                    'Ações' => null
                ),
                'fields' => array('id', 'celular_1', 'cpf'),
            ),
            'Ata' => array(
                'autoRender' => false,
                'autoData' => false,
                'model' => 'AtasCandidato',
                'conditions' => $conditions,
                'order' => array('created desc'),
                'columns' => array(
                    'tipo',
                    'titulo',
                    'data',
                    'User.nome' => array('label' => 'Cadastro por'),
                    'created' => array('label' => 'Cadastrada em'),
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
                    'Vaga.cliente_id' => array('label' => 'Cliente'),
                    'Vaga.cargo' => array('label' => 'Cargo'),
                    'entrevista_triagem' => array('label' => 'Triagem', 'bSortable' => false),
//                    'entrevista_psicologica' => array('label' => 'Psicológica', 'bSortable' => false),
                    'entrevista_tecnica' => array('label' => 'Técnica', 'bSortable' => false),
//                    'teste_psicologica' => array('label' => 'Avaliação Psicológica', 'bSortable' => false),
                    'exame_medico_admissional' => array('label' => 'Exame Médico Admissional', 'bSortable' => false),
                    'resultado' => array('label' => 'Resultado'),
                    'observacoes' => array('label' => 'Observações', 'bSortable' => false),
                    'Ações' => null
                ),
                'fields' => array('id'),
            ),
            'CandidatosHistorico' => array(
                'autoRender' => false,
                'autoData' => false,
                'order' => array('CandidatosHistorico.created desc'),
                'conditions' => $conditions,
                'columns' => array(
                    'data',
                    'descricao' => array('label' => 'Descrição'),
                    'arquivo',
                    'User.nome' => array('label' => 'Cadastrado por'),
                    'created' => array('label' => 'Cadastrado em'),
                    'Ações' => null
                ),
                'fields' => array('id', 'dir'),
            ),
            'CandidatosDocumento' => array(
                'autoRender' => false,
                'autoData' => false,
                'order' => array('CandidatosDocumento.created desc'),
                'conditions' => $conditions,
                'columns' => array(
                    'descricao' => array('label' => 'Descrição'),
                    'arquivo',
                    'User.nome' => array('label' => 'Cadastrado por'),
                    'created' => array('label' => 'Cadastrado em'),
                    'Ações' => null
                ),
                'fields' => array('id', 'dir'),
            ),
        );
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->DataTable->setViewVar('Candidato');
        $escolaridades = $this->Candidato->Escolaridade->find('list', array('order' => 'nome'));
        $pretensoesSalariais = $this->Candidato->PretensoesSalarial->find('all', array('order' => array('inicial asc')));
        $cidadesGroup = $this->Candidato->find('all', array('fields' => array('Candidato.cidade'), 
            'group' => array('Candidato.cidade'), 'order' => array('Candidato.cidade asc'), 'recursive' => -1));
        $this->set('cidadesGroup', $cidadesGroup);
        $this->set('pretensoesSalariais', $pretensoesSalariais);
        $this->set('escolaridades', $escolaridades);
        $this->set('sexo', $this->sexo);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->DataTable->setViewVar(array('ProcessosSeletivo', 'CandidatosHistorico', 'Ata', 'CandidatosDocumento'));
        $this->Candidato->id = $id;
        if (!$this->Candidato->exists()) {
            throw new NotFoundException(__('Candidato inválido.'));
        }
        $this->set('candidato', $this->Candidato->read(null, $id));
        $this->set('tiposFormacoes', $this->tiposFormacoes);
    }

    /**
     * curriculo method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function curriculo($id = null) {
        $this->layout = 'pdf';
        $this->set('candidato', $this->Candidato->read(null, $id));
        $this->set('tiposFormacoes', $this->tiposFormacoes);
    }

    public function curriculo_pdf($id = null) {
        $this->layout = 'pdf';
        Configure::write('debug', 1);
        $candidato = $this->Candidato->read(null, $id);
        if (!empty($candidato)) {
            $this->set('candidato', $candidato);
            $this->set('tiposFormacoes', $this->tiposFormacoes);
            $this->render();
        } else {
            $this->redirect('/');
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Candidato->create();
            $this->request->data['Candidato']['user_id'] = $this->Session->read('Auth.User.id');
            $cursosSelecionados = array();
            $soma = $this->request->data['Candidato']['possui_deficiencia_auditiva'] + $this->request->data['Candidato']['possui_deficiencia_fisica'] + $this->request->data['Candidato']['possui_deficiencia_intelectual'] + $this->request->data['Candidato']['possui_deficiencia_visual'];
            $address = $this->request->data['Candidato']['logradouro'] . ', ' . $this->request->data['Candidato']['numero'] . ' - ' . $this->request->data['Candidato']['bairro'] . ' - ' . $this->request->data['Candidato']['cidade'] . ' - ' . $this->request->data['Candidato']['estado'];
            $geocode = $this->gera_geocode($address);
            $this->request->data['Candidato']['geocode'] = $geocode;

            if ($soma > 1) {
                $this->request->data['Candidato']['possui_deficiencia_multipla'] = '1';
            } else {
                $this->request->data['Candidato']['possui_deficiencia_multipla'] = '0';
            }
            if (!empty($this->request->data['Candidato']['cursos'])) {
                $this->request->data['CursosAcademicosTecnico']['CursosAcademicosTecnico'] = explode(',', $this->data['Candidato']['cursos']);
            }

            if ($this->Candidato->save($this->request->data)) {
                if (!empty($this->request->data['ExperienciasProfissional'])) {
                    $experiencias = array();
                    $i = 0;
                    foreach ($this->request->data['ExperienciasProfissional'] as $experiencia) {
                        if (!empty($experiencia['empresa']) and ! empty($experiencia['admissao']) and ! empty($experiencia['cargo'])) {
                            $experiencias[$i]['ExperienciasProfissional'] = $experiencia;
                            $experiencias[$i]['ExperienciasProfissional']['candidato_id'] = $this->Candidato->id;
                            $i++;
                        }
                    }
                    $this->Candidato->ExperienciasProfissional->create();
                    $this->Candidato->ExperienciasProfissional->saveAll($experiencias);
                }
                $this->Session->setFlash(__('Candidato salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'view', $this->Candidato->id));
            } else {
                $this->Session->setFlash(__('Candidato não salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $estadosCivis = $this->Candidato->EstadosCivil->find('list', array('order' => array('nome')));
        $escolaridades = $this->Candidato->Escolaridade->find('list');
        $origens = $this->Candidato->Origem->find('list', array('order' => array('nome')));
        $cursosAcademicosTecnicos = $this->Candidato->CursosAcademicosTecnico->find('all', array('fields' => array('id', 'nome', 'tipo'), 'order' => array('nome'), 'recursive' => -1));
        $idiomas = $this->Candidato->Idioma->find('list');
        $pretensoesSalariais = $this->Candidato->PretensoesSalarial->find('all', array('order' => array('inicial asc')));
        $this->set('tiposFormacoes', $this->tiposFormacoes);
        $this->set(compact('estadosCivis', 'origens', 'cursosAcademicosTecnicos', 'idiomas', 'escolaridades', 'pretensoesSalariais'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        Configure::write('debug', 1);
        $this->Candidato->id = $id;
        if (!$this->Candidato->exists()) {
            throw new NotFoundException(__('Candidato inválido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $address = $this->request->data['Candidato']['logradouro'] . ', ' . $this->request->data['Candidato']['numero'] . ' - ' . $this->request->data['Candidato']['bairro'] . ' - ' . $this->request->data['Candidato']['cidade'] . ' - ' . $this->request->data['Candidato']['estado'];
            $geocode = $this->gera_geocode($address);
            $this->request->data['Candidato']['geocode'] = $geocode;
            $soma = $this->request->data['Candidato']['possui_deficiencia_auditiva'] + $this->request->data['Candidato']['possui_deficiencia_fisica'] + $this->request->data['Candidato']['possui_deficiencia_intelectual'] + $this->request->data['Candidato']['possui_deficiencia_visual'];
            if ($soma > 1) {
                $this->request->data['Candidato']['possui_deficiencia_multipla'] = '1';
            } else {
                $this->request->data['Candidato']['possui_deficiencia_multipla'] = '0';
            }
            $cursosSelecionados = array();

            if (!empty($this->request->data['Candidato']['cursos'])) {
                $this->request->data['CursosAcademicosTecnico']['CursosAcademicosTecnico'] = explode(',', $this->data['Candidato']['cursos']);
            }
            if (!empty($this->request->data['ExperienciasProfissional'])) {
                $experiencias = array();
                $i = 0;
                foreach ($this->request->data['ExperienciasProfissional'] as $experiencia) {
                    if (!empty($experiencia['empresa']) and ! empty($experiencia['admissao']) and ! empty($experiencia['cargo'])) {
                        $experiencias[$i]['ExperienciasProfissional'] = $experiencia;
                        $experiencias[$i]['ExperienciasProfissional']['candidato_id'] = $this->Candidato->id;
                        $i++;
                    }
                }
                $this->Candidato->ExperienciasProfissional->create();
                $this->Candidato->ExperienciasProfissional->saveAll($experiencias);
            }
            if ($this->Candidato->save($this->request->data)) {
                $this->Session->setFlash(__('Candidato salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'view', $this->Candidato->id));
            } else {
                $this->Session->setFlash(__('Candidato não salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $this->request->data = $this->Candidato->read(null, $id);
        }
        $estadosCivis = $this->Candidato->EstadosCivil->find('list', array('order' => array('nome')));
        $escolaridades = $this->Candidato->Escolaridade->find('list');
        $origens = $this->Candidato->Origem->find('list', array('order' => array('nome')));
        $cursosAcademicosTecnicos = $this->Candidato->CursosAcademicosTecnico->find('all', array('fields' => array('id', 'nome', 'tipo'), 'order' => array('nome'), 'recursive' => -1));
        $idiomas = $this->Candidato->Idioma->find('list');
        $pretensoesSalariais = $this->Candidato->PretensoesSalarial->find('all', array('order' => array('inicial')));
        $this->set('tiposFormacoes', $this->tiposFormacoes);
        $this->set(compact('estadosCivis', 'origens', 'cursosAcademicosTecnicos', 'idiomas', 'escolaridades', 'pretensoesSalariais'));
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
        $this->Candidato->id = $id;
        if (!$this->Candidato->exists()) {
            throw new NotFoundException(__('Candidato inválido.'));
        }
        if ($this->Candidato->delete()) {
            $this->Session->setFlash(__('Candidato removido.'), 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Candidato não removido. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        $this->redirect(array('action' => 'index'));
    }

    public function verifica_email($id = null) {
        $this->autoRender = false;
        $email = $this->data['Candidato']['e_mail'];
        if (!empty($email)) {
            if (!empty($id)) {
                $emailCandidato = $this->Candidato->find('first', array('fields' => 'Candidato.e_mail', 'conditions' => array('Candidato.e_mail' => $email, 'Candidato.id <>' => $id)));
            } else {
                $emailCandidato = $this->Candidato->find('first', array('fields' => 'Candidato.e_mail', 'conditions' => array('Candidato.e_mail' => $email)));
            }
            if (!empty($emailMembro)) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    public function verifica_cpf($id = null) {
        $this->autoRender = false;
        $cpf = $this->data['Candidato']['cpf'];
        if (!empty($cpf)) {
            if (!empty($id)) {
                $cpfCandidato = $this->Candidato->find('first', array('fields' => 'Candidato.cpf', 'conditions' => array('Candidato.cpf' => $cpf, 'Candidato.id <>' => $id)));
            } else {
                $cpfCandidato = $this->Candidato->find('first', array('fields' => 'Candidato.cpf', 'conditions' => array('Candidato.cpf' => $cpf)));
            }
            if (!empty($cpfCandidato)) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    public function verifica_email_cpf($id = null) {
        $this->autoRender = false;
        $email = $this->data['Candidato']['e_mail'];
        $cpf = $this->data['Candidato']['cpf'];
        if (!empty($email) and ! empty($cpf)) {
            $candidato = $this->Candidato->find('first', array('fields' => 'Candidato.e_mail', 'conditions' => array('OR' => array('Candidato.e_mail' => $email, 'Candidato.cpf' => $cpf))));
            if (!empty($candidato)) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    public function pesquisa_por_deficiencia() {
        $this->DataTable->setViewVar(array('Candidato'));
    }

    public function pesquisa_ajax() {
        $this->layout = 'jquery';
        if ($this->request->is('post') || $this->request->is('put')) {
            $conditions = array();
            foreach ($this->request->data['Candidato'] as $key => $value) {
                if (!empty($value)) {
                    if ($key == 'sexo' and $value == 'A') {
                        $conditions[$key] = array('M', 'F');
                    } else {
                        $conditions[$key] = $value;
                    }
                }
            }
            $vaga = $this->Candidato->ProcessosSeletivo->Vaga->read(null, $this->request->data['Vaga']['id']);
            $candidatosParticipantes = array();
            if (!empty($vaga['ProcessosSeletivo'])) {
                foreach ($vaga['ProcessosSeletivo'] as $processo) {
                    $candidatosParticipantes[$processo['candidato_id']] = $processo['candidato_id'];
                }
                $conditions['NOT'] = array('Candidato.id' => $candidatosParticipantes);
            }

            $candidatos = $this->Candidato->find('all', array('conditions' => $conditions, 'order' => 'nome', 'recursive' => -1));
            $this->set('vaga', $vaga['Vaga']['id']);
            $this->set('candidatos', $candidatos);
        }
    }

    public function deficiencia_multipla() {
        $this->autoRender = false;
        $this->Candidato->recursive = -1;
        $candidatos = $this->Candidato->find('all');
        foreach ($candidatos as $candidato) {
            $soma = $candidato['Candidato']['possui_deficiencia_auditiva'] + $candidato['Candidato']['possui_deficiencia_fisica'] + $candidato['Candidato']['possui_deficiencia_intelectual'] + $candidato['Candidato']['possui_deficiencia_visual'];
            if ($soma > 1) {
                $this->Candidato->updateAll(array('Candidato.possui_deficiencia_multipla' => '1'), array('Candidato.id' => $candidato['Candidato']['id']));
            }
        }
    }

    public function atualiza_geocode() {
        $this->autoRender = false;
        $candidatos = $this->Candidato->find('all', array('recursive' => -1));
        foreach ($candidatos as $candidato) {
            if (empty($candidato['Candidato']['geocode'])) {
                sleep(2);
                $address = $candidato['Candidato']['logradouro'] . ', ' . $candidato['Candidato']['numero'] . ' - ' . $candidato['Candidato']['bairro'] . ' - ' . $candidato['Candidato']['cidade'] . ' - ' . $candidato['Candidato']['estado'];
                $geocode = $this->gera_geocode($address);
                $this->Candidato->updateAll(array('Candidato.geocode' => "'" . $geocode . "'"), array('Candidato.id' => $candidato['Candidato']['id']));
            }
        }
    }

    public function gera_geocode($address) {
        $prepAddr = str_replace(' ', '+', $address);
        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
        if ($geocode == false) {
            return '';
        } else {
            $output = json_decode($geocode);
            $lat = $output->results[0]->geometry->location->lat;
            $long = $output->results[0]->geometry->location->lng;
            return $lat . ', ' . $long;
        }
    }

    public function graficos() {
        $this->Candidato->recursive = -1;
        $counts = $this->Candidato->find('all', array(
            'fields' => array(
                'date_format(Candidato.created, "%m/%Y") as periodo',
                'count(*) as cadastros',
                'sum(Candidato.possui_deficiencia_multipla) as possui_deficiencia_multipla',
                'sum(Candidato.possui_deficiencia_auditiva) as possui_deficiencia_auditiva',
                'sum(Candidato.possui_deficiencia_fisica) as possui_deficiencia_fisica',
                'sum(Candidato.possui_deficiencia_intelectual) as possui_deficiencia_intelectual',
                'sum(Candidato.possui_deficiencia_visual) as possui_deficiencia_visual',
                'sum(Candidato.condicao_comprimento_cota) as condicao_comprimento_cota'),
            'conditions' => array('Candidato.created >= date_sub(curdate(), interval 12 month)'),
            'group' => 'date_format(Candidato.created, "%m/%Y")',
            'order' => 'date_format(Candidato.created, "%Y/%m") desc'
                )
        );
        $somatoriosCadastrado = $this->Candidato->find('all', array(
            'fields' => array(
                'count(*) as cadastros',
                'sum(Candidato.possui_deficiencia_multipla) as possui_deficiencia_multipla',
                'sum(Candidato.possui_deficiencia_auditiva) as possui_deficiencia_auditiva',
                'sum(Candidato.possui_deficiencia_fisica) as possui_deficiencia_fisica',
                'sum(Candidato.possui_deficiencia_intelectual) as possui_deficiencia_intelectual',
                'sum(Candidato.possui_deficiencia_visual) as possui_deficiencia_visual',
                'sum(Candidato.condicao_comprimento_cota) as condicao_comprimento_cota')
                )
        );
        $processoSeletivoContratado = $this->Candidato->ProcessosSeletivo->find('all', array('fields' => array('ProcessosSeletivo.candidato_id'), 'conditions' => array('ProcessosSeletivo.resultado' => 'C')));
        $pessoasContratadas = array();
        foreach ($processoSeletivoContratado as $pessoa) {
            $pessoasContratadas[$pessoa['ProcessosSeletivo']['candidato_id']] = $pessoa['ProcessosSeletivo']['candidato_id'];
        }
        $somatoriosProcessoSeletivo = $this->Candidato->find('all', array(
            'fields' => array(
                'count(*) as cadastros',
                'sum(Candidato.possui_deficiencia_multipla) as possui_deficiencia_multipla',
                'sum(Candidato.possui_deficiencia_auditiva) as possui_deficiencia_auditiva',
                'sum(Candidato.possui_deficiencia_fisica) as possui_deficiencia_fisica',
                'sum(Candidato.possui_deficiencia_intelectual) as possui_deficiencia_intelectual',
                'sum(Candidato.possui_deficiencia_visual) as possui_deficiencia_visual',
                'sum(Candidato.condicao_comprimento_cota) as condicao_comprimento_cota'),
            'conditions' => array('Candidato.id' => $pessoasContratadas)
                )
        );
        $this->set(compact('counts', 'somatoriosCadastrado', 'somatoriosProcessoSeletivo'));
    }

}
