Ext.define('labinfsis.hosting.store.Servers', {
    extend: 'Ext.data.Store',
    model: 'labinfsis.hosting.model.Server',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        method:'POST',
        api: {
            read: 'admin/servers',
            update: 'admin/servers/edit',
            create: 'admin/servers/add',
            destroy: 'admin/servers/delete'
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