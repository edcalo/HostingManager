<?php

App::uses('AppModel', 'Model');

/**
 * QuotaLimit Model
 *
 * @property Account $Account
 */
class QuotaLimit extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'limit_type';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'account_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Account is required.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'account_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Account is required.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'quota_type' => array(
            'inlist' => array(
                'rule' => array('inlist', array('user','group','class','all')),
                'message' => 'Quota type invalid value, valid values (user,group,class,all)',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'per_session' => array(
            'inlist' => array(
                'rule' => array('inlist', array('false','true')),
                'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'limit_type' => array(
            'inlist' => array(
                'rule' => array('inlist'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Account' => array(
            'className' => 'Account',
            'foreignKey' => 'account_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
