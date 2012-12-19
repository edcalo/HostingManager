Ext.define('labinfsis.hosting.view.service.List' ,{
    extend: 'Ext.window.Window',
    alias : 'widget.services',
    layout: 'border',
    autoShow: true,
    modal:true,
    width: 520,
    height: 415,
    iconCls:'icon-list',
    title: 'Lista de Servicios ',
    initComponent: function() {
        var sm = Ext.create('Ext.selection.CheckboxModel',{
            listeners:{
                'selectionchange': this.selectChange,
                scope: this
            }
        });
        this.listeners = {
            'destroy': function(window, options){
                Ext.data.StoreManager.lookup('Services').clearFilter();
            },
            'hide': function(window, options){
                Ext.data.StoreManager.lookup('Services').clearFilter();
            }
        }
        this.items=[{
            autoScroll: true,
            region:'center',
            id: 'list-services',
            singleSelect: true,
            overItemCls: 'x-view-over',
            itemSelector: 'div.thumb-wrap',
            xtype:'dataview',
            store: 'Services',
            listeners: {
                scope: this,
                selectionchange: this.selectChange
            },
            tpl: [
            // '<div class="details">',
            '<tpl for=".">',
            '<div class="thumb-wrap <tpl if="is_saved == true">icon-ok</tpl> <tpl if="is_saved == false">icon-error</tpl>" data-qtip="<b>Nombre:</b> {service_name} <br ><b>Descripción:</b>{service_description}">',
            '<div class="thumb" style="padding:10px;">',
            (!Ext.isIE6? '<img src="/img/icons/hosting/service/{image}" />' : '<div style="width:74px;height:74px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'img/icons/hosting/service/{imgage}\')"></div>'),
            '</div>',
            '<span>{serviceShortName}</span>',
            '</div>',
            '</tpl>'
            // '</div>'
            ],
            prepareData: function(data) {
                Ext.apply(data, {
                    serviceShortName: Ext.util.Format.ellipsis(data.service_name, 10)
                });
                return data;
            }
        }];
        
        this.tbar =[{
            title: 'Acciones',
            xtype: 'buttongroup',
            columns: 3,
            items:[{
                xtype: 'buttongroup',
                items:{
                    scale: 'large',
                    text: 'Registrar',
                    action: 'add',
                    iconAlign: 'top',
                    iconCls: 'icon-add-service'
                }
            },{
                xtype: 'buttongroup',
                defaults:{
                    scale: 'large',
                    iconAlign: 'top'
                },
                items:[{
                    text: 'Modificar',
                    iconCls: 'icon-edit-service',
                    action: 'edit',
                    disabled:true
                },{
                    text: 'Eliminar',
                    iconCls:'icon-delete-service',
                    action:'delete',
                    disabled:true
                }]
            },{
                xtype: 'buttongroup',
                items:{
                    scale: 'large',
                    text: 'Sincronizar',
                    action: 'syncdata',
                    iconAlign: 'top',
                    iconCls: 'icon-refresh-aux'
                }
            }]
        }];
        this.bbar=[{
            xtype: 'textfield',
            name : 'filter',
            fieldLabel: 'Buscar',
            labelWidth: 40,
            listeners: {
                scope : this,
                buffer: 50,
                change: this.filter
            } 
        }];
        this.callParent(arguments);
    },

    filter: function(field, newValue) {
        var store = this.down('dataview').store,
        dataview = this.down('dataview');
        store.suspendEvents();
        store.clearFilter();
        dataview.getSelectionModel().clearSelections();
        store.resumeEvents();
        store.filter({
            property: 'service_name',
            anyMatch: true,
            value   : newValue
        });
    },

    sort: function() {
        var field = this.down('combobox').getValue();
        this.down('dataview').store.sort(field, 'ASC');
    },

    selectChange: function(dataview, selections ){
        var bedit = this.down('button[action=edit]');
        var bdelete = this.down('button[action=delete]');
        if(selections.length > 0){
            bdelete.enable();
            if(selections.length == 1){
                bedit.enable();
            }else{
                bedit.disable();
            }
        }else{
            bedit.disable();
            bdelete.disable();
        }
    }

});