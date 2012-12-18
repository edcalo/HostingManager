Ext.define('labinfsis.hosting.model.Service', {
    extend: 'Ext.data.Model',
    fields: [{
        name:'id',
        type: 'int',
        mapping: 'id'
    },
    'service_name',
    'service_description',
    {
        name:'service_port',
        type:'int',
        mapping: 'service_port'
    },'image',
    {
        name:'is_saved',
        type:'boolean',
        mapping:'is_saved'
    },{
        name:'is_delete',
        type:'boolean',
        mapping:'is_delete'
    }]
});