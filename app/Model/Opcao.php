<?php
class Opcao extends AppModel{
    var $useTable = 'opcoes';
    
	var $belongsTo = array(
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