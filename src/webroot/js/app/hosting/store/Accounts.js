Ext.define('labinfsis.hosting.store.Accounts', {
    extend: 'Ext.data.Store',
    model: 'labinfsis.hosting.model.Account',
    autoLoad: true,
    groupField: 'servers',
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
        },
        // sends single sort as multi parameter
        simpleSortMode: true,
            
        // Parameter name to send filtering information in
        filterParam: 'query',

        // The PHP script just use query=<whatever>
        encodeFilters: function(filters) {
            return filters[0].value;
        }
    }
});