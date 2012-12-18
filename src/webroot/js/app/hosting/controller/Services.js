Ext.define('labinfsis.hosting.controller.Services', {
    extend: 'Ext.app.Controller',
    stores: [
    'Services'
    ],
    models: [
    'Service'
    ],
    views: [
    'service.List',
    'service.Form'
    ],
    requires:[
    'Ext.window.MessageBox',
    'Ext.tip.*'
    ],
    init: function() {
        
        this.control({
            'services button[action=add]': {
                click: this.addService
            },
            'services button[action=edit]': {
                click: this.editService
            },
            'services #list-services': {
                itemdblclick: this.editService
            },
            'services button[action=delete]': {
                click: this.deleteService
            },
            'services button[action=syncdata]': {
                click: this.syncService
            },
            'services button[action=view]': {
                click: this.viewService
            },
            'service button[action=save]': {
                click: this.saveService
            }
        });
    },
    addService: function(button){
        Ext.widget('service');

    },
    viewService:function(a, b, c){
        console.log('Visor de eventos del servidor');
    },
    editService: function(source, record){
        if(source.getXType() == 'button'){
            var win = source.up('window');
            record = win.down('#list-services').getSelectionModel().getSelection();
            record = record[0];
        }
        var view = Ext.widget('service');
        view.down('form').loadRecord(record);

    },
    deleteService: function(button){
        Ext.MessageBox.confirm(
            'Eliminar Sservicio',
            'Esta seguro que desea eliminar los servicios seleccionados',
            function(confirm){
                if(confirm == 'yes'){
                    var win = button.up('window');
                    var seleccion = win.down('#list-services').getSelectionModel().getSelection();
                    this.getServicesStore().remove(seleccion);
                    this.getServicesStore().sync();
                }
            },
            this
            );
    },
    syncService: function(){
        this.getServicesStore().sync();
    },
    saveService: function(button){
        var win    = button.up('window');
        var form   = win.down('form');
        if(form.getForm().isValid()){
            var record = form.getRecord();
            var values = form.getValues();
            if(!record){
                record = this.getServiceModel().create();
                record.set('image', 'cog.png');
                record.set('is_saved', false);
                record.set(values);
                this.getServicesStore().insert(0, record);
            }else{
                record.set('is_saved', false);
                record.set(values);
            }
        
            win.close();
            this.getServicesStore().sync({
                success: function(optional){
                    record.set('is_saved', true);
                }
            });
        }
    }

});

