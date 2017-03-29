<?php

App::uses('AppController', 'Controller');

/**
 * InstituicoesAgendas Controller
 *
 * @property Agenda $Agenda
 * @property PaginatorComponent $Paginator
 */
class AgendasController extends AppController {

    public $uses = array('Agenda', 'Tarefa', 'Colaborador', 'EventoColaborador');

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
        
    }

    public function minha_agenda() {
        
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
        if (!$this->Agenda->exists($id)) {
            throw new NotFoundException(__('Cadastro inválido.'));
        }
        $options = array('conditions' => array('Agenda.' . $this->Agenda->primaryKey => $id));        
        $this->set('agenda', $this->Agenda->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->layout = 'ajax';
        $this->set('tipos', $this->Agenda->EventosTipo->find('list'));
        $this->set('colaboradores', $this->Colaborador->find('list'));
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
        $options = array('conditions' => array('Agenda.' . $this->Agenda->primaryKey => $id));
        $this->request->data = $this->Agenda->find('first', $options);
        // debug($this->request->data);
        // exit();
        $this->set('tipos', $this->Agenda->EventosTipo->find('list'));
        $this->set('colaboradores', $this->Colaborador->find('list'));
    }

    /**
     * salva method
     *
     * @return void
     */
    public function salva() {
        $this->autoRender = false;
        $view = new View($this);
        $util = $view->loadHelper('Util');
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Agenda']['inicio'] = $util->format_date2($this->request->data['Agenda']['inicio']) . ' ' . $this->request->data['Agenda']['hora_inicio'] . ':00';
            $this->request->data['Agenda']['termino'] = $util->format_date2($this->request->data['Agenda']['termino']) . ' ' . $this->request->data['Agenda']['hora_termino'] . ':00';
            if ($this->request->data['Agenda']['acao'] == 'add') {
                $this->request->data['Agenda']['user_id'] = $this->Session->read('Auth.User.id');
                $this->Agenda->create();
            } else {
                $id = $this->request->data['Agenda']['id'];
                $this->Agenda->id = $id;
                $this->request->data['Agenda']['arquivo'] = $this->upload($this->request->data['Agenda']['arquivo']);
            }
            
            if ($this->Agenda->save($this->request->data)) {
                if (empty($this->request->data['Agenda']['id'])) {
                    $id = $this->Agenda->getInsertID();
                } else {
                    $id = $this->request->data['Agenda']['id'];
                }
                $this->salvarColaboradores($this->request->data, $id);
                $this->salvarConvidados($this->request->data, $id);
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
    * Método para salvar os colaboradores relacionados ao evento
    * 
    * @param array $data Dados do formulário
    * @param string $id Código do registro do evento
    * @author Bruno Giovanni <suporte@allcomp.inf.br>
    **/
    private function salvarColaboradores($data = [], $id = '') {
        $participante = [];
        if (!empty($data['Agenda']['colaboradores'])) {
            foreach ($data['Agenda']['colaboradores'] as $colaborador) {
                $participante['EventoColaborador'] = [
                    'agenda_id' => $id,
                    'colaborador_id' => $colaborador
                ];

                $this->EventoColaborador->save($participante);
            }
        }
    }

    private function salvarConvidados($data = [], $id = '') {
        $convidado = [];
        for ($i = 0; $i < $data['Agenda']['quantidadeConvidados']; $i++) {
            $convidado['EventoParticipante'] = [
                'nome' => $data['convidado-' . $i],
                'agenda_id' => $id
            ];
            $this->Agenda->EventoParticipante->create();
            $this->Agenda->EventoParticipante->save($convidado);
        }
    }

    /**
     * json method
     *
     * @return void
     */
    public function json($origem = null, $usuario = null) {
        $this->autoRender = false;
        $this->Agenda->recursive = -1;
        if ($origem == 1) {           
            if (!empty($usuario) and $usuario <> 0) {
                $eventos = $this->Agenda->find('all', array('conditions' => array('user_id' => $usuario, 'inicio >=' => $_GET['start'], 'termino <=' => $_GET['end'])));
            } else {
                $eventos = $this->Agenda->find('all', array('conditions' => array('OR' => array('user_id' => $this->Session->read('Auth.User.id'), 'tipo' => 'E'), 'inicio >=' => $_GET['start'], 'termino <=' => $_GET['end'])));
            }
        } else {
            $eventos = $this->Agenda->find('all', array('conditions' => array('user_id' => $this->Session->read('Auth.User.id'), 'inicio >=' => $_GET['start'], 'termino <=' => $_GET['end'], 'tipo' => 'E')));
        }        

        $arr = array();
        $view = new View($this);
        $util = $view->loadHelper('Util');
        foreach ($eventos as $evento) {
            $titulo = $evento['Agenda']['titulo'];
            if ($origem == 1) {
                $nome = explode(' ', $util->mostraNomeUsuario($evento['Agenda']['user_id']));
                $titulo = $nome[0] . ' - ' . $evento['Agenda']['titulo'];
            }
            $AgendaInicio = explode(' ', $evento['Agenda']['inicio']);
            $AgendaTermino = explode(' ', $evento['Agenda']['termino']);
            if ($AgendaInicio[1] == '00:00:00') {
                $AgendaInicio = $util->format_date2($AgendaInicio[0]);
            } else {
                $AgendaInicio = $util->format_date2($AgendaInicio[0]) . 'T' . $AgendaInicio[1];
            }
            if ($AgendaTermino[1] == '00:00:00') {
                $AgendaTermino = $util->format_date2($AgendaTermino[0]);
            } else {
                $AgendaTermino = $util->format_date2($AgendaTermino[0]) . 'T' . $AgendaTermino[1];
            }
            if ($this->Session->read('Auth.User.id') == $evento['Agenda']['user_id']) {
                $edita = 1;
            } else {
                $edita = 0;
            }
            $arr[] = array(
                'id' => $evento['Agenda']['id'],
                'title' => $titulo,
                'start' => $AgendaInicio,
                'end' => $AgendaTermino,
                'origem' => 'A',
                'edita' => $edita,
                'color' => $util->coresAgenda($evento['Agenda']['cor'])
            );
        }

        $this->Tarefa->recursive = -1;
        $colaborador = $this->Session->read('Auth.User.colaborador_id');
        if (!empty($colaborador)) {
            if ($origem == 1) {
                if (!empty($usuario) and $usuario <> 0) {
                    $colaborador = $util->mostraUserColaborador($usuario);
                    $tarefas = $this->Tarefa->find('all', array('conditions' => array('colaborador_id' => $colaborador, 'inicio >=' => $_GET['start'], 'termino <=' => $_GET['end'])));
                } else {
                    $tarefas = $this->Tarefa->find('all', array('conditions' => array('inicio >=' => $_GET['start'], 'termino <=' => $_GET['end'])));
                }
            } else {
                $tarefas = $this->Tarefa->find('all', array('conditions' => array('colaborador_id' => $colaborador, 'inicio >=' => $_GET['start'], 'termino <=' => $_GET['end'])));
            }
        }
        foreach ($tarefas as $tarefa) {
            $titulo = $tarefa['Tarefa']['tarefa'];

            if (!empty($tarefa['Tarefa']['colaborador_id']) and $tarefa['Tarefa']['colaborador_id'] <> $colaborador) {
                $nome = explode(' ', $util->mostraNomeColaborador($tarefa['Tarefa']['colaborador_id']));
                $cliente = '';
                if (!empty($tarefa['Tarefa']['cliente_id'])) {
                    $cliente = $util->mostraNomeCliente($tarefa['Tarefa']['cliente_id']);
                }
                $titulo = $cliente . ' - ' . $nome[0] . ' - ' . $tarefa['Tarefa']['tarefa'];
            }
            $TarefaInicio = $util->format_date2($tarefa['Tarefa']['inicio']);
            $TarefaTermino = $util->format_date2($tarefa['Tarefa']['termino']);
            $arr[] = array(
                'id' => $tarefa['Tarefa']['id'],
                'title' => $titulo,
                'start' => $TarefaInicio,
                'end' => $TarefaTermino,
                'origem' => 'T',
                'color' => $util->coresStatusAtividades($tarefa['Tarefa']['status'])
            );
        }
        $json_response = json_encode($arr);
        echo $json_response;
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->autoRender = false;
        $this->Agenda->id = $id;
        if ($this->Agenda->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
    public function update() {
        $this->autoRender = false;
        $vars = $this->params['url'];
        $this->Agenda->id = $vars['id'];
        $this->Agenda->saveField('inicio', $vars['start']);
        $this->Agenda->saveField('termino', $vars['end']);
    }

}
