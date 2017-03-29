<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP EventoParticipante
 * @author Bruno Giovanni <suporte@allcomp.inf.br>
 */
class EventoParticipante extends AppModel {

    var $useTable = 'eventos_participantes';

    var $displayField = 'nome';

	public $validate = array(
		'nome' => array(
			'notempty' => array(
				'rule' => array('notempty'),
                'message' => 'Informe um nome!'
			),
		),
	);
    
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Agenda' => array(
            'className' => 'Agenda',
            'foreignKey' => 'agenda_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
