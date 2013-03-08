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
            'accounts actioncolumn':{
                click: this.onAction
            },
            'account button[action=save]': {
                click: this.saveAccount
            }

        });
    },
    onAction: function(view,cell,row,col,e){
        console.log(view);
        console.log("----");
        console.log(cell);
        console.log("----");
        console.log(row);
        console.log("----");
        console.log(col);
        console.log("----");
        var m = e.getTarget().className.match(/\bicon-(\w+)\b/);
        console.log(m);
        /*if(m){
            //选择该列
            this.getGrid().getView().getSelectionModel().select(row,false)
            switch(m[1]){
                case 'edit':
                    this.getGrid().getPlugin('rowediting').startEdit({
                        colIdx:col,
                        rowIdx:row
                    })
                    break;
                case 'delete':
                    var record = this.getGrid().store.getAt(row)
                    this.deleteRecord([record])
                    break;
            }
        }*/
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
            var servers = values.servers;            

            if(!record){
                
                Ext.each(servers, function(server) {
                    record = this.getAccountModel().create();
                    values.servers = server;
                    record.set(values);
                
                    this.getAccountsStore().insert(0, record);
                }, this);
                
            }else{
                values.servers = servers.join(',');
                record.set(values);
            }
        
            win.close();
            this.getAccountsStore().sync();
        }

    }
});