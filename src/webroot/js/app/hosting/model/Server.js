Ext.define('labinfsis.hosting.model.Server', {
    extend: 'Ext.data.Model',
    fields: [{
        name:'id',
        type: 'int',
        mapping: 'id'
    },
    'server_name',
    'fully_qualified_domain_name',
    'work_dir',
    'ip',
    'server_description',
    'members',
    'services',
    {
        name:'is_saved',
        type: 'bool',
        mapping: 'is_saved'
    },
    {
        name:'is_active',
        type: 'bool',
        mapping: 'is_active'
    },
    {
        name:'is_delete',
        type: 'bool',
        mapping: 'is_delete'
    }]
});