<?php

App::uses('AppModel', 'Model');

class Evento extends AppModel {

	var $displayField = 'title';

	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'start' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		)
	);

	public $belongsTo = array(
		'EventosTipo' => array(
			'className' => 'EventosTipo',
			'foreignKey' => 'evento_tipo_id'
		)
	);

}
?>