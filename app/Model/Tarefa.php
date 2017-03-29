<?php
App::uses('AppModel', 'Model');
/**
 * Tarefa Model
 *
 */

class Tarefa extends AppModel {

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
		'tarefa' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
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
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		),
		'RespostasLevantamento' => array(
			'className' => 'RespostasLevantamento',
			'foreignKey' => 'resposta_levantamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ata' => array(
			'className' => 'Ata',
			'foreignKey' => 'ata_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
 /**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Acao' => array(
			'className' => 'Acao',
			'foreignKey' => 'tarefa_id',
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