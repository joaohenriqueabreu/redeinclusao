<?php
App::uses('AppModel', 'Model');

/**
 * Cargo Model
 *
 * @property Colaborador $Colaborador
 */
class Cargo extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'nome';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'nome' => array(
            'notempty' => array(
                'rule' => array(
                    'notempty'
                )
            )
        )
    );
    // 'message' => 'Your custom message here',
    // 'allowEmpty' => false,
    // 'required' => false,
    // 'last' => false, // Stop validation after this rule
    // 'on' => 'create', // Limit validation to 'create' or 'update' operations
    
    // The Associations below have been created with all possible keys, those that are not needed can be removed
    
    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Colaborador' => array(
            'className' => 'Colaborador',
            'foreignKey' => 'cargo_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cargo_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
}
