<?php
App::uses('AppModel', 'Model');
/**
 * Tarefa Model
 *
 */

class Acao extends AppModel {

    public $actsAs = array(
    	'Upload.Upload' => array(
    		'anexo' => array(
    			'fields' => array(
    				'dir' => 'dir'
    			),
    			'path'=> '{ROOT}webroot{DS}files{DS}{model}{DS}{field}{DS}',
    			'deleteOnUpdate'=>true
    		)
    	)
    );

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tarefa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'colaborador_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descricao' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quando' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tarefa' => array(
			'className' => 'Tarefa',
			'foreignKey' => 'tarefa_id',
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