<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Historico
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class Historico extends AppModel {

    var $name = 'Historico';
    var $displayField = 'descricao';
    var $useTable = 'historicos';
    public $validate = array(
        'descricao' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Descreva sobre o evento.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
        'data' => [
            'notempty' => [
                'rule' => ['notEmpty'],
                'message' => 'Informe a data do evento.'
            ]
        ]
    );
    public $belongsTo = [
        'TiposHistorico' => [
            'className' => 'TiposHistorico',
            'foreignKey' => 'tipo_historico_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'User' => [
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'Cliente' => [
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
    ];

}
