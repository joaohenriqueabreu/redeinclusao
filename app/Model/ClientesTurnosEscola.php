<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP ClientesTurnosEscola
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class ClientesTurnosEscola extends AppModel {

    var $useTable = 'clientes_has_turnos_escola';
    
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'TurnosEscola' => array(
            'className' => 'TurnosEscola',
            'foreignKey' => 'turnos_escola_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
