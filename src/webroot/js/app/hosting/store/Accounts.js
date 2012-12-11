Ext.define('labinfsis.hosting.store.Accounts', {
    extend: 'Ext.data.Store',
    model: 'labinfsis.hosting.model.Account',
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