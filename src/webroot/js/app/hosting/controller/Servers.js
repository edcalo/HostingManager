Ext.define('Hosting.controller.Servers', {
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
            'serverlist button[action=addserver]': {
                click: this.addServer
            },
            'serverlist button[action=editserver]': {
                click: this.editServer
            },
            'serverlist #listaservidores': {
                itemdblclick: this.editServer
            },
            'serverlist button[action=deleteserver]': {
                click: this.deleteServer
            },
            'serverlist button[action=syncdata]': {
                click: this.syncServer
            },
            'serverlist button[action=infoserver]': {
                click: this.infoServer
            },
            'serverlist button[action=statisticsserver]': {
                click: this.statisticServer
            },
            'serverlist button[action=eventviewerserver]': {
                click: this.viewServer
            },
            'serverform button[action=save]': {
                click: this.saveServer
            }
        });
    },
    addServer: function(button){
        Ext.widget('serverform');

    },
    viewServer:function(a, b, c){
        console.log('Visor de eventos del servidor');
    },
    editServer: function(source, record){
        if(source.getXType() == 'button'){
            var win = source.up('window');
            record = win.down('#listaservidores').getSelectionModel().getSelection();
            record = record[0];
        }
        var view = Ext.widget('serverform');
        view.down('form').loadRecord(record);

    },
    deleteServer: function(button){
        Ext.MessageBox.confirm(
            'Eliminar Servidores',
            'Esta seguro que desea eliminar los sercvidores seleccionados',
            function(confirm){
                if(confirm == 'yes'){
                    var win = button.up('window');
                    var seleccion = win.down('#listagrupos').getSelectionModel().getSelection();
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
                this.getServersStore().insert(0, record);
            }else{
                record.set(values);
            }
        
            win.close();
            this.getServersStore().sync();
        }
    },
    infoServer: function(){
        Ext.create('Ext.window.Window', {
            title: 'Hello',
            height: 200,
            width: 400,
            layout: 'fit',
            headerPosition: 'bottom',
            items: {  // Let's put an empty grid in just to illustrate fit layout
                xtype: 'grid',
                border: false,
                columns: [{
                    header: 'World'
                }],                 // One header just for show. There's no data,
                store: Ext.create('Ext.data.ArrayStore', {}) // A dummy empty data store
            }
        }).show();
    },
    statisticServer: function(){
        console.log('Stadisticas del servidor');
    }

});