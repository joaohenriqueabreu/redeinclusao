<?php

App::uses('AppModel', 'Model');

/**

 * ProcessosSeletivo Model

 *

 * @property Candidato $Candidato

 * @property Vaga $Vaga

 */

class ProcessosSeletivo extends AppModel {



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

		'vaga_id' => array(

			'numeric' => array(

				'rule' => array('numeric'),

				//'message' => 'Your custom message here',

				//'allowEmpty' => false,

				//'required' => false,

				//'last' => false, // Stop validation after this rule

				//'on' => 'create', // Limit validation to 'create' or 'update' operations

			),

		),

		'entrevista_triagem' => array(

			'notempty' => array(

				'rule' => array('notempty'),

				//'message' => 'Your custom message here',

				//'allowEmpty' => false,

				//'required' => false,

				//'last' => false, // Stop validation after this rule

				//'on' => 'create', // Limit validation to 'create' or 'update' operations

			),

		),

		'entrevista_psicologica' => array(

			'notempty' => array(

				'rule' => array('notempty'),

				//'message' => 'Your custom message here',

				//'allowEmpty' => false,

				//'required' => false,

				//'last' => false, // Stop validation after this rule

				//'on' => 'create', // Limit validation to 'create' or 'update' operations

			),

		),

		'entrevista_tecnica' => array(

			'notempty' => array(

				'rule' => array('notempty'),

				//'message' => 'Your custom message here',

				//'allowEmpty' => false,

				//'required' => false,

				//'last' => false, // Stop validation after this rule

				//'on' => 'create', // Limit validation to 'create' or 'update' operations

			),

		),

		'teste_psicologica' => array(

			'notempty' => array(

				'rule' => array('notempty'),

				//'message' => 'Your custom message here',

				//'allowEmpty' => false,

				//'required' => false,

				//'last' => false, // Stop validation after this rule

				//'on' => 'create', // Limit validation to 'create' or 'update' operations

			),

		),
		'exame_medico_admissional' => array(

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

		'Candidato' => array(

			'className' => 'Candidato',

			'foreignKey' => 'candidato_id',

			'conditions' => '',

			'fields' => '',

			'order' => ''

		),

		'Vaga' => array(

			'className' => 'Vaga',

			'foreignKey' => 'vaga_id',

			'conditions' => '',

			'fields' => '',

			'order' => ''

		)

	);

}

