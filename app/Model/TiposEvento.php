<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP TiposEvento
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class TiposEvento extends AppModel {

    var $name = 'TiposEvento';
    var $primaryKey = 'id';
    var $displayField = 'descricao';
    var $useTable = 'tipos_eventos';
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
        'Eventos' => [
            'className' => 'Eventos',
            'foreignKey' => 'tipo_evento_id',
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
