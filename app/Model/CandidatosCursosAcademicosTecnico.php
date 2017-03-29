<?php
App::uses('AppModel', 'Model');
/**
 * CandidatosCursosAcademicosTecnico Model
 *
 * @property Candidato $Candidato
 * @property CursoAcademicoTecnico $CursoAcademicoTecnico
 */
class CandidatosCursosAcademicosTecnico extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'candidato_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'curso_academico_tecnico_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Candidato' => array(
			'className' => 'Candidato',
			'foreignKey' => 'candidato_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CursosAcademicosTecnico' => array(
			'className' => 'CursosAcademicosTecnico',
			'foreignKey' => 'curso_academico_tecnico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
