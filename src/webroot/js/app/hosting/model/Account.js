Ext.define('labinfsis.hosting.model.Account', {
    extend: 'Ext.data.Model',
    fields: [{
        name:'id',
        type: 'int',
        mapping: 'id'
    },{
        name:'user_id',
        type: 'int',
        mapping: 'user_id'
    },
    'title',
    'first_name',
    'last_name',
    'email',
    'phone',
    'account_name',
    'account_password',
    'account_description',
    'servers',
    'quota_limit',
    'quota_tall',
    'status',
    {
        name:'expired',
        type:'date', 
        dateFormat:'Y-m-d H:i:s',
        mapping:'expired'
    },
    'home_dir_config',
    'home_dir',
    {
        name:'accessed',
        type:'date', 
        dateFormat:'Y-m-d H:i:s',
        mapping:'accessed'
    },
    
    'shell',{
        name:'is_saved',
        type: 'bool',
        mapping: 'is_saved'
    },{
        name:'is_active',
        type: 'bool',
        mapping: 'is_active'
    },{
        name:'is_delete',
        type: 'bool',
        mapping: 'is_delete'
    }]
});