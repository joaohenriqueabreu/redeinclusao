<?php

App::uses('AppController', 'Controller');

/**
 * IndicadoresAnos Controller
 *
 * @property IndicadoresAno $IndicadoresAno
 * @property PaginatorComponent $Paginator
 */
class IndicadoresAnosController extends AppController {

    /**
     *
     * @var array
     */
    public $uses = array('IndicadoresAno', 'IndicadoresValor', 'IndicadoresItem', 'IndicadoresArea');

    public function beforeFilter() {
        parent::beforeFilter();
        $conditions = array();
        if (isset($this->params->query['Conditions']) && !empty($this->params->query['Conditions'])) {
            $conditions = $this->params->query['Conditions'];
        }

        $this->DataTable->settings = array(
            'IndicadoresAno' => array(
                'autoRender' => false,
                'autoData' => false,
                'conditions' => $conditions,
                'order' => array('IndicadoresAno.ano desc'),
                'columns' => array(
                    'IndicadoresAno.ano' => array('label' => 'Ano'),
                    'IndicadoresAno.metas' => array('label' => 'Metas'),
                    'IndicadoresAno.conclusoes' => array('label' => 'Conclusões'),
                    'Ações' => null
                ),
                'fields' => array('id'),
            )
        );
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->DataTable->setViewVar('IndicadoresAno');
    }

    /**
     * view method
     *
     * Obs.: habilitar max_input_vars acima de 10000 para PHP 5.4 e
     * inserir suhosin.post.max_vars=4252 e suhosin.request.max_vars=4252, caso
     * extensão suhosin esteja habilitada
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->IndicadoresAno->exists($id)) {
            throw new NotFoundException(__('Cadastro inválido.'));
        }
        if ($this->request->is('post')) {
            $error = true;
            foreach ($this->request->data['IndicadoresValor'] as $key => $dados) {
                if (!array_key_exists('previsto', $dados)) {
                    $previsto = null;
                } else {
                    $previsto = $dados['previsto'];
                }
                if (!array_key_exists('realizado', $dados)) {
                    $realizado = 0;
                } else {
                    $realizado = $dados['realizado'];
                }
                if (!$this->IndicadoresValor->updateAll(array('IndicadoresValor.previsto' => "'" . $previsto
                            . "'", 'IndicadoresValor.realizado' => "'" . $realizado . "'"), array('IndicadoresValor.id' => $key))) {
                    $error = false;
                }
            }

            if ($error) {
                $this->Session->setFlash(__('Dados salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
            } else {
                $this->Session->setFlash(__('Dados não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $options = array('conditions' => array('IndicadoresAno.' . $this->IndicadoresAno->primaryKey => $id), 'recursive' => 0); 
        $dados = $this->IndicadoresAno->find('first', $options);
       // print_r($dados);
       // exit;      
        $this->set('indicadoresAno', $this->IndicadoresAno->find('first', $options));
        $this->IndicadoresValor->filterBindings(array('IndicadoresAno', 'User'));
        $indicadoresValores = $this->IndicadoresValor->find('all', array(
            'joins' => array(array(
                'type' => 'INNER',
                'table' => 'indicadores_itens',
                'alias' => 'IndicadoresItens',
                'conditions' => array('IndicadoresValor.indicador_item_id = IndicadoresItens.id')
            ),
            array(
                'type' => 'INNER',
                'table' => 'indicadores_areas',
                'alias' => 'IndicadoresAreas',
                'conditions' => array('IndicadoresItens.indicador_area_id = IndicadoresAreas.id')
            )),
            'conditions' => array('IndicadoresValor.indicador_ano_id' => $id, 'IndicadoresAreas.id IN ('.$dados['IndicadoresAno']['areas'].')'),
            'order' => ['IndicadoresItem.nome', 'IndicadoresValor.mes ASC']));
        
        $this->set('indicadoresValores', $indicadoresValores);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {            

            $areas = '';
            foreach($this->request->data['IndicadoresAno']['Area'] as $key => $value){
                $areas .= $value.',';
            }
            $areas = substr($areas, 0, -1);

            $this->IndicadoresAno->create();
            $userID = $this->Session->read('Auth.User.id');
            $this->request->data['IndicadoresAno']['areas'] = $areas;
            $this->request->data['IndicadoresAno']['user_id'] = $userID;
            if ($this->IndicadoresAno->save($this->request->data)) {
                $indicadorAno = $this->IndicadoresAno->id;
                $indicadores = $this->IndicadoresItem->find('all', array('conditions' => array('IndicadoresItem.ativo' => 'S')));
                $registrosIniciais = array();
                foreach ($indicadores as $indicador) {
                    for ($i = 1; $i <= 12; $i++) {
                        $registrosIniciais[]['IndicadoresValor'] = array(
                            'indicador_item_id' => $indicador['IndicadoresItem']['id'],
                            'indicador_ano_id' => $indicadorAno,
                            'mes' => $i,
                            'user_id' => $userID
                        );
                    }
                }
                if (!empty($registrosIniciais)) {
                    $this->IndicadoresValor->create();
                    if ($this->IndicadoresValor->saveAll($registrosIniciais)) {
                        $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                    }
                }
                return $this->redirect(array('action' => 'view', $indicadorAno));
            } else {
                $this->Session->setFlash(__('Cadastro não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $areas = $this->IndicadoresArea->find('list', array('order' => array('nome asc')));
        $this->set(compact('areas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->IndicadoresAno->exists($id)) {
            throw new NotFoundException(__('Cadastro inválido.'));
        }
        if ($this->request->is(array('post', 'put'))) {

            $areas = '';
            foreach($this->request->data['IndicadoresAno']['Area'] as $key => $value){
                $areas .= $value.',';
            }
            $areas = substr($areas, 0, -1);

            $this->request->data['IndicadoresAno']['areas'] = $areas;

            if ($this->IndicadoresAno->save($this->request->data)) {
                $this->Session->setFlash(__('Cadastro salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'view', $this->IndicadoresAno->id));
            } else {
                $this->Session->setFlash(__('Cadastro não salvo. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('IndicadoresAno.' . $this->IndicadoresAno->primaryKey => $id));
            $this->request->data = $this->IndicadoresAno->find('first', $options);
        }

        $array_areas = array();
      
        $areas = $this->IndicadoresArea->find('list', array('conditions' => array('id IN('.$this->request->data['IndicadoresAno']['areas'].')')));
         
        $list = array();
        foreach($areas as $key => $value){
            $list[] = $key;
        }
       
        $areas = $this->IndicadoresArea->find('list', array('order' => array('nome asc')));
        $this->set(compact('areas', 'list'));
    }

    public function atualiza_indicadores($indicadorAno) {
        $this->autoRender = false;
        $indicadoresAtuaisAno = $this->IndicadoresValor->find('list', array('fields' => array('indicador_item_id'), 'group' => array('indicador_item_id'), 'conditions' => array('indicador_ano_id' => $indicadorAno)));
        $indicadoresAtuais = array();
        foreach ($indicadoresAtuaisAno as $key => $value) {
            $indicadoresAtuais[$value] = $value;
        }
        $indicadores = $this->IndicadoresItem->find('all', array('conditions' => array('NOT' => array('IndicadoresItem.id' => $indicadoresAtuais), 'IndicadoresItem.ativo' => 'S')));
        if (!empty($indicadores)) {
            $userID = $this->Session->read('Auth.User.id');
            $registrosIniciais = array();
            foreach ($indicadores as $indicador) {
                for ($i = 1; $i <= 12; $i++) {
                    $registrosIniciais[]['IndicadoresValor'] = array(
                        'indicador_item_id' => $indicador['IndicadoresItem']['id'],
                        'indicador_ano_id' => $indicadorAno,
                        'mes' => $i,
                        'user_id' => $userID
                    );
                }
            }
            if (!empty($registrosIniciais)) {
                $this->IndicadoresValor->create();
                if ($this->IndicadoresValor->saveAll($registrosIniciais)) {
                    $this->Session->setFlash(__('Indicadores atualizado com sucesso.'), 'default', array('class' => 'alert alert-success'));
                }
            }
        } else {
            $this->Session->setFlash(__('Não há indicadores para atualizar.'), 'default', array('class' => 'alert alert-success'));
        }
        return $this->redirect(array('action' => 'view', $indicadorAno));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->IndicadoresAno->id = $id;
        if (!$this->IndicadoresAno->exists()) {
            throw new NotFoundException(__('Cadastro inválido.'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->IndicadoresAno->delete()) {
            $this->Session->setFlash(__('Cadastro removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('Cadastro não removido. Tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
