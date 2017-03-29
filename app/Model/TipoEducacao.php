<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP TipoEducacao
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class TipoEducacao extends AppModel {

    var $name = 'TipoEducacao';
    var $displayField = 'descricao';
    var $useTable = 'tipos_educacao';
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

}
