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
    'status',
    {
        name:'expired',
        type:'date', 
        dateFormat:'Y-m-d H:i:s',
        mapping:'expired'
    },
    'home_dir',
    {
        name:'accessed',
        type:'date', 
        dateFormat:'Y-m-d H:i:s',
        mapping:'accessed'
    },
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