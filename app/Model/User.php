<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {

    var $useTable = 'users';

    public $displayField = 'nome';
    public $primaryKey = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
        'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
        'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        /// -------------- Baanko change --------------
        /// Acrescentando a FK empresa_id
        /// Foi acrescentado como empresa_id e não cliente_id pois gerou ambiguidade em algumas consultas da tabela clientes
        'empresa_id' => array(
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
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Colaborador' => array(
			'className' => 'Colaborador',
			'foreignKey' => 'colaborador_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        /// Acrescentando a FK empresa_id
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'empresa_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	
	public $actsAs = array('Acl' => array('type' => 'requester'));

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
			$groupId = $this->data['User']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}

        /// Acrescentando a FK empresa_id
		if (isset($this->data['User']['empresa_id'])) {
            $clienteId = $this->data['User']['empresa_id'];
        } else {
            $clienteId = $this->field('empresa_id');
        }

		if (!$groupId && !$clienteId) {
			return null;
		} else {
			return array('Group' => array('id' => $groupId), 'Cliente' => array('id' => $clienteId));
		}
	}
}
