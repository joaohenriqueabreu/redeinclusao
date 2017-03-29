<?php
App::uses('AppModel', 'Model');
/**
 * CandidatosDocumento Model
 *
 * @property Candidatos $Candidatos
 * @property User $User
 */
class ClientesDocumento extends AppModel {

    public $actsAs = array(
    	'Upload.Upload' => array(
    		'arquivo' => array(
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
		'cliente_id' => array(
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
			'notempty' => array(
				'rule' => array('notempty'),
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
		)
	);
}
