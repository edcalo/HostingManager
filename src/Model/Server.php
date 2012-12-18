<?php

App::uses('AppModel', 'Model');

/**
 * Server Model
 *
 * @property Account $Account
 * @property Service $Service
 */
class Server extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'server_name';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'server_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Nombre del servidor requerido',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'ip' => array(
            'ip'=>array(
                'rule'=>array('ip', 'IPv4'),
                'message'=>'No es una IP v4 valida'
            )
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Account' => array(
            'className' => 'Account',
            'joinTable' => 'accounts_servers',
            'foreignKey' => 'server_id',
            'associationForeignKey' => 'account_id',
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
        'Service' => array(
            'className' => 'Service',
            'joinTable' => 'servers_services',
            'foreignKey' => 'server_id',
            'associationForeignKey' => 'service_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

}
