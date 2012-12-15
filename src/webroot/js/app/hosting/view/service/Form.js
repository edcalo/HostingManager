Ext.define('labinfsis.hosting.view.service.Form', {
    extend: 'Ext.window.Window',
    alias : 'widget.service',
    title : 'Registrar servicio',
    layout: 'fit',
    autoShow: true,
    modal:true,
    width: 550,
    iconCls: 'icon-add',
    initComponent: function() {
        this.items = [{
            xtype: 'form',
            fileUpload: true,
            border:false,
            bodyStyle: 'padding:10px; background-color:#DFE9F6',
            fieldDefaults: {
                labelAlign: 'top'
            },
            items: [{
                name:'id',
                xtype: 'hidden'
            },{
                xtype: 'container',
                layout:'column',                
                items:[{
                    xtype: 'container',
                    columnWidth:.75,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        name : 'service_name',
                        fieldLabel: 'Nombre',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'95%'
                    }]
                },{
                    xtype: 'container',
                    columnWidth:.25,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        name : 'service_port',
                        fieldLabel: 'Puerto',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'100%'
                    }]
                }]
            },{
                xtype: 'htmleditor',
                name : 'service_description',
                fieldLabel: 'Descripción',
                msgTarget: 'side',
                allowBlank: false,
                anchor:'100%'
            }]
        }];

        this.buttons = [{
            text: 'Save',
            action: 'save',
            iconCls:'icon-guardar'
        },{
            text: 'Cancel',
            scope: this,
            handler: this.close,
            iconCls:'icon-cancelar'
        }];

        this.callParent(arguments);
    }
});