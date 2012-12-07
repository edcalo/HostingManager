Ext.define('Hosting.model.Server', {
    extend: 'Ext.data.Model',
    fields: [{
        name:'id',
        type: 'int',
        mapping: 'id'
    },
    'groupname',
    'members',
    'description',
    {
        name:'save',
        type: 'int',
        mapping: 'save'
    },
    'type']
});