<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP EventoColaborador
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class EventoColaborador extends AppModel {

    var $useTable = 'eventos_colaboradores';
    
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Agenda' => array(
            'className' => 'Agenda',
            'foreignKey' => 'agenda_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Colaborador' => array(
            'className' => 'Colaborador',
            'foreignKey' => 'colaborador_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
