Ext.define('labinfsis.hosting.store.Services', {
    extend: 'Ext.data.Store',
    model: 'labinfsis.hosting.model.Service',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        method:'POST',
        api: {
            read: 'services',
            update: 'services/edit',
            create: 'services/add',
            destroy: 'services/delete'
        },
        reader: {
            type: 'json',
            root: 'data',
            successProperty: 'success',
            totalProperty: 'total'
        },
        writer: {
            type: 'json',
            writeAllFields: true,
            root: 'data',
            encode:true
        }
    }
});