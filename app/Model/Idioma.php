<?php
App::uses('AppModel', 'Model');
/**
 * Idioma Model
 *
 * @property Candidato $Candidato
 */
class Idioma extends AppModel {

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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Candidato' => array(
			'className' => 'Candidato',
			'joinTable' => 'candidatos_idiomas',
			'foreignKey' => 'idioma_id',
			'associationForeignKey' => 'candidato_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
