Ext.define('labinfsis.hosting.controller.Servers', {
    extend: 'Ext.app.Controller',
    stores: [
        'Servers'
    ],
    models: [
        'Server'
    ],
    views: [
        'server.List',
        'server.Form'
    ],
    requires:[
        'Ext.window.MessageBox',
        'Ext.tip.*'
    ],
    init: function() {
        
        this.control({
            'servers button[action=add]': {
                click: this.addServer
            },
            'servers button[action=edit]': {
                click: this.editServer
            },
            'servers #list-servers': {
                itemdblclick: this.editServer
            },
            'servers button[action=delete]': {
                click: this.deleteServer
            },
            'servers button[action=syncdata]': {
                click: this.syncServer
            },
            'servers button[action=info]': {
                click: this.infoServer
            },
            'servers button[action=statistics]': {
                click: this.statisticServer
            },
            'servers button[action=eventviewer]': {
                click: this.viewServer
            },
            'server button[action=save]': {
                click: this.saveServer
            }
        });
    },
    addServer: function(button){
        Ext.widget('server');

    },
    viewServer:function(a, b, c){
        console.log('Visor de eventos del servidor');
    },
    editServer: function(source, record){
        if(source.getXType() == 'button'){
            var win = source.up('window');
            record = win.down('#list-servers').getSelectionModel().getSelection();
            record = record[0];
        }
        var view = Ext.widget('server');
        view.down('form').loadRecord(record);

    },
    deleteServer: function(button){
        Ext.MessageBox.confirm(
            'Eliminar Servidores',
            'Esta seguro que desea eliminar los sercvidores seleccionados',
            function(confirm){
                if(confirm == 'yes'){
                    var win = button.up('window');
                    var seleccion = win.down('#list-servers').getSelectionModel().getSelection();
                    this.getServersStore().remove(seleccion);
                    this.getServersStore().sync();
                }
            },
            this
            );
    },
    syncServer: function(){
        this.getServersStore().sync();
    },
    saveServer: function(button){
        var win    = button.up('window');
        var form   = win.down('form');
        if(form.getForm().isValid()){
            var record = form.getRecord();
            var values = form.getValues();
            if(!record){
                record = this.getServerModel().create();
                record.set(values);
                record.set('is_saved', false);
                this.getServersStore().insert(0, record);
            }else{
                record.set('is_saved', false);
                record.set(values);
            }
            console.debug(record);
        
            win.close();
            this.getServersStore().sync({
                success: function(optional){
                    record.set('is_saved', true);
                }
            });
        }
    },
    infoServer: function(){
        console.log('Info del servidor');
       
    },
    statisticServer: function(){
        console.log('Stadisticas del servidor');
    }

});