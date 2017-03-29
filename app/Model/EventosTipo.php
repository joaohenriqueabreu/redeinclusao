<?php
App::uses('AppModel', 'Model');
 
class EventosTipo extends AppModel {

	var $primaryKey = 'id';
	var $displayField = 'name';

	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);

	public $hasMany = array(
		'Agenda' => array(
			'className' => 'Agenda',
			'foreignKey' => 'evento_tipo_id',
			'dependent' => false,
		)
	);

}
?>