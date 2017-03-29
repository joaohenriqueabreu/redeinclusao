<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 */
class UsersCliente extends AppModel {

    var $useTable = 'users_clientes';

    public $displayField = 'email';
    public $primaryKey = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
//        'username' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//        'nome' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
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
        'cliente_id' => array(
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
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
//		),
//		'Colaborador' => array(
//			'className' => 'Colaborador',
//			'foreignKey' => 'colaborador_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
		)
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
		if (isset($this->data['UsersCliente']['cliente_id'])) {
			$clienteId = $this->data['UsersCliente']['cliente_id'];
		} else {
			$clienteId = $this->field('cliente_id');
		}
		if (!$clienteId) {
			return null;
		} else {
			return array('Cliente' => array('id' => $clienteId));
		}
	}
}
