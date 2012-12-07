Ext.define('Hosting.store.Accounts', {
    extend: 'Ext.data.Store',
    model: 'Hosting.model.Account',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        api: {
            read: 'accounts',
            update: 'accounts/edit'
        },
        reader: {
            type: 'json',
            root: 'data',
            successProperty: 'success',
            totalProperty: 'total'
        }
    }
});