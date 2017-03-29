<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP ClientesTipoEducacao
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class ClientesTipoEducacao extends AppModel {
    
    var $useTable = 'clientes_has_tipos_educacao';

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
        'TipoEducacao' => array(
            'className' => 'TipoEducacao',
            'foreignKey' => 'tipo_educacao_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
