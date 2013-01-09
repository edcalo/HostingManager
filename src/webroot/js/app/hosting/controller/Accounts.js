Ext.define('labinfsis.hosting.controller.Accounts', {
    extend: 'Ext.app.Controller',
    stores: [
        'Accounts'
    ],
    models: [
        'Account'
    ],
    views: [
        'account.List',
        'account.Form'
    ],
    init: function() {
        this.control({
            'accounts': {
                itemdblclick: this.editAccount,
                itemclick:this.viewAccount
            },
            'account button[action=save]': {
                click: this.saveAccount
            }

        });
    },

    editAccount: function(grid, record) {
        var view = Ext.widget('account');

        view.down('form').loadRecord(record);
    },
    viewAccount:function(a, b, c){
        console.log('Actualizar el view');
    },
    saveAccount: function(button){             
        var win    = button.up('window');
        var form   = win.down('form');
        if(form.getForm().isValid()){
            var record = form.getRecord();
            var values = form.getValues();
            var servers = values.servers
            if(!record){
                record = this.getAccountModel().create();
                
                values.servers = servers.join(',');
                record.set(values);
                
                this.getAccountsStore().insert(0, record);
            }else{
                values.servers = servers.join(',');
                record.set(values);
            }
        
            win.close();
            this.getAccountsStore().sync();
        }

    }
});