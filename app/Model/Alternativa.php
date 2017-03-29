<?php
App::uses('AppModel', 'Model');

class Alternativa extends AppModel{

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pergunta' => array(
			'className' => 'Pergunta',
			'foreignKey' => 'pergunta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
?>