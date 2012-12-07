Ext.define('Hosting.store.Servers', {
    extend: 'Ext.data.Store',
    model: 'Hosting.model.Server',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        method:'POST',
        api: {
            read: 'servers',
            update: 'servers/edit',
            create: 'servers/add',
            destroy: 'servers/delete'
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