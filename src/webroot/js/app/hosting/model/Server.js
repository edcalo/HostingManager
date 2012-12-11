Ext.define('labinfsis.hosting.model.Server', {
    extend: 'Ext.data.Model',
    fields: [{
        name:'id',
        type: 'int',
        mapping: 'id'
    },
    'server_name'
    ,{
        name:'fqdn',
        type:'string',
        mapping: 'fully_qualified_domain_name'
    },'ip',
    'server_description',
    {
        name:'save',
        type: 'int',
        mapping: 'save'
    },
    {
        name:'is_active',
        type: 'bool',
        mapping: 'is_active'
    },
    'type']
});