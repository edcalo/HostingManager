Ext.define('Hosting.model.Account', {
    extend: 'Ext.data.Model',
    fields: ['id','name', 'email', 'userid', 'gid', 'status', 'expired', 'homedir', 'accessed']
});