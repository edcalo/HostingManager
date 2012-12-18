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
    'account_name'
    ,{
        name:'uid',
        type:'int',
        mapping: 'uid'
    },{
        name:'gid',
        type:'int',
        mapping: 'gid'
    },
    'home_dir',
    {
        name:'status',
        type: 'int',
        mapping: 'status'
    },
    'expired',
    'home_dir',
    'accessed',
    'email',
    'shell',
    {
        name:'is_saved',
        type: 'bool',
        mapping: 'is_saved'
    },
    {
        name:'is_active',
        type: 'bool',
        mapping: 'is_active'
    },{
        name:'is_delete',
        type: 'bool',
        mapping: 'is_delete'
    }]
});