<?php

App::uses('AppModel', 'Model');

/**
 * Parceiro Model
 *
 */
class Parceiro extends AppModel {

    public $actsAs = array(
    	'Upload.Upload' => array(
    		'curriculo' => array(
    			'fields' => array(
    				'dir' => 'dir'
    			),
    			'path'=> '{ROOT}webroot{DS}files{DS}{model}{DS}{field}{DS}',
    			'deleteOnUpdate'=>true
    		)
    	)
    );

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
		'tipo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nome' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ativo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
 /**
  * belongsTo associations
  *
  * @var array
  */
 	public $belongsTo = array(
 		'User' => array(
 			'className' => 'User',
 			'foreignKey' => 'user_id',
 			'conditions' => '',
 			'fields' => '',
 			'order' => ''
 		)
 	);
 }

