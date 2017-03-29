<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP TurnosEscola
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class TurnosEscola extends AppModel {

    var $name = 'TurnosEscola';
    var $displayField = 'turno';
    var $useTable = 'turnos_escola';
    public $validate = array(
        'turno' => array(
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
                'message' => 'Turno já cadastrado!'
            ]
        ),
    );

}
