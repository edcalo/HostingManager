<?php
App::uses('AppModel', 'Model');
/**
 * Account Model
 *
 * @property QuotaLimit $QuotaLimit
 * @property QuotaTally $QuotaTally
 * @property User $User
 * @property Server $Server
 */
class Account extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'account_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'User is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'server_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Server is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'account_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'User name is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Username format not valid. Valid characters: letters and numbers only',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'account_password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Password is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'home_dir' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Work directory is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'expired' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Expired date is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'inlist' => array(
				'rule' => array('inlist', array('expired','enable','disable','quota_exeded')),
				'message' => 'Account status value is invalid, valid values (expired,enable,disable,quota_exeded)',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'QuotaLimit' => array(
			'className' => 'QuotaLimit',
			'foreignKey' => 'account_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'QuotaTally' => array(
			'className' => 'QuotaTally',
			'foreignKey' => 'account_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

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
		'Server' => array(
			'className' => 'Server',
			'foreignKey' => 'server_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
