<?php
App::uses('AppModel', 'Model');
/**
 * TiposPerguntasLevantamento Model
 *
 */
class TiposPerguntasLevantamento extends AppModel {
    var $displayField = 'nome';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nome' => array(
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
}
