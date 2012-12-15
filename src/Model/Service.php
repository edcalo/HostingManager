<?php
App::uses('AppModel', 'Model');
/**
 * Service Model
 *
 * @property Server $Server
 */
class Service extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'service_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'service_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_port' => array(
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Server' => array(
			'className' => 'Server',
			'joinTable' => 'servers_services',
			'foreignKey' => 'service_id',
			'associationForeignKey' => 'server_id',
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
