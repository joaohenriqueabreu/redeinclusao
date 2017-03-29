<?php
App::uses('AppModel', 'Model');

/**
 * Cliente Model
 *
 * @property Contrato $Contrato
 * @property Proposta $Proposta
 */
class Cliente extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'razao_social';
    public $primaryKey = 'id';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'razao_social' => array(
            'notempty' => array(
                'rule' => array(
                    'notempty'
                )
            )
        ),
        // 'message' => 'Your custom message here',
        // 'allowEmpty' => false,
        // 'required' => false,
        // 'last' => false, // Stop validation after this rule
        // 'on' => 'create', // Limit validation to 'create' or 'update' operations
        
        'ativo' => array(
            'notempty' => array(
                'rule' => array(
                    'notempty'
                )
            )
        ),
        // 'message' => 'Your custom message here',
        // 'allowEmpty' => false,
        // 'required' => false,
        // 'last' => false, // Stop validation after this rule
        // 'on' => 'create', // Limit validation to 'create' or 'update' operations
    );
    // The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Cargo' => array(
            'className' => 'Cargo',
            'foreignKey' => 'cargo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'RespostasLevantamento' => array(
            'className' => 'RespostasLevantamento',
            'foreignKey' => 'cliente_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => 'created desc',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Contrato' => array(
            'className' => 'Contrato',
            'foreignKey' => 'cliente_id',
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
        'Ata' => array(
            'className' => 'Ata',
            'foreignKey' => 'cliente_id',
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
        'Vaga' => array(
            'className' => 'Vaga',
            'foreignKey' => 'cliente_id',
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
        'ClientesDocumento' => array(
            'className' => 'ClientesDocumento',
            'foreignKey' => 'cliente_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => 'created desc',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'ClientesHistorico' => array(
            'className' => 'ClientesHistorico',
            'foreignKey' => 'cliente_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => 'data desc',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Contato' => array(
            'className' => 'ClientesContato',
            'foreignKey' => 'cliente_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => 'nome',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Tarefa' => array(
            'className' => 'Tarefa',
            'foreignKey' => 'cliente_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => 'termino asc',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'ClientesServico' => array(
            'className' => 'ClientesServico',
            'foreignKey' => 'cliente_id',
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
        'Historico' => array(
            'className' => 'Historico',
            'foreignKey' => 'cliente_id',
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

    public $hasAndBelongsToMany = array(
        'Questionario' => array(
            'className' => 'Questionario',
            'joinTable' => 'clientes_questionarios',
            'foreignKey' => 'cliente_id',
            'associationForeignKey' => 'questionario_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        ),
        'TipoEducacao' => [
            'className' => 'TipoEducacao',
            'joinTable' => 'clientes_has_tipos_educacao',
            'foreignKey' => 'cliente_id',
            'associationForeignKey' => 'tipo_educacao_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        ],
        'TurnosEscola' => [
            'className' => 'TurnosEscola',
            'joinTable' => 'clientes_has_turnos_escola',
            'foreignKey' => 'cliente_id',
            'associationForeignKey' => 'turnos_escola_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        ],
    );
}
