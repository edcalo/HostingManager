Ext.define('labinfsis.hosting.store.Accounts', {
    extend: 'Ext.data.Store',
    model: 'labinfsis.hosting.model.Account',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        method:'POST',
        api: {
            read: 'accounts',
            create: 'accounts/add',
            update: 'accounts/edit',
            destroy: 'accounts/delete'
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