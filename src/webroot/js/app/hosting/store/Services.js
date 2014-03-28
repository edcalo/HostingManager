Ext.define('labinfsis.hosting.store.Services', {
    extend: 'Ext.data.Store',
    model: 'labinfsis.hosting.model.Service',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        method:'POST',
        api: {
            read: 'admin/services',
            update: 'admin/services/edit',
            create: 'admin/services/add',
            destroy: 'admin/services/delete'
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