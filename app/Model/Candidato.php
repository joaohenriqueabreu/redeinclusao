<?php
App::uses('AppModel', 'Model');
/**
 * Candidato Model
 *
 * @property EstadoCivil $EstadoCivil
 * @property Origem $Origem
 * @property User $User
 * @property ExperienciasProfissional $ExperienciasProfissional
 * @property ProcessosSeletivo $ProcessosSeletivo
 * @property CursosAcademicosTecnico $CursosAcademicosTecnico
 * @property Historico $Historico
 * @property Idioma $Idioma
 */

class Candidato extends AppModel {

    public $actsAs = array(
    	'Upload.Upload' => array(
    		'foto' => array(
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
		'cpf' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'identidade' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'data_nascimento' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sexo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estado_civil_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tem_filhos' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cep' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'logradouro' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'numero' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'bairro' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cidade' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'escolaridade_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'origem_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'parecer_entrevistador' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
     			//'allowEmpty' => false,
				//'required' => false,
 				//'last' => false, // Stop validation after this rule
 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
 			),
 		),
 		'user_id' => array(
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
 		'EstadosCivil' => array(
 			'className' => 'EstadosCivil',
 			'foreignKey' => 'estado_civil_id',
 			'conditions' => '',
 			'fields' => '',
 			'order' => ''
 		),
 		'PretensoesSalarial' => array(
 			'className' => 'PretensoesSalarial',
 			'foreignKey' => 'pretensao_salarial_id',
 			'conditions' => '',
 			'fields' => '',
 			'order' => ''
 		),
 		'Origem' => array(
 			'className' => 'Origem',
 			'foreignKey' => 'origem_id',
 			'conditions' => '',
 			'fields' => '',
 			'order' => ''
 		),
 		'Escolaridade' => array(
 			'className' => 'Escolaridade',
 			'foreignKey' => 'escolaridade_id',
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

 /**
  * hasMany associations
  *
  * @var array
  */
 	public $hasMany = array(
 		'ExperienciasProfissional' => array(
 			'className' => 'ExperienciasProfissional',
 			'foreignKey' => 'candidato_id',
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
		'AtasCandidato' => array(
			'className' => 'AtasCandidato',
			'foreignKey' => 'candidato_id',
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
		'ProcessosSeletivo' => array(
			'className' => 'ProcessosSeletivo',
			'foreignKey' => 'candidato_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'id desc',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CandidatosHistorico' => array(
			'className' => 'CandidatosHistorico',
			'foreignKey' => 'candidato_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'data desc',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CandidatosDocumento' => array(
			'className' => 'CandidatosDocumento',
			'foreignKey' => 'candidato_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'id desc',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'CursosAcademicosTecnico' => array(
			'className' => 'CursosAcademicosTecnico',
			'joinTable' => 'candidatos_cursos_academicos_tecnicos',
			'foreignKey' => 'candidato_id',
			'associationForeignKey' => 'curso_academico_tecnico_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Idioma' => array(
			'className' => 'Idioma',
			'joinTable' => 'candidatos_idiomas',
			'foreignKey' => 'candidato_id',
			'associationForeignKey' => 'idioma_id',
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

