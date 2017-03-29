<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP TiposHistorico
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class TiposHistorico extends AppModel {

    var $name = 'TiposHistorico';
    var $primaryKey = 'id';
    var $displayField = 'descricao';
    var $useTable = 'tipos_historicos';
    public $validate = array(
        'descricao' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => [
                'rule' => ['isUnique'],
                'message' => 'Esta descrição já existe!'
            ]
        ),
    );

    public $hasMany = [
        'Historico' => [
            'className' => 'Historico',
            'foreignKey' => 'tipo_historico_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ]
    ];

}
