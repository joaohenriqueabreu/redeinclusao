<?php

App::uses('AppController', 'Controller');
App::uses('UtilHelper', 'View/Helper');
//App::uses('Plugin', 'PHPExcel/PHPExcel.php');

require_once APP . '/Plugin/PHPExcel/PHPExcel.php';

/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 */
class ClientesController extends AppController
{

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('verifica_cnpj', 'datasCronograma');
        $conditions = array();
        if (isset($this->params->query['Conditions']) && !empty($this->params->query['Conditions'])) {
//            $conditions = $this->params->query['Conditions'];
            foreach ($this->params->query['Conditions'] as $field => $value) {
                $conditions = $this->params->query['Conditions'];
                if (isset($conditions['inicio']) && !empty($conditions['inicio'])) {
                    $conditions['created >='] = $this->converterData($conditions['inicio']);
                    $conditions['created <='] = $this->converterData($conditions['termino']);
                }
                unset($conditions['inicio']);
                unset($conditions['termino']);
                unset($conditions['inicioAta']);
                unset($conditions['terminoAta']);
                unset($conditions['ata']);
                if (empty($conditions['cidade'])) {
                    unset($conditions['cidade']);
                }
            }
        }

        $this->DataTable->settings = array(
            'Cliente' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'columns' => array(
                    'Cliente.razao_social' => array(
                        'label' => 'Nome'
                    ),
                    'Cliente.telefone' => ['label' => 'Telefone'],
                    'Cliente.classe' => ['label' => 'Classe'],
                    'Cliente.status' => ['label' => 'Status'],
                    'Cliente.ativo' => ['label' => 'Ativo'],
                    'Ações' => null
                ),
                'fields' => array(
                    'Cliente.id', 'Cliente.cargo_id'
                )
            ),
            'Vaga' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'columns' => array(
                    'Vaga.cargo',
                    'Vaga.numero_vagas' => array(
                        'label' => 'Nº Vagas'
                    ),
                    'Vaga.salario' => array(
                        'label' => 'Salário'
                    ),
                    'Vaga.sexo',
                    'Vaga.deficiencia_auditiva' => array(
                        'label' => 'Auditiva'
                    ),
                    'Vaga.deficiencia_fisica' => array(
                        'label' => 'Fisíca'
                    ),
                    'Vaga.deficiencia_intelectual' => array(
                        'label' => 'Intelectual'
                    ),
                    'Vaga.deficiencia_visual' => array(
                        'label' => 'Visual'
                    ),
                    'Vaga.status',
                    'Ações' => null
                ),
                'fields' => array(
                    'Vaga.id'
                )
            ),
            'Ata' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'order' => array(
                    'data desc'
                ),
                'columns' => array(
                    'Ata.tipo',
                    'Ata.titulo' => array(
                        'label' => 'Título'
                    ),
                    'Ata.data',
                    'Ata.repsonsavel_contato' => array(
                        'label' => 'Contato'
                    ),
                    'User.nome' => array(
                        'label' => 'Cadastro por'
                    ),
                    'Ações' => null
                ),
                'fields' => array(
                    'Ata.id',
                    'Ata.termino'
                )
            ),
            'ClientesQuestionario' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'columns' => array(
                    'Questionario.titulo' => array(
                        'label' => 'Título'
                    ),
                    'User.nome' => array(
                        'label' => 'Preenchido por'
                    ),
                    'ClientesQuestionario.created' => array(
                        'label' => 'Cadastrada em'
                    ),
                    'Ações' => null
                ),
                'fields' => array(
                    'ClientesQuestionario.id'
                )
            ),
            'ClientesHistorico' => array(
                'autoRender' => false,
                'autoData' => false,
                'order' => array(
                    'ClientesHistorico.created desc'
                ),
                'conditions' => $conditions,
                'columns' => array(
                    'ClientesHistorico.data',
                    'ClientesHistorico.descricao' => array(
                        'label' => 'Descrição'
                    ),
                    'ClientesHistorico.arquivo',
                    'User.nome' => array(
                        'label' => 'Cadastrado por'
                    ),
                    'ClientesHistorico.created' => array(
                        'label' => 'Cadastrado em'
                    ),
                    'Ações' => null
                ),
                'fields' => array(
                    'ClientesHistorico.id',
                    'ClientesHistorico.dir'
                )
            ),
            'ClientesContato' => array(
                'autoRender' => false,
                'autoData' => false,
                'order' => array(
                    'ClientesContato.nome asc'
                ),
                'conditions' => $conditions,
                'columns' => array(
                    'ClientesContato.nome',
                    'Cargo.nome' => array(
                        'label' => 'Cargo'
                    ),
                    'ClientesContato.telefone',
                    'ClientesContato.celular',
                    'ClientesContato.email' => array(
                        'label' => 'E-mail'
                    ),
                    'ClientesContato.observacoes' => array(
                        'label' => 'Observações'
                    ),
                    'User.nome' => array(
                        'label' => 'Cadastrado por'
                    ),
                    'ClientesContato.created' => array(
                        'label' => 'Cadastrado em'
                    ),
                    'Ações' => null
                ),
                'fields' => array(
                    'ClientesContato.id'
                )
            ),
            'Contrato' => array(
                'autoRender' => false,
                'autoData' => false,
                'order' => array(
                    'Contrato.inicio_vigencia desc'
                ),
                'conditions' => $conditions,
                'columns' => array(
                    'Contrato.data',
                    'Contrato.inicio_vigencia' => array(
                        'label' => 'Vigência'
                    ),
                    'Contrato.numero_cota' => array(
                        'label' => 'Nº Cota'
                    ),
                    'Contrato.anexo',
                    'Contrato.status',
                    'Contrato.investimento',
                    'Ações' => null
                ),
                'fields' => array(
                    'Contrato.id',
                    'Contrato.termino_vigencia'
                )
            )
        );
        $this->loadModel('TipoEducacao');
        $this->loadModel('TurnosEscola');
        $this->loadModel('ClientesTurnosEscola');
        $this->loadModel('ClientesTipoEducacao');
    }

    /**
     * index method
     *
     * @return void
     */

    public function index($tipo = null)
    {
//        $this->DataTable->setViewVar('Cliente');
//        $cidadesGroup = $this->Cliente->find('all', array('fields' => array('Cliente.cidade'),
//            'group' => array('Cliente.cidade'), 'order' => array('Cliente.cidade asc'), 'recursive' => -1));
//        $this->set('cidadesGroup', $cidadesGroup);

        /// ------------------ Baanko change ------------------
        /// Caso haja algum acesso a essa página redireciona para a view

        $clienteId = $this->Session->read("CID");
        if (isset($clienteId)) {
            $this->redirect(array('controller' => 'clientes', 'action' => 'view', $clienteId));
        } else {
            $this->redirect(array('controller' => 'user', 'action' => 'logout'));
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        $this->DataTable->setViewVar(array(
            'Vaga',
            'Ata',
            'ClientesQuestionario',
            'ClientesHistorico',
            'ClientesContato',
            'Contrato'
        ));
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
/// ------------- Baanko challenge updates -------------
            //            throw new NotFoundException(__('Cadastro inválido.'));
            /// Caso o cliente não exista redireciona para a página de cadastro
            $this->Session->write('CID', 0);
            $this->redirect(array('controller' => 'clientes', 'action' => 'add'));
        }
        $this->loadModel('ClientesContato');
        $contatos = $this->ClientesContato->find('all', [
            // 'fields' => ['ClientesContato.*', 'Usuario.nome', 'Cargo.nome'],
            'conditions' => ['cliente_id' => $id],
        ]);
        $this->set('cliente', $this->Cliente->read(null, $id));
        $this->set('contatos', $contatos);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {

            /// ------------------- Baanko Challenge update --------------------
            /// Se o cliente não for do tipo "E" ele não vai conseguir ver o IMGI
            /// TODO: Estamos forçando aqui, mas é necessário entender a lógica dessa associação
            $this->request->data["Cliente"]["tipo"] = "E";

            $this->Cliente->create();
            $this->request->data['Cliente']['razao_social'] = mb_strtoupper($this->request->data['Cliente']['razao_social']);
            if (isset($this->request->data['Cliente']['logradouro'])) {
                $this->request->data['Cliente']['logradouro'] = mb_strtoupper($this->request->data['Cliente']['logradouro']);
            }
            if (isset($this->request->data['Cliente']['bairro'])) {
                $this->request->data['Cliente']['bairro'] = mb_strtoupper($this->request->data['Cliente']['bairro']);
            }
            if (isset($this->request->data['Cliente']['complemento'])) {
                $this->request->data['Cliente']['complemento'] = mb_strtoupper($this->request->data['Cliente']['complemento']);
            }
            if (isset($this->request->data['Cliente']['estado'])) {
                $this->request->data['Cliente']['estado'] = mb_strtoupper($this->request->data['Cliente']['estado']);
            }
            if (isset($this->request->data['Cliente']['indicado'])) {
                $this->request->data['Cliente']['indicado'] = mb_strtoupper($this->request->data['Cliente']['indicado']);
            }
            if (isset($this->request->data['Cliente']['observacoes'])) {
                $this->request->data['Cliente']['observacoes'] = mb_strtoupper($this->request->data['Cliente']['observacoes']);
            }
            if (isset($this->request->data['Cliente']['contato'])) {
                $this->request->data['Cliente']['contato'] = mb_strtoupper($this->request->data['Cliente']['contato']);
            }
            $this->request->data['Cliente']['user_id'] = $this->Session->read('Auth.User.id');
            if (!empty($this->request->data['Cliente']['logradouro']) or !empty($this->request->data['Cliente']['cidade'])) {
                $helper = new View($this);
                $address = $this->request->data['Cliente']['logradouro'] . ', ' . $this->request->data['Cliente']['numero'] . ' - ' . $this->request->data['Cliente']['bairro'] . ' - ' . $this->request->data['Cliente']['cidade'] . ' - ' . $this->request->data['Cliente']['estado'];
                $geocode = $helper->Util->gera_geocode($address);
                $this->request->data['Cliente']['geocode'] = $geocode;
            }
            if ($this->Cliente->save($this->request->data)) {
                if (!empty($this->request->data['Cliente']['turnos_escola_id'])) {
                    $turnos = [];
                    foreach ($this->request->data['Cliente']['turnos_escola_id'] as $turno) {
                        $turnos[]['ClientesTurnosEscola'] = [
                            'cliente_id' => $this->Cliente->id,
                            'turnos_escola_id' => $turno
                        ];
                    }
                    $this->ClientesTurnosEscola->saveAll($turnos);
                }
                if (!empty($this->request->data['Cliente']['tipo_educacao_id'])) {
                    $tipoEducacao = [];
                    foreach ($this->request->data['Cliente']['tipo_educacao_id'] as $tipo) {
                        $tipoEducacao[]['ClientesTipoEducacao'] = [
                            'cliente_id' => $this->Cliente->id,
                            'tipo_educacao_id' => $tipo
                        ];
                    }
                    $this->ClientesTipoEducacao->saveAll($tipoEducacao);
                }
                if (!empty($this->request->data['Servico'])) {
                    $servicos = array();
                    foreach ($this->request->data['Servico'] as $key => $value) {
                        $servicos[]['ClientesServico'] = array(
                            'cliente_id' => $this->Cliente->id,
                            'servico' => $value
                        );
                    }
                    $this->Cliente->ClientesServico->create();
                    $this->Cliente->ClientesServico->saveAll($servicos);
                }
                $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array(
                    'class' => 'alert alert-success'
                ));

                /// ---------------- Baanko Challenge updates --------------------
                /// Atualizar o empresa_id no registro do usuário
                $this->loadModel('User');
                $this->User->id = $this->Auth->User('id');
                $this->User->saveField('empresa_id', $this->Cliente->id);

                /// Forçar logout
                $this->Session->setFlash('Precisamos que faça login novamente para atualizar os dados de sua sessão!', 'default', array('class' => 'alert alert-success'));
                $this->redirect($this->Auth->logout());

                $this->redirect(array(
                    'action' => 'view',
                    $this->Cliente->id
                ));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array(
                    'class' => 'alert alert-danger'
                ));
            }
        }

        $tiposEducacao = $this->TipoEducacao->find('list');
        $turnos = $this->TurnosEscola->find('list');
        $cargos = $this->Cliente->Cargo->find('list', [
            'order' => [
                'nome ASC'
            ]
        ]);
        $this->set(compact('cargos', 'tiposEducacao', 'turnos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('Cadastro inválido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Cliente']['razao_social'] = mb_strtoupper($this->request->data['Cliente']['razao_social']);
            if (isset($this->request->data['Cliente']['logradouro'])) {
                $this->request->data['Cliente']['logradouro'] = mb_strtoupper($this->request->data['Cliente']['logradouro']);
            }
            if (isset($this->request->data['Cliente']['bairro'])) {
                $this->request->data['Cliente']['bairro'] = mb_strtoupper($this->request->data['Cliente']['bairro']);
            }
            if (isset($this->request->data['Cliente']['complemento'])) {
                $this->request->data['Cliente']['complemento'] = mb_strtoupper($this->request->data['Cliente']['complemento']);
            }
            if (isset($this->request->data['Cliente']['estado'])) {
                $this->request->data['Cliente']['estado'] = mb_strtoupper($this->request->data['Cliente']['estado']);
            }
            if (isset($this->request->data['Cliente']['indicado'])) {
                $this->request->data['Cliente']['indicado'] = mb_strtoupper($this->request->data['Cliente']['indicado']);
            }
            if (isset($this->request->data['Cliente']['observacoes'])) {
                $this->request->data['Cliente']['observacoes'] = mb_strtoupper($this->request->data['Cliente']['observacoes']);
            }
            if (isset($this->request->data['Cliente']['contato'])) {
                $this->request->data['Cliente']['contato'] = mb_strtoupper($this->request->data['Cliente']['contato']);
            }
            if (!empty($this->request->data['Cliente']['logradouro']) or !empty($this->request->data['Cliente']['cidade'])) {
                $helper = new View($this);
                $address = $this->request->data['Cliente']['logradouro'] . ', ' . $this->request->data['Cliente']['numero'] . ' - ' . $this->request->data['Cliente']['bairro'] . ' - ' . $this->request->data['Cliente']['cidade'] . ' - ' . $this->request->data['Cliente']['estado'];
                $geocode = $helper->Util->gera_geocode($address);
                $this->request->data['Cliente']['geocode'] = $geocode;
            }

            if ($this->Cliente->save($this->request->data)) {
                if (!empty($this->request->data['Cliente']['turnos_escola_id'])) {
                    $turnos = [];
                    foreach ($this->request->data['Cliente']['turnos_escola_id'] as $turno) {
                        $turnos[]['ClientesTurnosEscola'] = [
                            'cliente_id' => $this->Cliente->id,
                            'turnos_escola_id' => $turno
                        ];
                    }
                    $this->ClientesTurnosEscola->saveAll($turnos);
                }
                if (!empty($this->request->data['Cliente']['tipo_educacao_id'])) {
                    $tipoEducacao = [];
                    foreach ($this->request->data['Cliente']['tipo_educacao_id'] as $tipo) {
                        $tipoEducacao[]['ClientesTipoEducacao'] = [
                            'cliente_id' => $this->Cliente->id,
                            'tipo_educacao_id' => $tipo
                        ];
                    }
                    $this->ClientesTipoEducacao->saveAll($tipoEducacao);
                }
                if (!empty($this->request->data['Servico'])) {
                    $this->Cliente->ClientesServico->deleteAll(array(
                        'ClientesServico.cliente_id' => $this->Cliente->id
                    ));
                    $servicos = array();
                    foreach ($this->request->data['Servico'] as $key => $value) {
                        $servicos[]['ClientesServico'] = array(
                            'cliente_id' => $this->Cliente->id,
                            'servico' => $value
                        );
                    }
                    $this->Cliente->ClientesServico->create();
                    $this->Cliente->ClientesServico->saveAll($servicos);
                }
                $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array(
                    'class' => 'alert alert-success'
                ));
                $this->redirect(array(
                    'action' => 'view',
                    $id
                ));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar o cadastro. Por favor, tente novamente.'), 'default', array(
                    'class' => 'alert alert-danger'
                ));
            }
        } else {
            $this->request->data = $this->Cliente->read(null, $id);
            $tiposSelected = [];
            $turnosSelected = [];

            foreach ($this->request->data['TipoEducacao'] as $tipo) {
                $tiposSelected[] = $tipo['id'];
            }
            foreach ($this->request->data['TurnosEscola'] as $turno) {
                $turnosSelected[] = $turno['id'];
            }

            $cargos = $this->Cliente->Cargo->find('list', [
                'order' => [
                    'nome ASC'
                ]
            ]);
            $tiposEducacao = $this->TipoEducacao->find('list');
            $turnos = $this->TurnosEscola->find('list');
            $this->set(compact('cargos', 'tiposEducacao', 'turnos', 'turnosSelected', 'tiposSelected'));
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
    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('Cadastro inválido.'));
        }
        if ($this->Cliente->delete()) {
            $this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array(
                'class' => 'alert alert-success'
            ));
            $this->redirect(array(
                'action' => 'index?status=' . $_GET['status'] . '&tipo=' . $_GET['tipo']
            ));
        }
        $this->Session->setFlash(__('Não foi possível remover o cadastro. Por favor, tente novamente.'), 'default', array(
            'class' => 'alert alert-danger'
        ));
        $this->redirect(array(
            'action' => 'index?status=' . $_GET['status'] . '&tipo=' . $_GET['tipo']
        ));
    }

    public function verifica_cnpj($id = null)
    {
        $this->autoRender = false;
        $cnpj = $this->data['Cliente']['cnpj'];
        if (!empty($cnpj)) {
            if (!empty($id)) {
                $cnpj_Cliente = $this->Cliente->find('first', array(
                    'fields' => 'Cliente.cnpj',
                    'conditions' => array(
                        'Cliente.cnpj' => $cnpj,
                        'Cliente.id <>' => $id
                    )
                ));
            } else {
                $cnpj_Cliente = $this->Cliente->find('first', array(
                    'fields' => 'Cliente.cnpj',
                    'conditions' => array(
                        'Cliente.cnpj' => $cnpj
                    )
                ));
            }
            if (!empty($cnpj_Cliente)) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    /**
     * cronograma method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function datasCronograma()
    {
        $this->autoRender = false;
        $conditions = array();
        if (isset($_GET['projeto'])) {
            $conditions['Projeto.id'] = $_GET['projeto'];
        }
        if (isset($_GET['cliente'])) {
            $conditions['Projeto.cliente_id'] = $_GET['cliente'];
        }
        $this->Cliente->Projeto->filterBindings(array(
            'Ata'
        ));
        $this->Cliente->Projeto->filterBindings(array(
            'Cliente'
        ));
        $this->Cliente->Projeto->filterBindings(array(
            'ProjetosRespostasLevantamento'
        ));
        $projetos = $this->Cliente->Projeto->find('all', array(
            'conditions' => $conditions,
            'order' => array(
                'Projeto.inicio asc'
            )
        ));
        $dadosJson = array();
        $view = new View($this);
        $i = 0;
        $l = 0;
        foreach ($projetos as $projeto) {
            $i++;
            $y = 0;
            $percentualProcessos = 0;
            foreach ($projeto['ProjetosProcesso'] as $processo) {
                $y++;
                $percentualProcessos += $processo['percentual_execucao'];
                $inicioP = $processo['previsao_inicio'];
                $terminoP = $processo['previsao_termino'];
                $diferencaP = strtotime($terminoP) - strtotime($inicioP);
                $diasP = (int)floor($diferencaP / (60 * 60 * 24));
                if ($diasP == 0) {
                    $diasP = 1;
                }
                $tipoProcesso = $view->Util->mostraProjetosTiposProcesso($processo['projeto_tipo_processo_id']);
                $dadosJson['data'][] = array(
                    'id' => $projeto['Projeto']['id'] . $processo['id'],
                    'start_date' => $view->Util->format_date_gantt($view->Util->format_date($processo['previsao_inicio'])),
                    'duration' => $diasP,
                    'text' => $tipoProcesso['ProjetosTiposProcesso']['titulo'],
                    'progress' => ($processo['percentual_execucao'] / 100),
                    'order' => '"' . $y . '"',
                    'parent' => $projeto['Projeto']['id'],
                    'open' => false
                );
                $dadosJson['links'][] = array(
                    'id' => $l++,
                    'source' => $projeto['Projeto']['id'],
                    'target' => $projeto['Projeto']['id'] . $processo['id'],
                    'type' => 1
                );

                $p = 0;
                $this->Cliente->Projeto->ProjetosProcesso->ProjetosProcessosAtividade->filterBindings(array(
                    'ProjetosProcesso'
                ));
                $atividades = $this->Cliente->Projeto->ProjetosProcesso->ProjetosProcessosAtividade->find('all', array(
                    'conditions' => array(
                        'ProjetosProcessosAtividade.projeto_processo_id' => $processo['id']
                    )
                ));
                foreach ($atividades as $atividade) {
                    if (!empty($atividade['ProjetosProcessosAtividade']['inicio']) and !empty($atividade['ProjetosProcessosAtividade']['termino'])) {
                        $p++;
                        $inicioA = $view->Util->format_date2($atividade['ProjetosProcessosAtividade']['inicio']);
                        $terminoA = $view->Util->format_date2($atividade['ProjetosProcessosAtividade']['termino']);
                        $diferencaA = strtotime($terminoA) - strtotime($inicioA);
                        $diasA = (int)floor($diferencaA / (60 * 60 * 24));
                        if ($diasA == 0) {
                            $diasA = 1;
                        }
                        $dadosJson['data'][] = array(
                            'id' => $projeto['Projeto']['id'] . $processo['id'] . $atividade['ProjetosProcessosAtividade']['id'],
                            'start_date' => $view->Util->format_date_gantt($atividade['ProjetosProcessosAtividade']['inicio']),
                            'duration' => $diasA,
                            'text' => $atividade['ProjetosTiposProcessosAtividade']['titulo'],
                            'progress' => 0,
                            'order' => '"' . $p . '"',
                            'parent' => $projeto['Projeto']['id'] . $processo['id'],
                            'open' => false
                        );
                        $dadosJson['links'][] = array(
                            'id' => $l++,
                            'source' => $projeto['Projeto']['id'] . $processo['id'],
                            'target' => $projeto['Projeto']['id'] . $processo['id'] . $atividade['ProjetosProcessosAtividade']['id'],
                            'type' => 2
                        );
                    }
                }
            }
            $percentualProjeto = round($percentualProcessos / ($y * 100), 2);
            $inicio = $view->Util->format_date2($projeto['Projeto']['inicio']);
            $termino = $view->Util->format_date2($projeto['Projeto']['termino']);
            $diferenca = strtotime($termino) - strtotime($inicio);
            $dias = (int)floor($diferenca / (60 * 60 * 24));
            if ($dias == 0) {
                $dias = 1;
            }
            $dadosJson['data'][] = array(
                'id' => $projeto['Projeto']['id'],
                'start_date' => $view->Util->format_date_gantt($projeto['Projeto']['inicio']),
                'duration' => $dias,
                'text' => $projeto['Projeto']['titulo'],
                'progress' => $percentualProjeto,
                'order' => '"' . $i . '"',
                'open' => false
            );
        }
        echo json_encode($dadosJson);
    }

    public function cronograma($id = null)
    {
        $this->layout = 'cronograma';
    }

    public function gerarPdf()
    {
        $pesquisa = [];
        if (!empty($this->request->query['status'])) {
            array_push($pesquisa, ['Cliente.status' => $this->request->query['status']]);
        }
        if (!empty($this->request->query['ativo'])) {
            array_push($pesquisa, ['Cliente.ativo' => $this->request->query['ativo']]);
        }
        if (!empty($this->request->query['tipo'])) {
            array_push($pesquisa, ['Cliente.tipo' => $this->request->query['tipo']]);
        }
        if (!empty($this->request->query['cidade'])) {
            array_push($pesquisa, ['Cliente.cidade' => $this->request->query['cidade']]);
        }
        if (!empty($this->request->query['inicio'])) {
            array_push($pesquisa, ['Cliente.created >=' => $this->converterData($this->request->query['inicio']),
                'Cliente.created <=' => $this->converterData($this->request->query['termino'])]);
        }
        $this->Cliente->recursive = -1;
        $clientes = $this->Cliente->find('all', [
            'conditions' => $pesquisa
        ]);

        $this->reconfiguraWKHTMLTOPDF();
        $this->layout = 'pdf';
        $this->set('clientes', $clientes);
        $this->render('view');
    }

    private function reconfiguraWKHTMLTOPDF()
    {
        Configure::write('CakePdf', array(
            // 'binary' => '/usr/bin/wkhtmltopdf.sh',
            'binary' => '/usr/local/bin/wkhtmltopdf',
            'engine' => 'CakePdf.WkHtmlToPdf',
            'options' => array(
                'print-media-type' => true,
                'outline' => true,
                'dpi' => 96
            ),
            'margin' => array(
                'bottom' => 8,
                'left' => 5,
                'right' => 5,
                'top' => 5
            ),
            'orientation' => 'portrait',
            'download' => false
        ));
    }

    public function gerarExcel()
    {
        $pesquisa = [];
        if (!empty($this->request->query['status'])) {
            array_push($pesquisa, ['Cliente.status' => $this->request->query['status']]);
        }
        if (!empty($this->request->query['ativo'])) {
            array_push($pesquisa, ['Cliente.ativo' => $this->request->query['ativo']]);
        }
        if (!empty($this->request->query['tipo'])) {
            array_push($pesquisa, ['Cliente.tipo' => $this->request->query['tipo']]);
        }
        if (!empty($this->request->query['cidade'])) {
            array_push($pesquisa, ['Cliente.cidade' => $this->request->query['cidade']]);
        }
        if (!empty($this->request->query['inicio'])) {
            array_push($pesquisa, ['Cliente.created >=' => $this->converterData($this->request->query['inicio']),
                'Cliente.created <=' => $this->converterData($this->request->query['termino'])]);
        }
        if (isset($this->request->query['ata'])) {
            if (!empty($this->request->query['inicioAta'])) {
                array_push($pesquisa, ['Atas.data >=' => $this->converterData($this->request->query['inicioAta']),
                    'Atas.data <=' => $this->converterData($this->request->query['terminoAta'])]);
            }
        }
        $this->Cliente->recursive = -1;

        if (isset($this->request->query['ata']) && $this->request->query['ata'] == 'S') {
            $clientes = $this->Cliente->find('all', [
                'fields' => ['Cliente.razao_social', 'Cliente.contato',
                    'Cliente.telefone', 'Cliente.e_mail', 'Cliente.e_mail_2', 'Atas.assuntos_discutidos',
                    'Atas.data'],
                'conditions' => $pesquisa,
                'joins' => [
                    [
                        'table' => 'atas', 'alias' => 'Atas', 'type' => 'LEFT',
                        'conditions' => ['Atas.cliente_id = Cliente.id']
                    ]
                ],
                'order' => ['Cliente.razao_social ASC']
            ]);
        } else {
            $clientes = $this->Cliente->find('all', [
                'conditions' => $pesquisa,
                'order' => ['Cliente.razao_social ASC']
            ]);
        }
        $filtros = 'Status: ';
        $filtros .= ($this->request->query['status'] == 'R') ? 'Receptivo' : 'Efetivado';
        $filtros .= ' | Ativo: ';
        $filtros .= ($this->request->query['ativo'] == 'N') ? 'Não' : 'Sim';
        if (!empty($this->request->query['cidade'])) {
            $filtros .= ' | Cidade: ' . $this->request->query['cidade'];
        }
        if (!empty($this->request->query['inicio'])) {
            $filtros .= ' | De: ' . $this->request->query['inicio']
                . ' até: ' . $this->request->query['termino'];
        }
        if (isset($this->request->query['inicioAta']) && !empty($this->request->query['inicioAta'])) {
            $filtros .= ' | Atas de: ' . $this->request->query['inicioAta']
                . ' até: ' . $this->request->query['terminoAta'];
        }

        $excel = new PHPExcel();
        // Set document properties
        $excel->getProperties()->setCreator($this->Auth->user('name'))
            ->setLastModifiedBy($this->Auth->user('name'))
            ->setTitle("Relatório de Clientes");

        // Add some data
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('F2')->getFont()->setBold(true);
        if (isset($this->request->query['ata']) && $this->request->query['ata'] == 'S') {
            $excel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);
        }
        $excel->setActiveSheetIndex()->setCellValue('A1', 'Relatório de Empresas');
        $excel->setActiveSheetIndex()->setCellValue('B1', 'Filtros: ' . $filtros);
        $excel->setActiveSheetIndex()
            ->setCellValue('A2', 'Nome')
            ->setCellValue('B2', 'Contato')
            ->setCellValue('C2', 'Telefone')
            ->setCellValue('D2', 'Email')
            ->setCellValue('E2', 'Email 2');
        if (isset($this->request->query['ata']) && $this->request->query['ata'] == 'S') {
            $excel->setActiveSheetIndex()->setCellValue('F2', 'Ata');
        }

        // Rename worksheet
        $excel->getActiveSheet()->setTitle('Clientes');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excel->setActiveSheetIndex(0);

        $linha = 3;
        foreach ($clientes as $cliente) {
            $excel->getActiveSheet()->setCellValueByColumnAndRow(0, $linha, $cliente['Cliente']['razao_social']);
            $excel->getActiveSheet()->setCellValueByColumnAndRow(1, $linha, $cliente['Cliente']['contato']);
            $excel->getActiveSheet()->setCellValueByColumnAndRow(2, $linha, $cliente['Cliente']['telefone']);
            $excel->getActiveSheet()->setCellValueByColumnAndRow(3, $linha, $cliente['Cliente']['e_mail']);
            $excel->getActiveSheet()->setCellValueByColumnAndRow(4, $linha, $cliente['Cliente']['e_mail_2']);
            if (isset($this->request->query['ata']) && $this->request->query['ata'] == 'S') {
                $excel->getActiveSheet()->setCellValueByColumnAndRow(5, $linha, $cliente['Atas']['assuntos_discutidos']);
            }
            $linha++;
        }

        $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        if (isset($this->request->query['ata']) && $this->request->query['ata'] == 'S') {
            $excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        }

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="relatorioClientes.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

}
