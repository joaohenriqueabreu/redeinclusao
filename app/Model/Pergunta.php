<?php
class Pergunta extends AppModel{

    public $validate = array(
		'tipo_pergunta' => array(
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

	var $belongsTo = array(
		'Questionario' => array(
			'className' => 'Questionario',
			'foreignKey' => 'questionario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'TiposPergunta' => array(
			'className' => 'TiposPergunta',
			'foreignKey' => 'tipo_pergunta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );

	var $hasMany = array(
		/*'Resposta' => array(
			'className' => 'Resposta',
			'foreignKey' => 'pergunta_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
		'Opcao' => array(
			'className' => 'Opcao',
			'foreignKey' => 'pergunta_id',
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
		'Alternativa' => array(
			'className' => 'Alternativa',
			'foreignKey' => 'pergunta_id',
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
?>